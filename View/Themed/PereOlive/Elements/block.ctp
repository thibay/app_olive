<?php
$this->set(compact('block'));
$b = $block['Block'];
$class = 'block block-' . $b['alias'];
if ($block['Block']['class'] != null) {
	$class .= ' ' . $b['class'];
}
?>
<div id="<?php echo $b['alias']; ?>" class="<?php echo $class; ?>">
    <div class='wrapper clearfix'>
<?php if ($b['show_title'] == 1): ?>
	<h3><?php echo $b['title']; ?></h3>
<?php endif; ?>
	<div class="block-body">
<?php echo $this->Layout->filter($b['body']); ?>
	</div>
    </div>
</div>