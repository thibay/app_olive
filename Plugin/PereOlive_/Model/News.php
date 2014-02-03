<?php
App::uses('PereOliveAppModel', 'PereOlive.Model');
/**
 * News Model
 *
 */
class News extends PereOliveAppModel {

/**
 * Display field
 *
 * @var string
 */
    public $displayField = 'title';
    public $useDbConfig = 'fleurus';
        
    public $actsAs = array(
                'Containable',
                'Media.Media' => array(
                    // Ici vous pouvez spécifier des options (facultative)
                    'path' => 'img/uploads/news/%y/%m/%f'
                )
            );   

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'published_date' => array(
			'date' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
//                'slug' => array(
//			'notempty' => array(
//				'rule' => array('notempty'),
//				'message' => 'Il faut définir un slug (url simplifiée: pas d’accents, pas de ponctuation, que des tirets)',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				'on' => 'update', // Limit validation to 'create' or 'update' operations
//			),
//		),            
		'body_small' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
//		'body_full' => array(
//			'notempty' => array(
//				'rule' => array('notempty'),
//				//'message' => 'Your custom message here',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
	);
        
        
public function beforeSave() {
    parent::beforeSave();   
    
    //debug($this->data[$this->alias]); die();
    if (!isset($this->data[$this->alias]['slug'])) {
        $this->data[$this->alias]['slug'] = strtolower(Inflector::slug($this->data[$this->alias]['title'], '-'));
    }

    return true;
}    
        
}
