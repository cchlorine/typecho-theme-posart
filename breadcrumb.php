<div class="breadcrumb">
	<a href="<?php $this->options->siteUrl(); ?>">Home</a> <span class="divider">/</span></li>
	<?php if ($this->is('index')): ?>
		Newer Posts
	<?php elseif ($this->is('post')): ?>
		<li> <?php $this->category(); ?> <span class="divider">/</span></li> <?php $this->title() ?>
	<?php else: ?>
		<?php $this->archiveTitle('<span class="divider">/</span>','',''); ?>
	<?php endif; ?>
</div>