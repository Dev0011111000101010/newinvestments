<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MF_Invest_Shop
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				mf_invest_shop_posted_on();
				mf_invest_shop_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php mf_invest_shop_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'mf-invest-shop' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mf-invest-shop' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
<?php global $post;?>
    <?php $sheetuploader = get_post_meta(get_the_ID(), 'sheet_uploader')[0]; ?>
    <div class="uploadedfiles">
        <div class="row">
            Файл проекта: <a target="blank" href="<?=$sheetuploader?>"><?=$sheetuploader?></a>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
