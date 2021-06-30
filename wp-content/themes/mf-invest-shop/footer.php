<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MF_Invest_Shop
 */

?>

	</div><!-- #content -->


	<footer id="colophon" class="site-footer">

        <!--20200723_0306 правки = добавил-->
        <hr>

        <!-- Цены / стоимость-->
        <div class="site-info" style="text-align: center">
            <!--Ручками добавил жесткую ссылку-->
            <a href="<?= home_url(); ?>/czeny-stoimost/"  target="_blank">Цены / стоимость</a>
        </div><!-- /.Цены / стоимость-->

        <!-- Команда / Отзывы-->
        <div class="site-info" style="text-align: center">
            <!--Ручками добавил жесткую ссылку-->
            <a href="<?= home_url(); ?>/ambassador/"  target="_blank">Команда / Отзывы</a>
        </div><!-- /.Команда / Отзывы-->

        <!--MentorsFlow: Investments на телевидении-->
        <div class="site-info" style="text-align: center">
            <!--Ручками добавил жесткую ссылку-->
            <a href="<?= home_url(); ?>/mentorsflow-investments-na-televidenii/" target="_blank">MentorsFlow: Investments на телевидении</a>
        </div><!--/.MentorsFlow: Investments на телевидении-->

        <!--Telegram Login-->
        <div class="site-info" style="text-align: center">
            <!--Ручками добавил жесткую ссылку-->
            <a href="https://investments.mentorsflow.com/telegram-login/"  target="_blank">Возможность залогиниться через Telegram</a>
        </div><!-- .site-info -->

        <!--Предложения (что добавить / изменить в сайте)-->
        <div class="site-info" style="text-align: center">
            <!--Ручками добавил жесткую ссылку-->
            <a href="https://investments.mentorsflow.com/predlozheniya-chto-dobavit-izmenit-v-sajte/" target="_blank">Предложения (что добавить / изменить в сайте)</a>
        </div><!-- .site-info -->
        
        <!--Анекдоты и афоризмы на инвестиционную тематику-->
        <div class="site-info" style="text-align: center">
            <!--Ручками добавил жесткую ссылку-->
            <a href="https://investments.mentorsflow.com/anekdoty-i-aforizmy-na-investiczionnuyu-tematiku/"  target="_blank">Анекдоты и афоризмы на инвестиционную тематику</a>
        </div><!-- .site-info -->

        <!--Политика конфиденциальости и условия использования, контакты-->
        <div class="site-info" style="text-align: center">
            <!--Ручками добавил жесткую ссылку-->
            <a href="https://investments.mentorsflow.com/politika-konfidenczialnosti/"  target="_blank">Политика конфиденциальости и условия использования, контакты</a>
        </div><!-- .site-info -->
        
        <!--Предложения (что добавить / изменить в сайте)-->
        <div class="site-info" style="text-align: center">
            <!--Ручками добавил жесткую ссылку-->
            <a href="https://investments.mentorsflow.com/gde-i-kak-mozhno-prezentovat-svoj-proekt-investiczii-zajm-prodazha-doli/" target="_blank">Где и как можно презентовать свой проект (инвестиции / займ / продажа доли)?</a>
        </div><!-- .site-info -->

    <!-- 20201025_0936 Yandex.Metrika counter -->
<!--    <div class="yandex_metrika">-->
<!--         Yandex.Metrika counter-->
<!--        <script type="text/javascript" >-->
<!--            (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};-->
<!--                m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})-->
<!--            (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");-->
<!---->
<!--            ym(68670409, "init", {-->
<!--                clickmap:true,-->
<!--                trackLinks:true,-->
<!--                accurateTrackBounce:true,-->
<!--                webvisor:true,-->
<!--                ecommerce:"dataLayer"-->
<!--            });-->
<!--        </script>-->
<!--        <noscript><div><img src="https://mc.yandex.ru/watch/68670409" style="position:absolute; left:-9999px;" alt="" /></div></noscript>-->
<!--         /Yandex.Metrika counter-->
<!--    </div>-->


        <!--20200723_0306 правки = добавил-->
        <br>
        <br>

	</footer><!-- #colophon -->
</div><!-- #page -->

<!-- Popup section -->
<div class="popup-addsocial">
    <div class="popup-itself">
        <div class="helpers facebook-helper">
            Введите свой никнейм в Facebook
        </div>
        <div class="helpers instagram-helper">
            Введите свой никнейм в Instagram
        </div>
        <div class="helpers linkedin-helper">
            Введите свой никнейм в LinkedIn
        </div>
         <div class="helpers telegram-helper">
            Введите свой никнейм в Telegram
        </div>
        <label>
            <input name="social-name" placeholder="" type="text">
            <button class="submit">Подтвердить</button>
        </label>
    </div>
</div>
<?php
//$countries = get_terms(array('taxonomy'=>'countries', 'hide_empty'=>false, 'parent'=>null));
//var_dump($countries);
//foreach ($countries as $country) {
//	if(!$country->parent) {
//	    if($country->term_id!==142 || $country->term_id!==143 ||  $country->term_id!==179 ||  $country->term_id!==212) {
//        }
//    }
//}
//wp_update_term(179, 'countries', array(
//	'parent'=>null,
//));
//?>

<div class="modal modal-previewfile" id="modal-previewfile" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Проверка доступности файла</h5>
                <button type="button" class="btn-close close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalPreviewFile" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Проверка доступности файла</h5>-->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>

<!--<iframe width="300" height="300" src="https://drive.google.com/file/d/1r283Pd3qkLSAf1VvN-1QrLkTzaCPn5wC/preview?usp=drive_web" frameborder="0"></iframe>-->

<?php wp_footer(); ?>

</body>
</html>
<!-- Просто коммент для коммита -->
