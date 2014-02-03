<?php $items = $this->requestAction('culture/evenements/home_calendar');?>

<?php 
//    debug(strtotime("-2 month", strtotime(date('Y-m'))));
//    debug(strtotime("+3 month", strtotime(date('Y-m'))));

?>
<section id="calendar" class="clearfix sixteen columns alpha omega block">
<ul class="sixteen columns alpha omega slides">
<?php    
    
    $from_month = date('Y-m');
    //$from_month = strtotime("-2 month", strtotime(date('Y-m')));
    $end_month =  strtotime("+3 month", strtotime(date('Y-m')));    
    
    //LOOPING MONTHS
    while (strtotime($from_month) <= $end_month) {
        echo '<li class="sixteen columns alpha omega">';
        echo '<span class="month rouge four columns alpha">'.$this->Time->format('F', $from_month).'<span class="year">'.$this->Time->format('Y', $from_month).'</span></span>';    
            
        $from_date = date('Y-m-01', strtotime($from_month));	
        $end_date = date('Y-m-t', strtotime($from_month));  
        
        //LOOPING DAYS
        while (strtotime($from_date) <= strtotime($end_date)) {
               echo '<ul class="days twelve columns omega">';               
               while (strtotime($from_date) <= strtotime($end_date)) {
           //        debug(date("Y-m-d", strtotime($from_date)));
           //        debug(array_search(date("Y-m-d", strtotime($from_date)) ,$items));
                       $event = "";            
                       foreach($items as $index=>$date){
                           if($date[0]['from_date'] == date("Y-m-d", strtotime($from_date))){
                               $event = $date['Evenement']['name'];                    
                           }
                       }
                       if($event <> ""){
                           echo "<li>{$this->Html->link(
                                           $this->Time->format('d', $from_date), 
                                           array('plugin'=>'culture','controller'=>'evenements','action'=>'view',strtolower(Inflector::slug($event,'-'))),
                                           array('title'=>$event, 'rel'=>'calendar')
                                   )}</li>";
                       }
                       else{
                           if($from_date == date("Y-m-d")){
                               echo "<li>{$this->Html->link($this->Time->format('d', $from_date), array(), array('rel'=>'calendar', 'class'=>'now', 'title'=>'Vous êtes ici.'))}</li>";
                           }
                           else{
                               echo "<li>{$this->Time->format('d', $from_date)}</li>";
                           }
                       }
                       $from_date = date("Y-m-d", strtotime("+1 day", strtotime($from_date)));
               }
               echo '</ul>';    		            
            
            $from_date = date("Y-m-d", strtotime("+1 day", strtotime($from_date)));
        }        
        $from_month = date ("Y-m", strtotime("+1 month", strtotime($from_month)));
        echo '</li>';
    }
        

      
?>
</ul>

    <!--<span class="afterarrow"></span>-->
</section>