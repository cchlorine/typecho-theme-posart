<!DOCTYPE HTML>
<html>
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>"/>
	<link rel="shortcut icon" href="favicon.ico" />
	<script src="http://libs.baidu.com/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript">!window.jQuery && document.write('<script src="<?php $this->options->themeUrl('img/jquery.min.js'); ?>"><\/script>');</script>
	<!--<script src="<?php $this->options->themeUrl('img/jquery.masonry.min.js'); ?>"></script>-->
	<script src="<?php $this->options->themeUrl('img/themes.js'); ?>"></script>
    <!--[if lt IE 9]>
    <script src="http://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="http://cdn.staticfile.org/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <?php $this->header(); ?>
</head>
<body>
<!--[if lt IE 8]>
    <div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
<![endif]-->
<div id="header">
		<ul class="z">
			<li><a class="main" href="<?php $this->options->siteUrl() ?>" title="<?php $this->options->title() ?>"><?php $this->options->title() ?></a></li>

            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
			<?php while($pages->next()): ?>
                <li><a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
            <?php endwhile; ?>
		</ul>
		<ul class="y mhidden">
			<?php //posart_sns(); ?>
			<form id="searchform" class="searchform" action="./" method="post" role="search">
				<input id="s" type="text" class="search-input" name="s" value="" placeholder="Search~" autocomplete="off"/>
			</form>
		</ul>
	</div>
	<div id="wrapper">
		<?php if($this->options->logoUrl){?>
		<a href="<?php $this->options->siteUrl() ?>" class="header mhidden"><img src="<?php echo $this->options->logoUrl() ?>" alt="<?php $this->options->title()?>" /></a>
		<?php } ?>
		<div id="container" class="cl">
		