<?php $contact = $this->requestAction(array('plugin'=>'contacts', 'controller'=>'contacts', 'action'=>'view', 'danielle'));?>
<div id="contact-<?php echo $contact['Contact']['id']; ?>" class="">
	<div class="contact-body">
	<?php echo $contact['Contact']['body']; ?>
	</div>

	<?php if ($contact['Contact']['message_status']):  ?>
	<div class="contact-form">
	<?php
		echo $this->Form->create('Message', array(
			'url' => array(
				'plugin' => 'contacts',
				'controller' => 'contacts',
				'action' => 'view',
				$contact['Contact']['alias'],
			),
		));
                echo $this->Form->input('Message.title', array('label' => __d('croogo', 'Subject')));
		echo $this->Form->input('Message.name', array('label' => __d('croogo', 'Your name')));
		echo $this->Form->input('Message.email', array('label' => __d('croogo', 'Your email')));
		echo $this->Form->input('Message.body', array('rows'=>'3', 'label' => __d('croogo', 'Message')));
		if ($contact['Contact']['message_captcha']):
			echo $this->Recaptcha->display_form();
		endif;
		echo $this->Form->end(__d('croogo', 'Send'));
	?>
	</div>
	<?php endif; ?>
<?php 
    echo $this->Html->scriptBlock(
        '$("label").inFieldLabels();',
        array('inline' => true)
    );
    echo $this->Js->writeBuffer();
?>
</div>

