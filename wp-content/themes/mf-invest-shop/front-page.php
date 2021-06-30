<?php
wp_head();

//$filters = get_terms( [
//	'taxonomy'   => 'filters',
//	'hide_empty' => false,
//] );
//
//
//// параметры по умолчанию
//$posts = new WP_Query( array(
//	'orderby'        => 'date',
//	'posts_per_page' => 20,
//	'order'          => 'DESC',
//	'post_type'      => 'post',
//) );


//$query = new WP_Query( array(
//	'tax_query' => array(
//		array(
//			'taxonomy' => 'filters',
//			'field'    => 'slug',
//		)
//	)
//) );
//
//$products = $query->posts;
//$args                     = array( 'post_type' => 'post' );
//$args['search_filter_id'] = 123;
//$query                    = new WP_Query( $args );
?>
<?php get_header() ?>


<div class="container">
    <!-- 20210227 Статистика денег по Порталу 1. Привлекут 2. Привлекли -->
    <div style="display: block" class="alldatacounted row">
        <div class="col">
            <h4>Статистика Портала привлечения инвестиций на <?echo $today = date("d-m-Y H:i:s"); ?>:</h4>
            <h4>Сумма инвестиций которые бизнесы готовы принять:  <h4 style="color: green;">$ <span class="num-beautify"> <?= get_transient('summa_investicij_kotorye_nuzhny_biznesu_38_total'); ?> </span></h4></h4>
            <h4>Сумма инвестированных денег: <h4 style="color: green;">$ <span class="num-beautify"> <?= get_transient('now_collected_money_vlozheno_svoih_deneg_total'); ?> </span> </h4></h4>
        </div>
    </div>

    <!-- Блок 2 кнопки: "Фильтр" + "Опубликовать проект" -->
    <div class="filters-block row">
        <!--    Фильтр (кнопка) -->
        <div class="btn-open-filter mx-auto btn btn-primary">
            <i class="fas fa-filter mx-auto"></i> Фильтр
        </div>

        <!--    Опубликовать проект (кнопка)    -->
        <?php get_current_user_id() ? $url = 'user='.get_current_user_id() : $url = 'rcl_User_URL'  ?>
        <a href="<?= home_url() ?>/account/?<?=$url?>&tab=postform"><div class=" btn btn-primary mx-auto">Опубликовать проект</div></a>
        <div class="filter-cont">
            <?php echo do_shortcode('[searchandfilter id="338"]'); ?>
        </div>
    </div>
    <!--Видеоинструкция: как опубликовать проект-->
    <div class="filters-block row">
        <a href="<?= home_url(); ?>/videoinstrukcziya-kak-opublikovat-proekt/"><div class=" btn btn-primary mx-autoб">Видеоинструкции</div></a>
        <div class="filter-cont">
            <!-- --><?php /*echo do_shortcode('[searchandfilter id="338"]'); */?>
        </div>
    </div>

    <!--Вывод результатов = ПРОЕКТЫ по итогам примененной фильтрации-->
    <?php echo do_shortcode('[searchandfilter id="338" show="results"]'); ?>


    <!--20201025_0727 Липкая кнопка фильтров JS c сайта https://html5css.ru/howto/howto_js_scroll_to_top.php-->
    <div class="sticky_button_from_site">
        <div class="sticky_button btn-open-filter">
            <button onclick="topFunction()" id="myBtn" title="Go to top">Применить фильтры
                <!--Отработать вывод фильтров-->
<!--                <div class="filter-cont">-->
<!--                    --><?php //echo do_shortcode('[searchandfilter id="338"]'); ?>
<!--                </div>-->
            </button>
        </div>

        <div class="js">
            <script>
                // When the user scrolls down 20px from the top of the document, show the button
                window.onscroll = function() {scrollFunction()};

                function scrollFunction() {
                    // if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    //     document.getElementById("myBtn").style.display = "block";
                    // } else {
                    //     document.getElementById("myBtn").style.display = "none";
                    // }
                }

                // When the user clicks on the button, scroll to the top of the document
                function topFunction() {
                    // document.body.scrollTop = 0;
                    // document.documentElement.scrollTop = 0;
                }
            </script>
        </div>
    </div>

    <!--20201025_0727 Липкая кнопка СБРОСА фильров JS c сайта https://html5css.ru/howto/howto_js_scroll_to_top.php-->
    <div class="sticky_button_from_site">
        <div class="sticky_button btn-open-filter">
            <a href="<?= home_url() ?>">
                <button onclick="topFunction1()" id="myBtn1" title="Go to top1">Сбросить фильтры
                    <!--Отработать вывод фильтров-->
<!--                    <div class="filter-cont">-->
<!--                        --><?php //echo do_shortcode('[searchandfilter id="338"]'); ?>
<!--                    </div>-->
                </button>
            </a>
        </div>

        <div class="js">
            <script>
                // When the user scrolls down 20px from the top of the document, show the button
                window.onscroll = function() {scrollFunction1()};

                function scrollFunction1() {
                    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                        document.getElementById("myBtn1").style.display = "block";
                        document.getElementById("myBtn").style.display = "block";
                    } else {
                        document.getElementById("myBtn1").style.display = "none";
                        document.getElementById("myBtn").style.display = "none";
                    }
                }

                // When the user clicks on the button, scroll to the top of the document
                function topFunction1() {
                    document.body.scrollTop = 0;
                    document.documentElement.scrollTop = 0;
                }
            </script>
        </div>
    </div>
</div>

<!-- Facebook комментарии (движок) -->
<!-- <div id="fb-root"></div> -->
<!-- <script async defer crossorigin="anonymous" src="https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v6.0"></script> -->
<!-- ./Facebook комментарии (движок) -->

<!-- Facebook комментарии (форма для заполнения) -->
<!-- <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="560" data-numposts="5"></div> -->
<!-- ./Facebook комментарии (форма для заполнения) -->

<?php
wp_footer();
?>
<?php
get_footer();
?>
<!-- Просто коммент для коммита -->

