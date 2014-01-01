			<div class="body sidebar"><?php $this->need('sidebar.php'); ?></div>
		</div>
		
		<div class="site-footer" role="contentinfo">
			<p>Copyright © <?php echo date('Y'); ?> <?php $this->options->title(); ?> | Theme Posart Design By <a href="http://www.dsu.pw">Kunr</a></p>
			<p><?php _e('由 <a href="http://www.typecho.org">Typecho</a> 强力驱动'); ?>. <?php $this->options->siteTj() ?></p>
		</div>
		<div id="rightmenu">
			<?php if($this->allow('comment')) { ?><a href="javascript:;" class="tocomments"></a> <?php } ?>
			<a href="javascript:;" class="totop"></a>
		</div>
		<?php $this->footer(); ?>
	</div>
</body>
</html>

