<?php
App::uses('AppController', 'Controller');
/**
 * Associations Controller
 *
 * @property Association $Association
 */
class AssociationsController extends CultureAppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {                                
                $options = array(
                         'recursive' => 1,                         
			 'order' => 'AssociationCategory.name ASC, Association.name ASC',			 
			 //'conditions'=>'active=1'
		);
                $this->set('associations', $this->Association->find('all', $options));                
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Association->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid association'));
		}
		$options = array('conditions' => array('Association.' . $this->Association->primaryKey => $id));
		$this->set('association', $this->Association->find('first', $options));
	}


/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Association->id = $id;
		if (!$this->Association->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid association'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Association->delete()) {
			$this->Session->setFlash(__d('croogo', 'Association deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Association was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Association->recursive = 0;
		$this->set('associations', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Association->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid association'));
		}
		$options = array('conditions' => array('Association.' . $this->Association->primaryKey => $id));
		$this->set('association', $this->Association->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Association->create();
			if ($this->Association->save($this->request->data)) {                                                                                                               
				$this->Session->setFlash(__d('croogo', 'The association has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The association could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$associationCategories = $this->Association->AssociationCategory->find('list');
		$this->set(compact('associationCategories'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Association->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid association'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Association->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The association has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The association could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Association.' . $this->Association->primaryKey => $id));
			$this->request->data = $this->Association->find('first', $options);
		}
		$associationCategories = $this->Association->AssociationCategory->find('list');
		$this->set(compact('associationCategories'));
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
		$this->Association->id = $id;
		if (!$this->Association->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid association'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Association->delete()) {
			$this->Session->setFlash(__d('croogo', 'Association deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Association was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}
