<?php
App::uses('PereOliveAppModel', 'PereOlive.Model');
/**
 * Recipe Model
 *
 * @property Place $Place
 */
class Recipe extends PereOliveAppModel {

/**
 * Use database config
 *
 * @var string
 */
	public $useDbConfig = 'fleurus';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
        
        
        public $actsAs = array(
                'Containable',
                'Media.Media' => array(
                    // Ici vous pouvez spécifier des options (facultative)
                    'path' => 'img/uploads/recipes/%y/%m/%f'
                )
            );  
        
       
        

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'from_date' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'to_date' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'place_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
                'price_presale' => array(
			'isaprice' => array(
				'rule' => array('numeric'),
				'message' => 'Doit être une valeur monétaire valable, sans le symbole €. Séparer les décimales avec un point.',
				'allowEmpty' => true,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
                'price_doors' => array(
			'isaprice' => array(
				'rule' => array('numeric'),
				'message' => 'Doit être une valeur monétaire valable, sans le symbole €. Séparer les décimales avec un point.',
				'allowEmpty' => true,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
                'price_member_bibli' => array(
			'isaprice' => array(
				'rule' => array('numeric'),
				'message' => 'Doit être une valeur monétaire valable, sans le symbole €. Séparer les décimales avec un point.',
				'allowEmpty' => true,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
                'price_member_pereolive' => array(
			'isaprice' => array(
				'rule' => array('numeric'),
				'message' => 'Doit être une valeur monétaire valable, sans le symbole €. Séparer les décimales avec un point.',
				'allowEmpty' => true,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            
            
            
                       
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Place' => array(
			'className' => 'PereOlive.Place',
			'foreignKey' => 'place_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
        
        public function beforeSave() {
            parent::beforeSave();              
            $this->data[$this->alias]['slug'] = strtolower(Inflector::slug($this->data[$this->alias]['name'], '-'));            
            return true;
        }       
}
