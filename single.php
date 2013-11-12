
<?php get_header(); ?>
	<?php is_singular(); ?> 
		<?php 
			$categories = get_the_category();
			//print_r($categories);
		?>
		<div id="main" role="main">
			<div class="row">
				<div class="span9">
					<div class="news-item">
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'content', 'single', get_post_format() ); ?>
							<?php 
								$category = get_the_category(get_the_ID());
								if($category[0]->cat_name == "Fundargerðir til samþykktar")
								{
									if( function_exists('dot_irecommendthis') ) dot_irecommendthis();	
									comments_template();
								}
							?>
						<?php endwhile; ?>

					</div>
					
					<div class="button" onclick="history.go(-1)">Til baka</div>
				</div>

				<div class="span3">
					<?php
						if($categories)
						{
							foreach ($categories as $category) {
								if($category->slug == "ur-fundargerdum")
								{
									get_sidebar('fundargerdir');
								}
								if($category->slug == "frettir")
								{
									get_sidebar('news');
								}
								if($category->slug == "fundargerdir-blom")
								{
									get_sidebar('blom');
								}
								if($category->slug == "fundargerdir-gardplontur")
								{
									get_sidebar('gardplontur');
								}
								if($category->slug =="fundagerdir-graenmeti")
								{
									get_sidebar('graenmeti');
								}
							}
						}
					?>
				</div>
			</div>
		</div><!-- #main -->

<?php get_footer(); ?>	