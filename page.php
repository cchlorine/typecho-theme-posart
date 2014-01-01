<?php  

if(isset($_GET["action"]) && $_GET["action"] == "ajax_comments"){// Ajax请求的头数据   
    $this->need('comments.php');   
}else{   
    if(strpos($_SERVER["PHP_SELF"],"themes")) header('Location:/');   
    $this->need('header.php');   
?><div class="body">
	<?php $this->need('breadcrumb.php'); ?>
	<div class="content">
		<div style="position: relative; z-index: 1;">
			<header class="entry-header">
				<h2 class="entry-title"><?php $this->title() ?></h2>
			</header>
			<div class="entry-content">
				<?php $this->content(); ?>
			</div>
		</div>
		<footer>
			<p class="entry-meta"><?php $this->author(); ?> &nbsp;&nbsp;&nbsp; <?php $this->date('F j, Y'); ?> &nbsp;&nbsp;&nbsp;
			<?php $this->category(','); ?> &nbsp;&nbsp;&nbsp; <?php $this->tags(', ', true, ''); ?> &nbsp;&nbsp;&nbsp;
			</p>
		</footer>
		<div class="background" style="background-image: url(<?php $this->options->themeUrl('/img/content/'.rand(1,20).'.jpg)');?>"></div>
	</div>
	<div class="comments"><?php $this->need('comments.php'); ?></div>
</div>

<?php $this->need('footer.php'); } ?>
