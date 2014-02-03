<?php
Croogo::hookBehavior('Recipe', 'Media.Media');
Croogo::hookBehavior('Product', 'Media.Media');

//Croogo::hookBehavior('Node', 'Media.Media');
//Croogo::hookComponent('*', 'Media.Media');
Croogo::hookHelper('Recipes', 'Media.Media');
Croogo::hookHelper('Nodes', 'Media.Media');
Croogo::hookHelper('Products', 'Media.Media');
