<?php
/**
 * 这是 PosArt , 一款单栏清新主题。
 * 
 * @package PosArt for Typecho
 * @author Kunr (Lingoys Art)
 * @version 1.0
 * @link http://www.dsu.pw
 */
 
 
if(isset($_GET["action"]) && $_GET["action"] == "index_ajax_navi"){// Ajax请求的头数据
    $this->need('lists.php');   
}else{   
    if(strpos($_SERVER["PHP_SELF"],"themes")) header('Location:/');   
    $this->need('header.php');   
?>
<div class="body">
	<?php $this->need('breadcrumb.php'); ?>
	<div id="loading-posts" style="display:none;"></div>
	<div class="posts-list">
		 <?php $this->need('lists.php');  ?>
	</div>
</div>
<?php $this->need('footer.php');} ?>
