		<div id="push"></div>
			</div><!-- end #wrapper -->
			<div id="header-controls">
				<div class="header-controls-container">
					<div>
						<div class="login">
							<?php global $current_user;
								get_currentuserinfo();
							    echo $current_user->display_name;
							?>
							<?php if ( is_user_logged_in()) : ?>
								<a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="útskrá">Útskrá</a>
							<?php else : ?>
							<a href="<?php echo wp_login_url( get_permalink() ); ?>" title="innskrá" class="user-login">Innskrá</a>
							<a href="/wp-login.php?action=register" title="Nýskrá" class="user-register">Nýskrá</a>
							<?php endif; ?>
							<!--?php wp_register(); ?--> 

						</div>
						<a href="/english/" class="english" title="english">English</a>
						<form action="/" method="get" class="searchform">
							<label for="s" class="visuallyhidden">Leit</label>
							<input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" placeholder="Leitarorð" />
							<input type="submit" id="searchsubmit" value="Leita"/>
						</form>
					</div>
				</div>
			</div>
			
			<footer>
				<div class="wrap">
					<div class="footer-content">
						<div class="logo-section">
							<div class="footer-logo"></div>
							<div class="address">
								<div class="sg">Samband Garðyrkjubænda</div>
								<p>Bændahöllinni við Hagatorg</p>
								<p>107 Reykjavík</p>
							</div>
						</div>
						
						<div class="contact-info">
							<div>
								<a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Hafðu samband' ) ) ); ?>" class="contact-footer" title="hafa samband"><span>Hafðu samband</span><span class="mail-icon"></span></a>
								<a href="mailto:gardyrkja@gardyrkja.is" class="email">gardyrkja(hjá)gardyrkja.is</a>
								<div class="phone">Sími: 563 0328</div>
							</div>
						</div>

						<div class="shortcut-links">
							<div class="row">
								<nav><?php wp_nav_menu(array('menu' => 'footerLinksLeft', 'container' => '')); ?></nav>
								<nav><?php wp_nav_menu(array('menu' => 'footerLinksRight', 'container' => '')); ?></nav>
							</div>
						</div>
					</div>
					<!--p> Copyright &copy; <?php echo date("Y"); echo " "; bloginfo('name'); ?></p-->
				</div>
			</footer>
			<a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Hafðu samband' ) ) ); ?>" class="contact" title="hafa samband">Hafa samband</a>

			<?php wp_footer(); ?>
		<!-- Don't forget analytics -->
		
	</body>
</html>