<?php get_header(); ?>
	<div id="main">
			
		<div class="content">
			<div class="main">
				
				<h1>Leitarniðurstöður</h1>
				<div class="row">
					<form action="/" method="get" class="search-again">
						<input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" placeholder="Leita aftur" />
						<input type="submit" id="searchsubmit" value="Leita aftur" />
					</form>
				</div>
				<?php 
					if(have_posts()) 
					{
						while(have_posts())
						{
							the_post();
							$post_type = get_post_type(get_the_id());
							if($post_type != 'page')
							{
								get_template_part('content');
							}
						}
					}
					else 
					{
						echo '<p>Leit þín að <b>' .get_search_query(). '</b> bar engan árangur</p>';
					}
				?>

			</div>
		</div>
	</div>

<?php get_footer(); ?>