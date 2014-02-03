<?php
App::uses('AppController', 'Controller');
/**
 * AssociationCategories Controller
 *
 * @property AssociationCategory $AssociationCategory
 */
class AssociationCategoriesController extends CultureAppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->AssociationCategory->recursive = 0;
		$this->set('associationCategories', $this->paginate());
	}
        
        public function home_index(){
                $this->AssociationCategory->recursive = 0;
		return $this->AssociationCategory->find('all');
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AssociationCategory->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid association category'));
		}
		$options = array('conditions' => array('AssociationCategory.' . $this->AssociationCategory->primaryKey => $id));
		$this->set('associationCategory', $this->AssociationCategory->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AssociationCategory->create();
			if ($this->AssociationCategory->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The association category has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The association category could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->AssociationCategory->recursive = 0;
		$this->set('associationCategories', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->AssociationCategory->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid association category'));
		}
		$options = array('conditions' => array('AssociationCategory.' . $this->AssociationCategory->primaryKey => $id));
		$this->set('associationCategory', $this->AssociationCategory->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->AssociationCategory->create();
			if ($this->AssociationCategory->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The association category has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The association category could not be saved. Please, try again.'), 'default', array('class' => 'error'));
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
		if (!$this->AssociationCategory->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid association category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AssociationCategory->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The association category has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The association category could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('AssociationCategory.' . $this->AssociationCategory->primaryKey => $id));
			$this->request->data = $this->AssociationCategory->find('first', $options);
		}
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
		$this->AssociationCategory->id = $id;
		if (!$this->AssociationCategory->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid association category'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AssociationCategory->delete()) {
			$this->Session->setFlash(__d('croogo', 'Association category deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Association category was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}
