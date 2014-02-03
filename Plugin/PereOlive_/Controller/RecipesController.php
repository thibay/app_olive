<?php
App::uses('PereOliveAppController', 'PereOlive.Controller');

/**
 * Recipes Controller
 *
 * @property Recipe $Recipe
 */
class RecipesController extends PereOliveAppController {

    	public $name = 'Recipes';    	               
    
/**
 * index method
 *
 * @return void
 */
	public function index() {                
		$this->Recipe->recursive = 0;
		$recipes = $this->Recipe->find('all', array('order' => 'Recipe.from_date ASC',                         
			 'conditions'=>array('active=1', 'DATE(Recipe.to_date) >= DATE_ADD(CURDATE(), INTERVAL -1 DAY)')));
                $archives = $this->Recipe->find('all', array('order' => 'Recipe.from_date DESC',                         
			 'conditions'=>array('active=1', 'DATE(Recipe.to_date) <= DATE_ADD(CURDATE(), INTERVAL 0 DAY)')));
                $this->set(compact('recipes','archives'));
	}

	public function home_calendar() {
                $options = array(
                         'recursive' => 0,
                         'fields' => array('DATE(Recipe.from_date) as "from_date"','Recipe.name'),
			 'order' => 'Recipe.from_date ASC',
			 'conditions'=>'active=1'
		);		
                return $this->Recipe->find('all', $options);
	}        
        
        public function home_promoted(){
		return $this->Recipe->find('all', array('order' => "Recipe.from_date ASC", 
                    'conditions'=>array(
                        'Recipe.active'=>1, 
                        'Recipe.is_promoted_slider'=>1, 
                        //'Recipe.from_date'=>'=> DATE_ADD(NOW(), INTERVAL -1 DAY)',                        
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
                        $recipe = $this->Recipe->read(null, $id);                 
			if($recipe){
				$this->redirect(array('plugin'=>'pereolive', 'controller'=>'recipes', 'action'=>'view',$recipe['Recipe']['slug']), 301);
			}
			else{
                                throw new NotFoundException(__('Invalid Event'));
				$this->Session->setFlash(__('Invalid Event.', true));
				$this->redirect(array('action'=>'index'));
			}
		}
		else {
                    $recipe = $this->Recipe->findBySlug($id);                    
                    if(!$recipe['Recipe']['active']) throw new NotFoundException(__('Invalid recipe'));
                    //NEIGHBORS			
                    $neighbors = $this->Recipe->find('neighbors',
                            array('field'=>'Recipe.name',
                                  'value'=>$recipe['Recipe']['name'],
                                  'conditions'=>array('Recipe.active'=>1),
                                  'order'=>array('Recipe.from_date'=>'ASC'),
                                  'fields'=>array('Recipe.id','Recipe.slug','Recipe.name')));
                    $this->set('title_for_layout', $recipe['Recipe']['name']);                                                            
                    $this->set(compact('recipe','neighbors'));                
                }                       
                        		
	}



/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Recipe->recursive = 0;
		$this->set('recipes', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Recipe->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid recipe'));
		}
		$options = array('conditions' => array('Recipe.' . $this->Recipe->primaryKey => $id));
		$this->set('recipe', $this->Recipe->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Recipe->create();
			if ($this->Recipe->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The recipe has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The recipe could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$places = $this->Recipe->Place->find('list');
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
		if (!$this->Recipe->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid recipe'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Recipe->saveAll($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The recipe has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The recipe could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Recipe.' . $this->Recipe->primaryKey => $id));
			$this->request->data = $this->Recipe->find('first', $options);
		}
		$places = $this->Recipe->Place->find('list');
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
		$this->Recipe->id = $id;
		if (!$this->Recipe->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid recipe'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Recipe->delete()) {
			$this->Session->setFlash(__d('croogo', 'Recipe deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Recipe was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}
