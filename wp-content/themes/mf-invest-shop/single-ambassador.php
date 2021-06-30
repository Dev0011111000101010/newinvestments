<?php


get_header();
?>
    <!-- 20201218_1402 Из нашего шаблона вывод поста скопировал-->
    <div id="primary" class="content-area mt-5">
        <main id="main" class="site-main">
            <!--Выводит пост из WP-RECALL, тут не нужно-->
<!--            <div class="container">-->
<!--                -->
<!--                <div class="row ambassador-top">-->
<!--                    <div class="col-md-6">-->
<!--				        --><?php //the_post_thumbnail(); ?>
<!--                    </div>-->
<!--                    <div class="col-md-6 d-flex flex-column justify-content-center my-3 my-md-0">-->
<!--                        <h2 class="mb-3">--><?php //the_title(); ?><!--</h2>-->
<!--                        <p>--><?php //echo get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true); ?><!--</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            <div class="container">
                <?php the_content(); ?>
        </main><!-- #main -->
    </div><!-- #primary --> <!-- 20201218_1402 Из нашего шаблона вывод поста скопировал-->

    <!-- 20201218_1402 Из нашего шаблона вывод поста скопировал-->


<?php
//get_sidebar();
get_footer();
