<?php
App::uses('AppModel', 'Model');
/**
 * Association Model
 *
 * @property AssociationCategory $AssociationCategory
 */
class Association extends PereOliveAppModel {

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
                'address_1_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
//				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),            
//		'address_1_street' => array(
//			'notempty' => array(
//				'rule' => array('notempty'),
//				//'message' => 'Your custom message here',
//				'allowEmpty' => true,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
//		'address_1_zipcode' => array(
//			'notempty' => array(
//				'rule' => array('notempty'),
//				//'message' => 'Your custom message here',
//				'allowEmpty' => true,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
//		'address_1_city' => array(
//			'notempty' => array(
//				'rule' => array('notempty'),
//				//'message' => 'Your custom message here',
//				'allowEmpty' => true,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'AssociationCategory' => array(
			'className' => 'PereOlive.AssociationCategory',
			'foreignKey' => 'association_category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
        
        public function beforeSave() {
            parent::beforeSave();              
            
            //SLUG
            $this->data[$this->alias]['slug'] = strtolower(Inflector::slug($this->data[$this->alias]['name'], '-'));            
            
            //GOOGLEGEO
            if(($this->data['Association']['address_1_street'] != '') &&
                    ($this->data['Association']['address_1_zipcode'] != '')&&
                    ($this->data['Association']['address_1_city'] != '')){
                    $address = array(
                        'street' => $this->data['Association']['address_1_street'],
                        'city' => $this->data['Association']['address_1_zipcode'],
                        'zip' => $this->data['Association']['address_1_city']
                   );           
                   App::import('Vendor', 'google_geo');
                   $googleGeo = new GoogleGeo($address);
                   $geo = $googleGeo->geo();
        //           debug($geo); die();           
                   $this->data[$this->alias] = array_merge($this->data['Association'],$geo);
           }
           return true;
        }       
        
}
