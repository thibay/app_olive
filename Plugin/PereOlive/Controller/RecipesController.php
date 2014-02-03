<?php
App::uses('PereOliveAppController', 'PereOlive.Controller');
/**
 * Recipes Controller
 *
 * @property Recipe $Recipe
 * @property PaginatorComponent $Paginator
 */
class RecipesController extends PereOliveAppController {

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
                $featured_recipes = $this->Recipe->find('all', 
                        array(
                            'conditions'=>array('Recipe.is_featured'=>1),
                            'recursive'=>1,
                            'limit'=>4,
                            'sort'=>'Recipe.created DESC',
                            )                
                );
                $recipes = $this->Recipe->find('all', 
                        array(              
                            'recursive'=>1,
                            'sort'=>'Recipe.created DESC',
                            )
                );           
                //debug($featured_recipes);
                //die();
                $this->set(compact('featured_recipes','recipes')); 
	}
        
        public function featured(){
            return $this->Recipe->find('all', 
                    array(
                        'conditions'=>array('Recipe.is_featured'=>1),
                        'recursive'=>1,
                        'limit'=>4,
                        'sort'=>'Recipe.created DESC',
                        )                
            );
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
				$this->redirect(array('plugin'=>'PereOlive', 'controller'=>'recipes', 'action'=>'view',$recipe['Recipe']['slug']), 301);
			}
			else{
                                throw new NotFoundException(__('Invalid Recipe'));
				$this->Session->setFlash(__('Invalid Recipe.', true));
				$this->redirect(array('action'=>'index'));
			}
		}
		else {
                    $this->Recipe->Product->hasMany['Media'] = array(
			'className'  => 'Media.Media',
			'foreignKey' => 'ref_id',
			'order'      => 'Media.position ASC',
			'conditions' => 'ref = "PereOlive.Product"',
			'dependent'  => true
                    );
                    $recipe = $this->Recipe->findBySlug($id);
                    $product = $this->Recipe->Product->find('first', array('conditions'=>array('Product.id'=>$recipe['Recipe']['product_id'])));
                    //NEIGHBORS			
                    $neighbors = $this->Recipe->find('neighbors',
                            array('field'=>'Recipe.name',
                                  'value'=>$recipe['Recipe']['name'],
                                  'order'=>array('Recipe.name'=>'ASC'),
                                  'fields'=>array('Recipe.id','Recipe.slug','Recipe.name')));
                    $this->set('title_for_layout', $recipe['Recipe']['name']);  
                    $this->set('mainclass', 'lined_paper');                                                            
                    $this->set(compact('recipe','neighbors','product'));                
                }          
            
            
            
		
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Recipe->create();
			if ($this->Recipe->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The recipe has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The recipe could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$products = $this->Recipe->Product->find('list');
		$this->set(compact('products'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Recipe->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid recipe'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Recipe->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The recipe has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The recipe could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Recipe.' . $this->Recipe->primaryKey => $id));
			$this->request->data = $this->Recipe->find('first', $options);
		}
		$products = $this->Recipe->Product->find('list');
		$this->set(compact('products'));
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
		$products = $this->Recipe->Product->find('list');
		$this->set(compact('products'));
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
			if ($this->Recipe->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The recipe has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The recipe could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Recipe.' . $this->Recipe->primaryKey => $id));
			$this->request->data = $this->Recipe->find('first', $options);
		}
		$products = $this->Recipe->Product->find('list');
		$this->set(compact('products'));
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
	}}
