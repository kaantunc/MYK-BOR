<?php defined('_JEXEC') or die('Restricted access'); ?>

<?php if ( $this->params->get( 'show_page_title', 1 ) ) : ?>
<div class="s5_maincomponent_wrap_1">
<div class="s5_maincomponent_wrap_2">
<div class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	<?php echo $this->escape($this->params->get('page_title')); ?>
</div>
</div>
</div>
<?php endif; ?>

<?php echo $this->loadTemplate('form'); ?>
<?php if(!$this->error && count($this->results) > 0) :
	echo $this->loadTemplate('results');
else :
	echo $this->loadTemplate('error');
endif; ?>
