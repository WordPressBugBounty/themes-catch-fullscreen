<?php
/**
 * The template part for displaying single posts
 *
 * @package Catch_Fullscreen
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	$header_image = catch_fullscreen_featured_overall_image();

	if ( 'disable' === $header_image ) : ?>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php if ( 'post' === get_post_type() ) :
				catch_fullscreen_entry_header();
			endif; ?>
		</header><!-- .entry-header -->
	<?php endif; ?>

	<?php
	$single_layout = get_theme_mod( 'catch_fullscreen_single_layout', 'disabled' );

	if ( 'disabled' !== $single_layout ) {
		catch_fullscreen_post_thumbnail( $single_layout );
	}
	?>

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'catch-fullscreen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'catch-fullscreen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php catch_fullscreen_entry_footer(); ?>

</article><!-- #post-## -->
