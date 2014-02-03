<?php
App::uses('CakeEmail', 'Network/Email');
App::uses('PereOliveAppModel', 'PereOlive.Model');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Postulation extends PereOliveAppModel{
    
    public $useTable=false;
   public $validate=array(
        'email' => array(
			'rule' => 'email',
			'message' => 'Veulliez indiquer un email valide.'
		),
        'nom' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
                                'message' => 'Veulliez remplir ce champ.',
                                'required'=>true)
		),
        "prenom"=>array(
            'notEmpty' => array(
				'rule' => array('notEmpty'),
                                'message' => 'Veulliez remplir ce champ.')),
        "tel"=>array(
            'rule' => "/\S+/"),
        "rue"=>array(
            "rule"=>"/\S+/",
            "required"=>false,
            "allowEmpty"=>true),
        "ville"=>array(
            "rule"=>"/\S+/",
            "required"=>false,
            "allowEmpty"=>true),
         "boite"=>array(
            "rule"=>"/\S+/",
            "required"=>false,
            "allowEmpty"=>true),
        "numero"=>array(
            'rule'=>array('numeric'),
//            "required"=>false,
//            "allowEmpty"=>true),
        "code"=>array(
            "rule"=>"postal",
            "required"=>false,
            "allowEmpty"=>true),
          
        "cv"=>array(
            "extensions"=>array(
            "rule"=>array('notEmpty', 'extension'=>array('pdf', 'docx', 'rf'),'uploadFile'),
//            "required"=>true,
//            "allowEmpty"=>false,
            )), 
        "lettre"=>array(
           'notEmpty' => array(
				'rule' => array('notEmpty','extension'=> array('pdf', 'docx', 'rf'),'uploadFile'),
                                )
//            "required"=>true,
//            "allowEmpty"=>false,
                   
    )
    )
            
   );
   
    public function send($d){
        $this->set($d);
        if($this->validates()){
        $mail=new CakeEmail();
        $mail->from($d['email'])
                ->template('PereOlive')->Viewvars($d)
                ->to('simon.buerman@gmail.com')
                ->emailFormat('both')
                ->subject('Formulaire Postulation pour un job')
                ->replyto($d['email'])
                ->send(array($d['nom'],$d['prenom'],$d['tel'],$d['numero'],$d['code'],$d['ville'],$d['boite'],$d['rue']))
                ->attachments($d['cv'],$d['lettre']);
        return $mail->send('Votre candidature a été envoyé');
/*    var $_schema=array (
        "nom"=>array ("type"=>"string","length"=>30),
        "prenom"=>array("type"=>"string","length"=>30),
        "email"=> array ("type"=>"string","length" =>50),
        "rue"=>array ("type"=>"string","length"=>255),
        "numero"=>array ("type"=>"int",),
        "boite" =>array ("type"=>"int"),
        "ville"=>array ("type"=>"string"),
        "code"=>array ("type"=>"string"),
        "tel"=>array ("type"=>"string"),
        "cv"=>array ("type"=>"file"),
        "lettre"=>array ("type"=>"file")
    );
    
}*/
}else{
    return false;
}
}

    

}


