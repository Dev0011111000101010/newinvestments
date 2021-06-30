<?php
/**
 * Search & Filter Pro 
 *
 * Sample Results Template
 * 
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      https://searchandfilter.com
 * @copyright 2018 Search & Filter
 * 
 * Note: these templates are not full page templates, rather 
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think 
 * of it as a template part
 * 
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs 
 * and using template tags - 
 * 
 * http://codex.wordpress.org/Template_Tags
 *
 */

if ( $query->have_posts() )
{
	?>

    <div id="ajax-insert" class="content row">
	<?php
	while ($query->have_posts())
	{
		$query->the_post();
		
		?>
        <?php get_template_part( 'template-parts/content', get_post_type() );?>
		<?php
	}
	?>
	    </div>
    <div class="pagination" style="justify-content: center;">

<!--        <div class="nav-previous">--><?php //next_posts_link( '<<', $query->max_num_pages ); ?><!--</div>-->
<!--        <div class="nav-next">--><?php //previous_posts_link( '>>' ); ?><!--</div>-->
		<?php
		/* example code for using the wp_pagenavi plugin */
		if (function_exists('wp_pagenavi'))
		{
			echo "<br />";
			wp_pagenavi( array( 'query' => $query ) );
		}
		?>
    </div>


	<?php
}
else
{
	esc_html_e("No Results Found", 'mf-invest-shop');
}
?>
