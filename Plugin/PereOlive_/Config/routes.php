<?php

//CroogoRouter::connect('/pereolive/route/here', array('plugin' => 'pereolive', 'controller' => 'pereolive', 'action' => 'index'));
//CroogoRouter::connect('/forums/:action/*', array('plugin' => 'forums', 'controller' => 'forums'));
CroogoRouter::connect('/news/:action/*', array('plugin' => 'pereolive','controller'=>'news'));
CroogoRouter::connect('/products/:action/*', array('plugin' => 'pereolive','controller'=>'products'));
CroogoRouter::connect('/recipes/:action/*', array('plugin' => 'pereolive','controller'=>'recipes'));
CroogoRouter::connect('/contact', array('plugin'=>'contacts', 'controller'=>'contacts', 'action'=>'view', 'contact'));