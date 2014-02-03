<?php
/**
 *SimpleTwitter - A simple twitter datasource for cakephp
 * @author Skyler Lewis (aka alairock) 2012
 * @link http://sixteenink.com
 * @link http://github.com/alairock
 **/
App::uses('HttpSocket', 'Network/Http');
class FacebookSource extends DataSource {

	protected $_schema = array(
                //'entries'=> array(
			'id' => array('type' => 'string', 'key' => 'primary'),
			'title' => array('type' => 'string'),
                        'alternate' => array('type'=>'string'),
			'published' => array('type' => 'string')
                //    )
	);


	public function __construct($config) {
		parent::__construct($config);
		$this->sourceUrl = $this->config['sourceUrl'];
		$this->Http = new HttpSocket();
	}

	public function listSources() {
		return null;
	}

	public function describe($Model) {
		return $this->_schema;
	}

	public function read($model, $queryData = array()) {
		
		//Override Config duing a 'find' with the following merge
		if(!empty($queryData['conditions'])) {
		$this->config =	array_merge($this->config, $queryData['conditions']);
		}
		//go get tweets
		$results = json_decode($this->Http->get($this->sourceUrl, $this->config));
                //debug($results);
		//Show Only Tweet and TimeStamp
		if ($this->config['abridged'] == true) {
			$postsOnly = array();
			foreach ($results->entries as $resultsValue) {
				$resultsValue = get_object_vars($resultsValue);
                                //debug($resultsValue);
				array_push($postsOnly, array($resultsValue['title'], $resultsValue['published'], $resultsValue['alternate']));
			}
			return $postsOnly;
		} else {
			return $results;
		}

	}

}
