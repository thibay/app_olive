<?php

App::uses('AppModel', 'Model');

class PereOliveAppModel extends AppModel {
    
    
     public function beforeSave() {
            parent::beforeSave();              
            if(key_exists('titre', $this->data[$this->alias])) $this->data[$this->alias]['slug'] = strtolower(Inflector::slug($this->data[$this->alias]['titre'], '-'));            
            if(key_exists('name', $this->data[$this->alias])) $this->data[$this->alias]['slug'] = strtolower(Inflector::slug($this->data[$this->alias]['name'], '-'));            
            return true;
        }       
    

}
