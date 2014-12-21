<?php while($this->next()): $thumb = posart_thumb_show($this); ?>
	<article class="post<?php if ($thumb) { echo ' thumbnail-on'; }?>">
		<header class="post-head">
			<h2 class="post-title">
				<a href="<?php $this->permalink(); ?>" title="<?php $this->title(); ?>"><?php $this->title(); ?></a>
			</h2>
			<time datetime="<?php $this->date(); ?>" class="post-time"><?php $this->date('F j, Y');?></time>
		</header>
		<?php if ($thumb) {?>
		<section class="post-thumbnail">
			<a href="<?php $this->permalink() ?>">
				<img src="<?php echo $thumb; ?>" alt="<?php $this->title(); ?>" />
			</a>
		</section>
		<?php } ?>
		<section class="post-entry">
			<?php $this->excerpt(300, '...'); ?>
		</section>
		<footer class="post-footer clear">
			<span class="post-tags clear">
				<?php $this->category(''); ?>
				<?php $this->tags(''); ?>
			</span>
			<a class="post-readmore" href="<?php $this->permalink(); ?>">阅读更多...</a>
		</footer>
	</article>
<?php endwhile; ?>
<?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
