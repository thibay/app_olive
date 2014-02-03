<?php
App::uses('PereOliveAppController', 'PereOlive.Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 * @property PaginatorComponent $Paginator
 */
class ProductsController extends PereOliveAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
   
            
                $products = $this->Product->find('all', 
                        array(              
                            'recursive'=>1,
                            'sort'=>'Product.productcategory_id ASC, Product.name ASC',
                            )
                );
                $products_cat0 = $this->Product->find('all', 
                        array(              
                            'recursive'=>1,
                            'sort'=>'Product.name ASC',
                            'conditions'=>array('Product.productcategory_id'=>0)
                            )
                );    
                $products_cat1 = $this->Product->find('all', 
                        array(              
                            'recursive'=>1,
                            'sort'=>'Product.name ASC',
                            'conditions'=>array('Product.productcategory_id'=>1)
                            )
                );    
                $products_cat2 = $this->Product->find('all', 
                        array(              
                            'recursive'=>1,
                            'sort'=>'Product.name ASC',
                            'conditions'=>array('Product.productcategory_id'=>2)
                            )
                );    
                //debug($featured_recipes);
                //die();
                $this->set(compact('products', 'products_cat0', 'products_cat1', 'products_cat2')); 
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid product'));
		}
		$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
		$this->set('product', $this->Product->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Product->create();
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The product has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The product could not be saved. Please, try again.'), 'default', array('class' => 'error'));
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
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid product'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The product has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The product could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
			$this->request->data = $this->Product->find('first', $options);
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
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid product'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Product->delete()) {
			$this->Session->setFlash(__d('croogo', 'Product deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Product was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Product->recursive = 0;
		$this->set('products', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid product'));
		}
		$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
		$this->set('product', $this->Product->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Product->create();
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The product has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The product could not be saved. Please, try again.'), 'default', array('class' => 'error'));
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
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid product'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The product has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The product could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
			$this->request->data = $this->Product->find('first', $options);
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
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid product'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Product->delete()) {
			$this->Session->setFlash(__d('croogo', 'Product deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Product was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}}
