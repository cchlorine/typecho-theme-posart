		</div>
	</div>

	<footer id="footer">
		<p>&copy; <?php echo date('Y'); ?> <?php $this->options->title(); ?> / PosArt By <a href="http://kunr.me">Kunr</a></p>
		<p><?php _e('由 <a href="http://www.typecho.org">Typecho</a> 强力驱动'); ?>. <?php $this->options->siteTj() ?></p>
	</footer>

	<script src="<?php $this->options->themeUrl('js/jquery-2.1.3.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php $this->options->themeUrl('js/main.js'); ?>" type="text/javascript"></script>
	<?php $this->footer(); ?>
</body>
</html>
