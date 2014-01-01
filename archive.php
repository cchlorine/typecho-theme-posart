<?php $this->need('header.php'); ?>
<div class="body">
	<?php $this->need('breadcrumb.php'); ?>
	<div id="loading-posts" style="display:none;"></div>
	<h3 class="archive-title"><?php $this->archiveTitle(array(
				'category'  =>  _t('分类 %s 下的文章'),
				'search'    =>  _t('包含关键字 %s 的文章'),
				'tag'       =>  _t('标签 %s 下的文章'),
				'author'    =>  _t('%s 发布的文章')
			), '', ''); ?></h3>
	<div class="posts-list">
		<?php if ($this->have()): ?>
		<?php while($this->next()): ?> 
			<article class="article cl">
				<h2 class="entry-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
				<?php if(posart_thumb_show($this)) {?><div class="mhidden entry-thumbnail"><a href="<?php $this->permalink() ?>"> <img src="<?php $this->options->siteUrl(); echo posart_thumb_show($this); ?>" alt="<?php $this->title() ?>" /></a></div><?php } ?>
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
        <?php else: ?>
            <article class="post">
                <h2 class="post-title"><?php _e('没有找到内容'); ?></h2>
            </article>
        <?php endif; ?>
	</div>
	<?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
</div>
<?php $this->need('footer.php'); ?>
