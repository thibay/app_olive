<?php

App::uses('AppController', 'Controller');

/**
 * PereOlive App Controller
 *
 * @category Controller
 * @package  Croogo
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class PereOliveAppController extends AppController {

    public function canUploadMedias($model, $id){
    
        return true;
        
    }
    
}
