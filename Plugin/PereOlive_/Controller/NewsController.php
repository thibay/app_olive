<?php
App::uses('PereOliveAppController', 'PereOlive.Controller');
/**
 * News Controller
 *
 * @property News $News
 */
class NewsController extends PereOliveAppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->News->recursive = 1;                
		$this->paginate = array('order' => 'News.published_date DESC', 'conditions' => array('News.active'=>1, 'News.id !=' => 10));
		$this->set('news', $this->paginate());
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
                        $news = $this->News->read(null, $id);                 
			if($news){
				$this->redirect(array('plugin'=>'pereolive', 'controller'=>'news', 'action'=>'view',$news['News']['slug']), 301);
			}
			else{
                                throw new NotFoundException(__('Invalid news'));
				$this->Session->setFlash(__('Invalid News.', true));
				$this->redirect(array('action'=>'index'));
			}
		}
		else {
                    $news = $this->News->findBySlug($id);
                    if(!$news['News']['active']) throw new NotFoundException(__('Invalid news'));
                    $this->set('title_for_layout', $news['News']['title']);                      
                    //NEIGHBORS			
                    $neighbors = $this->News->find('neighbors',
                            array('field'=>'News.title',
                                  'value'=>$news['News']['title'],
                                  'conditions'=>array('News.active'=>1),
                                  'order'=>array('News.published_date'=>'DESC'),
                                  'fields'=>array('News.id','News.slug','News.title')));
                    $this->set(compact('news','neighbors'));                
                }                
	}
        
        
        
        public function home_promoted(){
		return $this->News->find('all', array('order' => 'News.first_pos DESC, News.published_date DESC', 'limit'=>3, 'conditions'=>array('active'=>1, 'promoted'=>1)));
	}        


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->News->recursive = 0;
                $this->paginate = array('order' => 'News.published_date DESC');
		$this->set('news', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->News->id = $id;
		if (!$this->News->exists()) {
			throw new NotFoundException(__('Invalid news'));
		}
		$this->set('news', $this->News->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->News->create();
			if ($this->News->saveAll($this->request->data)) {
				$this->Session->setFlash(__('The news has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The news could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->News->id = $id;
		if (!$this->News->exists()) {
			throw new NotFoundException(__('Invalid news'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->News->saveAll($this->request->data)) {
				$this->Session->setFlash(__('The news has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The news could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->News->read(null, $id);
		}
	}

/**
 * admin_delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->News->id = $id;
		if (!$this->News->exists()) {
			throw new NotFoundException(__('Invalid news'));
		}
		if ($this->News->delete()) {
			$this->Session->setFlash(__('News deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('News was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
