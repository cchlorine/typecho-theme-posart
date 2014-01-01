<?php while($this->next()): ?> 
	<article class="article cl">
		<h2 class="entry-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
		<?php if(posart_thumb_show($this)) {?><div class="mhidden entry-thumbnail"><a href="<?php $this->permalink() ?>"> <img src="<?php echo posart_thumb_show($this); ?>" alt="<?php $this->title() ?>" /></a></div><?php } ?>
		<div class="entry-content"><?php $this->excerpt(400, '...'); ?></div>
		<p class="entry-meta">
			<?php $this->date('F j, Y'); ?> &nbsp;&nbsp;&nbsp;
			<a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a>&nbsp;&nbsp;&nbsp;
			<?php $this->category(','); ?>&nbsp;&nbsp;&nbsp;
			<a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('No Comments', '1 Comment', '%d Comments'); ?></a>
			<a class="y" href="<?php $this->permalink() ?>">More...</a>
		</p>
	</article>
<?php endwhile; ?>
<?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
