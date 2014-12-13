<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			
			<?php
				// Add restricted page names here
				$restrictedPages = array(
					'Macro-Invertebrates',
					'Water Quality',
					'Site Help'
				);


				$pageTitle = get_the_title();
				$isRestricted = 0;

				foreach ($restrictedPages as $restrictedPage) {
					if ($pageTitle == $restrictedPage) {
						$isRestricted = 1;
					}
				}
				
  				if($isRestricted && !is_user_logged_in()) {
					print "You Must be logged in to see this page.";
     				} 
				else {
					while ( have_posts() ) : the_post();
						get_template_part( 'content', 'page' );
						comments_template( '', true );
					endwhile; // end of the loop.
  				}
			?>



		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>