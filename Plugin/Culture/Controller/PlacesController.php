<?php
App::uses('AppController', 'Controller');
/**
 * Places Controller
 *
 * @property Place $Place
 */
class PlacesController extends CultureAppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Place->recursive = 0;
		$this->set('places', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid place'));
		}
		$options = array('conditions' => array('Place.' . $this->Place->primaryKey => $id));
		$this->set('place', $this->Place->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Place->create();
			if ($this->Place->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The place has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The place could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid place'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Place->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The place has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The place could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Place.' . $this->Place->primaryKey => $id));
			$this->request->data = $this->Place->find('first', $options);
		}
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
		$this->Place->id = $id;
		if (!$this->Place->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid place'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Place->delete()) {
			$this->Session->setFlash(__d('croogo', 'Place deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Place was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Place->recursive = 0;
		$this->set('places', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid place'));
		}
		$options = array('conditions' => array('Place.' . $this->Place->primaryKey => $id));
		$this->set('place', $this->Place->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Place->create();
			if ($this->Place->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The place has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The place could not be saved. Please, try again.'), 'default', array('class' => 'error'));
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
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid place'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Place->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The place has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The place could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Place.' . $this->Place->primaryKey => $id));
			$this->request->data = $this->Place->find('first', $options);
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
		$this->Place->id = $id;
		if (!$this->Place->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid place'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Place->delete()) {
			$this->Session->setFlash(__d('croogo', 'Place deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Place was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}
