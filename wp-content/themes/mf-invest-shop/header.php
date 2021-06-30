<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MF_Invest_Shop
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<?php if ( isset($_GET['second_way']) &&  $_GET['second_way'] == true ) { ?>
        <script>
            window.addEventListener('load', function () {
                document.querySelector('.rcl-login').click();
                console.log('clicked rcl login')
            })
        </script>

        <style>
            .btn-mo.btn-facebook.login-button {
                display: none;
            }
        </style>

	<?php }else { ?>
        <style>
            div.nsl-container-block{
                display: none !important;
            }
        </style>
	<?php } ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>

<body <?php body_class(); ?>>
<?php
wp_reset_postdata();
if (!is_archive() && get_user_meta(get_current_user_id(), 'lid_of', true)) : ?>
<?php //var_dump(get_user_meta(9)); ?>
    <div style="display: none" id="lidgenname"><?php echo get_user_meta(get_current_user_id(), 'lid_of', true) ?></div>
<?php endif; ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text"
       href="#content"><?php esc_html_e( 'Skip to content', 'mf-invest-shop' ); ?></a>

    <div class="container ">
        <div id="masthead" class="site-header row  ">
            <div class="col d-flex flex-row ">
                <div class="row d-flex flex-row ">
                    <div class="col  logo_header ">
						<?php the_custom_logo(); ?>
                    </div>
                </div>
                <div class="row d-inline-flex text-left">
                    <div class="col  text_header_margin_logo">
                        <div class="row d-inline-flex text-left ">
                            <div class="col d-inline-flex text-left near_logo_text_h1 ">
                                <a href="<?= home_url(); ?>/">
                                    "MentorsFlow: investments": Денег у нас больше,
                                    чем проектов!
                                </a>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col d-inline-flex text-left near_logo_text_h2">
                                <a href="<?= home_url(); ?>/">
                                    На каждый товар есть свой покупатель!
                                </a>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col d-inline-flex text-left near_logo_text_h2">
                                <a href="<?= home_url(); ?>/">
                                    Инвестиции, займ, выкуп стартапа или действующего бизнеса
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- #masthead -->
        </div>
    </div>

<div style="display: none" class="alldatacounted">
    <h2>Сумма инвестиций которые нужны бизнесу: <?= get_transient('summa_investicij_kotorye_nuzhny_biznesu_38_total'); ?>$</h2>
    <h2>Сумма инвестированных денег: <?= get_transient('now_collected_money_vlozheno_svoih_deneg_total'); ?>$</h2>
</div>