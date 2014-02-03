<?php 

$this->extend('/Common/admin_index');
$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb('PereOlive', array('controller' => 'pereolive', 'action' => 'index'))
	->addCrumb('RTE PereOlive', $this->here);

echo $this->Form->create('PereOlive');

$options = array('type' => 'textarea');
$rteConfigs = Configure::read('Wysiwyg.actions.PereOlive/admin_rte_pereolive');

$para = '<p>This editor was configured with the following setting:</p>';
foreach (array('basic', 'standard', 'full', 'custom') as $preset):
	$query = sprintf('{n}[elements=PereOlive%s]', Inflector::camelize($preset));
	$presetConfig = Hash::extract($rteConfigs, $query);
	$pre = '<blockquote><pre>' . print_r($presetConfig[0], true) . '</pre></blockquote>';
	echo $this->Form->input($preset, Hash::merge(array(
		'value' => $para . $pre,
	), $options));
endforeach;

echo $this->Form->end();
