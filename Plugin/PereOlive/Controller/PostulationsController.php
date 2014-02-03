<?php

App::uses('PereOliveAppController', 'PereOlive.Controller');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PostulationsController extends PereOliveAppController{
   
public $components=array('Session');

    }
   function view(){
       if($this->request->is('post')){
           if($this->Postulation->send($this->request->data['Postulation'])){

               $this->redirect(array('controller' => 'Postulations', 'action' =>'confirmation'));
           }else{
                $this->redirect(array('controller' => 'Postulations', 'action' =>'echec'));
           }
     
         
      
       
      
   }
}

?>