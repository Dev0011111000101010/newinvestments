<?php get_header(); ?>
<!--ranges:-->
<!--hold_investiciy-->
<!--dolya_kompanii_prodaetsa-->
<!--stoimost_mvp_minimum_viable_product_92-->
<!--oborot-->
<!--white_profit_last-->
<!--data_osnovaniya_biznesa_19-->
<!--summa_investicij_kotorye_nuzhny_biznesu_38-->
<!--minimum_business_ready_to_get-->
<!--now_collected_money-->
<!--posle_kakogo_kolichestva_deneg_nachnetsya_vypolnenie_plana_razvitiya_14-->
<!--vlozheno_svoih_deneg-->
<!--srok_investicij_maksimum_let_95-->
<!--srok_investiciy_let-->
<!--dohodnost_v_god_dlya_investora_kreditora-->
<style>
    table {
        border-collapse: separate;
        border-spacing: 0 15px;
    }
</style>
<?php
$metaarr = [
	'hold_investiciy',
	'dolya_kompanii_prodaetsa',
	'stoimost_mvp_minimum_viable_product_92',
	'oborot',
	'white_profit_last',
	'data_osnovaniya_biznesa_19',
	'summa_investicij_kotorye_nuzhny_biznesu_38',
	'minimum_business_ready_to_get',
	'now_collected_money',
	'posle_kakogo_kolichestva_deneg_nachnetsya_vypolnenie_plana_razvitiya_14',
	'vlozheno_svoih_deneg',
	'srok_investicij_maksimum_let_95',
	'srok_investiciy_let',
	'dohodnost_v_god_dlya_investora_kreditora'
];
function writeinDb($iid, $field) {
    if(in_array($field, ['hold_investiciy', 'dolya_kompanii_prodaetsa'])) {

    }else if(in_array($field, ['stoimost_mvp_minimum_viable_product_92', 'oborot', 'white_profit_last', 'posle_kakogo_kolichestva_deneg_nachnetsya_vypolnenie_plana_razvitiya_14', 'vlozheno_svoih_deneg', 'dohodnost_v_god_dlya_investora_kreditora'])) {

    }
}
$query   = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => - 1 ) ); ?>
<div class="container">
		<?php
		// проверяем есть ли посты в глобальном запросе - переменная $wp_query
		if ( $query->have_posts() ) {
			// перебираем все имеющиеся посты и выводим их
			while ( $query->have_posts() ) {
				$query->the_post();
				?>
                <?php var_dump(get_post_meta(get_the_ID(), 'vlozheno_svoih_deneg', true)); ?>
				<?php
			}
			?>
			<?php
		}
		?>
		<?php
		wptelegram_login();
		if ( function_exists( 'wptelegram_login' ) ) {
			wptelegram_login();
		}
		?>
<?php get_footer(); ?>
</div>
