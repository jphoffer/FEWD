
<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-3 col-xs-12">
				<?php dynamic_sidebar('footer-widgets-1'); ?>
			</div>
			<div class="col-sm-3 col-xs-12">
				<?php dynamic_sidebar('footer-widgets-2'); ?>
			</div>
			<div class="col-sm-3 col-xs-12">
				<?php dynamic_sidebar('footer-widgets-3'); ?>
			</div>
			<div class="col-sm-3 col-xs-12">
				<?php dynamic_sidebar('footer-widgets-4'); ?>
			</div>
		</div>
		<hr/>
		<div class="credits">
			<div class="row">
				<div class="col-sm-6">
					<p><?php echo ci_footer(); ?></p>
				</div>

				<div class="col-sm-6 text-right">
					<?php echo ci_footer('secondary'); ?>
				</div>
			</div>
		</div>
	</div>
</footer>
</div> <!-- #page -->

<?php wp_footer(); ?>

</body>
</html>