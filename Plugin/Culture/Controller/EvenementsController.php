<?php
App::uses('CultureAppController', 'Culture.Controller');

/**
 * Evenements Controller
 *
 * @property Evenement $Evenement
 */
class EvenementsController extends CultureAppController {

    	public $name = 'Evenements';    	               
    
/**
 * index method
 *
 * @return void
 */
	public function index() {                
		$this->Evenement->recursive = 0;
		$evenements = $this->Evenement->find('all', array('order' => 'Evenement.from_date ASC',                         
			 'conditions'=>array('active=1', 'DATE(Evenement.to_date) >= DATE_ADD(CURDATE(), INTERVAL -1 DAY)')));
                $archives = $this->Evenement->find('all', array('order' => 'Evenement.from_date DESC',                         
			 'conditions'=>array('active=1', 'DATE(Evenement.to_date) <= DATE_ADD(CURDATE(), INTERVAL 0 DAY)')));
                $this->set(compact('evenements','archives'));
	}

	public function home_calendar() {
                $options = array(
                         'recursive' => 0,
                         'fields' => array('DATE(Evenement.from_date) as "from_date"','Evenement.name'),
			 'order' => 'Evenement.from_date ASC',
			 'conditions'=>'active=1'
		);		
                return $this->Evenement->find('all', $options);
	}        
        
        public function home_promoted(){
		return $this->Evenement->find('all', array('order' => "Evenement.from_date ASC", 
                    'conditions'=>array(
                        'Evenement.active'=>1, 
                        'Evenement.is_promoted_slider'=>1, 
                        //'Evenement.from_date'=>'=> DATE_ADD(NOW(), INTERVAL -1 DAY)',                        
                     ), 
                    'limit' => 3));
	}
        
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {                                    
                if(is_numeric($id)) {
                        $evenement = $this->Evenement->read(null, $id);                 
			if($evenement){
				$this->redirect(array('plugin'=>'culture', 'controller'=>'evenements', 'action'=>'view',$evenement['Evenement']['slug']), 301);
			}
			else{
                                throw new NotFoundException(__('Invalid Event'));
				$this->Session->setFlash(__('Invalid Event.', true));
				$this->redirect(array('action'=>'index'));
			}
		}
		else {
                    $evenement = $this->Evenement->findBySlug($id);                    
                    if(!$evenement['Evenement']['active']) throw new NotFoundException(__('Invalid evenement'));
                    //NEIGHBORS			
                    $neighbors = $this->Evenement->find('neighbors',
                            array('field'=>'Evenement.name',
                                  'value'=>$evenement['Evenement']['name'],
                                  'conditions'=>array('Evenement.active'=>1),
                                  'order'=>array('Evenement.from_date'=>'ASC'),
                                  'fields'=>array('Evenement.id','Evenement.slug','Evenement.name')));
                    $this->set('title_for_layout', $evenement['Evenement']['name']);                                                            
                    $this->set(compact('evenement','neighbors'));                
                }                       
                        		
	}



/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Evenement->recursive = 0;
		$this->set('evenements', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Evenement->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid evenement'));
		}
		$options = array('conditions' => array('Evenement.' . $this->Evenement->primaryKey => $id));
		$this->set('evenement', $this->Evenement->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Evenement->create();
			if ($this->Evenement->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The evenement has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The evenement could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$places = $this->Evenement->Place->find('list');
		$this->set(compact('places'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Evenement->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid evenement'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Evenement->saveAll($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The evenement has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The evenement could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Evenement.' . $this->Evenement->primaryKey => $id));
			$this->request->data = $this->Evenement->find('first', $options);
		}
		$places = $this->Evenement->Place->find('list');
		$this->set(compact('places'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Evenement->id = $id;
		if (!$this->Evenement->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid evenement'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Evenement->delete()) {
			$this->Session->setFlash(__d('croogo', 'Evenement deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Evenement was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}
