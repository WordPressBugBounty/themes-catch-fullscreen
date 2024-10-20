<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Base_Theme
 */
$posts_pagination = absint( get_theme_mod( 'catch_fullscreen_posts_pagination_enable' ) );

get_header(); ?>

	<?php if ( is_front_page() && is_home() ) :
		// Start the loop.
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content/content', 'home' );
		// End the loop.
		endwhile;

		if( $posts_pagination ) :
			catch_fullscreen_content_nav();
		endif;
	else : ?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<div class="section-content-wrapper">
					<?php if ( have_posts() ) : ?>

					<?php if ( is_home() && ! is_front_page() ) : ?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>
					<?php endif; ?>

					<?php
					// Start the loop.
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content/content', get_post_format() );

					// End the loop.
					endwhile;

					catch_fullscreen_content_nav();
					?>
				<?php
				else :
					get_template_part( 'template-parts/content/content', 'none' );

				endif;
				?>
				</div><!-- .section-content-wrapper -->
			</main><!-- .site-main -->
		</div><!-- .content-area -->
	<?php get_sidebar(); ?>
<?php endif; ?>
<?php get_footer(); ?>
