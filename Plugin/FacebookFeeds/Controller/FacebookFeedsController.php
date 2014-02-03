<?php

App::uses('FacebookFeedsAppController', 'FacebookFeeds.Controller');

/**
 * Culture Controller
 *
 * PHP version 5
 *
 * @category Controller
 * @package  Croogo
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class FacebookFeedsController extends FacebookFeedsAppController {

/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'FacebookFeeds';

/**
 * Models used by the Controller
 *
 * @var array
 * @access public
 */
	public $uses = array('Setting', 'FacebookFeeds.Facebook');

        public function feed(){
            $facebook_entries = $this->Facebook->find('all'); 
            return($facebook_entries);
        }
        	
}
