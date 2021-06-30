<?php
$terms = get_the_terms(get_the_ID(), 'taxonomy_ambassador');
$termsfilter = [];
$termsstring = '';

for ($i=0; $i<count($terms); $i++) {
    $term = $terms[$i];
	$termsstring.= '"'.$term->slug.'"';

	if(($i+1)<count($terms)) {
		$termsstring.= ',';
    }
}

$termsstring = 'data-groups=\'['.$termsstring.']\'';
?>
<div <?= $termsstring ?> class="col-sm-4 mb-3 ambassador-card-wrap">
    <div class="card">
        <img class="card-img-top" src="<?php echo the_post_thumbnail_url( 'medium' ); ?>" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title"><?php the_title(); ?></h5>
			<?php if ( get_the_term_list( get_the_ID(), 'taxonomy_ambassador' ) ) : ?>
                <p class="ambassador-taxonomieslist"><?php echo strip_tags(get_the_term_list( get_the_ID(), 'taxonomy_ambassador', '', ', ' )); ?></p>
			<?php endif; ?>
            <p class="card-text"><?php echo wp_trim_words(get_post_meta( get_the_ID(), '_yoast_wpseo_metadesc', true ), 10); ?></p>
            <a href="<?php the_permalink(); ?>" class="ambassador-more"><span>Подробнее</span> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M443.5 162.6l-7.1-7.1c-4.7-4.7-12.3-4.7-17 0L224 351 28.5 155.5c-4.7-4.7-12.3-4.7-17 0l-7.1 7.1c-4.7 4.7-4.7 12.3 0 17l211 211.1c4.7 4.7 12.3 4.7 17 0l211-211.1c4.8-4.7 4.8-12.3.1-17z"/></svg></a>
        </div>
    </div>
</div>