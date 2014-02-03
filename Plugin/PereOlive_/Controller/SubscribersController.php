<?php
App::uses('AppController', 'Controller');

class SubscribersController extends AppController {
	public $name = 'Subscribers';
	public $helpers = array('Html', 'Form', 'Session');

	/**
	 * Before any Controller Action
	 */
	public function beforeFilter() {
		parent::beforeFilter();				
	}

        public function subscribe(){
                $this->autoRender = false;
                if(!empty($this->data)) {                        
                        $this->Subscriber->set( $this->data );                        
                        if($this->Subscriber->validates()) {
                            App::import('Vendor', 'mailchimp', array('file'=>'mailchimp'.DS.'MCAPI.class.php'));
                            $api = new MCAPI('3f17751b54888860a5a723c0d1e6f33e-us5');
                            $list_id = "789e64d64e";      
                            if($api->listSubscribe($list_id, $this->data['Subscriber']['email'], '') === true) {
                                    // It worked!	
                                   echo 'Merci ! Veuillez consulter vos e-mails pour confirmer l\'inscription.';
                            }else{
                                    // An error ocurred, return error message	
                                   echo 'Erreur: ' . $api->errorMessage . '<br /><a href="/">Recommencer</a>';
                            }                                       
                        }
                        else{
                            echo 'Erreur: ' . 'Veuillez entrer une adresse e-mail correcte.' . '<br /><a href="/">Recommencer</a>';
                        }
                }
               else{
                    $this->Session->setFlash(__('Please enter your e-mail', true),'flash_bad');
                    //$this->redirect(array('controller'=>'dashboard','action'=>'index','admin'=>true));
                }                           
        }
        
        public function test(){
            
        }
}
?>
