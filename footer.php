		<div id="push"></div>
			</div><!-- end #wrapper -->
			<footer>
				<!--div class="flag-stripe"><div class="white-stripe"><div class="red-stripe"></div></div></div-->
				<div class="wrap">
					<div class="footer-content">
						<div class="row">
							<div class="span2">
								<div class="footer-logo"></div>
							</div>
							<div class="span3">
								<div class="address">
									<div class="sg">Samband Garðyrkjubænda</div>
									<p>Bændahöllinni við Hagatorg</p>
									<p>107 Reykjavík</p>
								</div>
							</div>
							<div class="span3">
								<div class="contact-info">
									<a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Hafðu samband' ) ) ); ?>" class="contact-footer" title="hafa samband">Hafðu samband<span class="mail-icon"></span></a>
									<a href="mailto=gardyrkja@gardyrkja.is" class="email">gardyrkja(hjá)gardyrkja.is</a>
									<div class="phone">Sími: 563 0328</div>
								</div>
							</div>
							<div class="span4">
								<div class="shortcut-links">
									<div class="row">
										<h2>Flýtihlekkir</h2>
									</div>
									<div class="row">
										<div class="span6"><nav><?php wp_nav_menu(array('menu' => 'footer links first', 'container' => '')); ?></nav></div>
										<div class="span6"><nav><?php wp_nav_menu(array('menu' => 'footer links second', 'container' => '')); ?></nav></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!--p> Copyright &copy; <?php echo date("Y"); echo " "; bloginfo('name'); ?></p-->
				</div>
			</footer>
			<a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Hafðu samband' ) ) ); ?>" class="contact" title="hafa samband">Hafa samband</a>

			<?php wp_footer(); ?>
			<script src="<?php echo get_template_directory_uri(); ?>/js/lib.js" type="text/javascript"></script>
			<script src="<?php echo get_template_directory_uri(); ?>/js/scripts.js" type="text/javascript"></script>
			
		<!-- Don't forget analytics -->
		
	</body>
</html>