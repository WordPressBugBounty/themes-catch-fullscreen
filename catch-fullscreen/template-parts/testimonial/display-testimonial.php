<?php
/**
 * The template for displaying testimonial items
 *
 * @package Catch_Fullscreen
 */
?>

<?php
$enable = get_theme_mod( 'catch_fullscreen_testimonial_option', 'disabled' );

if ( ! catch_fullscreen_check_section( $enable ) ) {
	// Bail if featured content is disabled
	return;
}

$headline    = get_option( 'jetpack_testimonial_title', esc_html__( 'Testimonials', 'catch-fullscreen' ) );
$subheadline = get_option( 'jetpack_testimonial_content' );

$classes[] = 'section testimonial-wrapper';

$classes[] = 'layout-one';

if ( ! $headline && ! $subheadline ) {
	$classes[] = 'no-headline';
}

$image = get_theme_mod( 'catch_fullscreen_testimonials_main_image' );

?>

<?php if ( $image ) : ?>
<div id="testimonial-content-section" class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>" style="background-image: url( <?php echo esc_url( $image ); ?> )">
<?php else : ?>
	<div id="testimonial-content-section" class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
	<?php endif; ?>
	<div class="wrapper">

	<?php if ( $headline || $subheadline ) : ?>
		<div class="section-heading-wrapper testimonial-content-section-headline">
		<?php if ( $headline ) : ?>
			<div class="section-title-wrapper">
				<h2 class="section-title"><?php echo wp_kses_post( $headline ); ?></h2>
			</div><!-- .section-title-wrapper -->
		<?php endif; ?>

		<?php if ( $subheadline ) : ?>
			<div class="taxonomy-description-wrapper">
				<div class="section-subtitle"><?php echo wp_kses_post( $subheadline ); ?></div>
			</div><!-- .taxonomy-description-wrapper -->
		<?php endif; ?>
		</div><!-- .section-heading-wrapper -->
	<?php endif; ?>

		<div class="section-content-wrapper testimonial-content-wrapper">
			<div class="cycle-slideshow"
				data-cycle-log="false"
				data-cycle-pause-on-hover="true"
				data-cycle-swipe="true"
				data-cycle-auto-height=container
				data-cycle-loader=false
				data-cycle-slides=".testimonial_slider_wrap"
				data-cycle-pager="#testimonial-slider-pager"
				data-cycle-prev="#testimonial-slider-prev"
				data-cycle-next="#testimonial-slider-next"
				>

				<div class="testimonial_slider_wrap">

			<?php get_template_part( 'template-parts/testimonial/post-types', 'testimonial' ); ?>

				</div><!-- .testimonial_slider_wrap -->
			</div><!-- .cycle-slideshow -->

			<div class="controller">
				<!-- prev/next links -->
				<button id="testimonial-slider-prev" class="cycle-prev" aria-label="Previous">
				<span class="screen-reader-text"><?php esc_html_e( 'Previous Slide', 'catch-fullscreen' ); ?></span><?php echo catch_fullscreen_get_svg( array( 'icon' => 'angle-down' ) ); ?>
				</button>

				<!-- empty element for pager links -->
				<div id="testimonial-slider-pager" class="cycle-pager"></div>

				<button id="testimonial-slider-next" class="cycle-next" aria-label="Next">
				<span class="screen-reader-text"><?php esc_html_e( 'Next Slide', 'catch-fullscreen' ); ?></span><?php echo catch_fullscreen_get_svg( array( 'icon' => 'angle-down' ) ); ?>
				</button>
			</div><!-- .controller -->
		</div><!-- .section-content-wrapper -->
	</div><!-- .wrapper -->
</div><!-- .testimonial-content-section -->
