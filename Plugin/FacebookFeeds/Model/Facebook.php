<?php 
App::uses('FacebookFeedsAppModel', 'FacebookFeeds.Model');

    /**
     * Get Facebook Updates
     *
     * $twits = $this->Twitter->find(array('cache'=>true,'limit'=>8));
     *
     * @author        Darren Moore, zeeneo@gmail.com
     * @link          http://www.zeen.co.uk
     */
    class Facebook extends FacebookFeedsAppModel
    {
        
        public $useDbConfig = 'facebookDb';
    
    }

?> 