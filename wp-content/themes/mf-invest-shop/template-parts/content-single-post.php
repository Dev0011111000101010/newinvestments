<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MF_Invest_Shop
 */

?>

<!-- Технические данные для идентификации поста-->
<article id="post-<?php the_ID(); ?>">



    <!--Счетчик страниц-->
    <div>
        <!--Увеличить Счетчик Просмотров Страниц и вывести статистику этой записи-->
        <!--    --><?php /*pvc_stats_update( $postid, 1 ); */?>

    </div>





    <hr>


    <div class="container">
        <!-- Вывод H1-->
        <div class="row">
            <div class="entry-header col text-center">
                <?php
                if ( is_singular() ) :
                    the_title( '<h1 class="entry-title">', '</h1>' );
                else :
                    the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                endif;?>
            </div>
        </div>



        <!-- Вывод thumbnail-->
		<?php if ( $post->thumbnailimg ) { ?>
            <div class="row">
                <div class="container-fluid container-fluid_post-img">
                    <!--Thumbnail поста (картинка превьюха)-->
                    <div class="container-fluid post-img text-center">
						<?php if ( $post->thumbnailimg ) { ?>
                            <hr>
                            <?php if(!strpos($post->thumbnailimg, 'preview?usp=drive_web')) { ?>
                                <iframe src="https://drive.google.com/file/d/<?= getDriveID($post->thumbnailimg); ?>/preview?usp=drive_web" frameborder="0"></iframe>
							<?php } else { ?>
                                <iframe src="<?= $post->thumbnailimg ?>" frameborder="0"></iframe>
							<?php } ?>
						<?php } else { ?>
                            <div class="no-image"></div>
						<?php } ?>
                        <br>
                        <div class="wraping"></div>
                    </div>
                </div>
            </div>
		<?php } ?>

        <hr>

        <!-- Данные ПОДТВЕРЖДЕНЫ-->
        <?php
        //Переменная с id автора статьи
        $userid = $post->post_author;
        ?>
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <div class="row  text-center d-flex flex-row">
                            <!--Обороты предприятия ПОДТВЕРЖДЕНЫ:-->
                            <div class="col-lg-6 col-xl text-center da_net_h1 ">
                                <div class="row">
                                    <div class="col jalobi_commenty" >
                                        <a class="jalobi_commenty_a" href="#oborot"><h4>Обороты</h4><h6>предприятия
                                                ПОДТВЕРЖДЕНЫ:</h6></a>
                                    </div>
                                </div>
                                <div>
                                    <?php $user_is_verified_oboroti = get_field('user_is_verified_oboroti', "user_$userid");
                                    $user_is_verified_oboroti_label = $user_is_verified_oboroti['label'];
                                    switch ($user_is_verified_oboroti['value']) {
                                        case 'verified': ?>

                                            <div class="verified_yes"><?=$user_is_verified_oboroti_label ?></div>

                                            <?php break;
                                        case 'checkordered': ?>

                                            <div class="verified_checkordered"><?=$user_is_verified_oboroti_label ?></div>

                                            <?php break;
                                        case 'checkwithoutdocs': ?>

                                            <div class="verified_checkwithoutdocs"><?=$user_is_verified_oboroti_label ?></div>

                                            <?php break;
                                        case 'checknotverified': ?>

                                            <div class="verified_checknotverified"><?=$user_is_verified_oboroti_label ?></div>

                                            <?php break;
                                        case 'notverified':
                                        case null:
                                        default: ?>

                                            <div class="verified_no">
                                                <?php if(is_null($user_is_verified_oboroti_label)) {?>
                                                    Не подтверждены
                                                <?php } else {?>

                                                    <?=$user_is_verified_oboroti_label ?>

                                                <?php } ?></div>

                                            <?php break;?>
                                        <?php } ?>
                                </div>
                            </div>

                            <!--Прибыль предприятия ПОДТВЕРЖДЕНА:-->
                            <div class="col-lg-6 col-xl text-center da_net_h1 ">
                                <div class="row">
                                    <div class="col jalobi_commenty" >
                                        <a class="jalobi_commenty_a" href="#oborot"><h4>Прибыль</h4><h6> предприятия
                                                ПОДТВЕРЖДЕНА:</h6></a>
                                    </div>
                                </div>
                                <div>
                                    <?php $user_is_verified_pribil = get_field('user_is_verified_pribil', "user_$userid");
                                    $user_is_verified_pribil_label = $user_is_verified_pribil['label'];
                                    switch ($user_is_verified_pribil['value']) {
                                        case 'verified': ?>

                                            <div class="verified_yes"><?=$user_is_verified_pribil_label ?></div>

                                            <?php break;
                                        case 'checkordered': ?>

                                            <div class="verified_checkordered"><?=$user_is_verified_pribil_label ?></div>

                                            <?php break;
                                        case 'checkwithoutdocs': ?>

                                            <div class="verified_checkwithoutdocs"><?=$user_is_verified_pribil_label ?></div>

                                            <?php break;
                                        case 'checknotverified': ?>

                                            <div class="verified_checknotverified"><?=$user_is_verified_pribil_label ?></div>

                                            <?php break;
                                        case 'notverified':
                                        case null:
                                        default: ?>

                                            <div class="verified_no">
                                                <?php if(is_null($user_is_verified_pribil_label)) {?>
                                                    Не подтверждены
                                                <?php } else {?>

                                                    <?=$user_is_verified_pribil_label ?>

                                                <?php } ?></div>

                                            <?php break;?>
                                        <?php } ?>
                                </div>
                            </div>

                            <!--Личность как минимум одного из учредителей указанных в проекте ПОДТВЕРЖДЕНА:-->
                            <div class="col-lg-6 col-xl text-center da_net_h1 ">
                                <div class="row">
                                    <div class="col jalobi_commenty" >
                                        <a class="jalobi_commenty_a" href="#komanda"><h4>Личность</h4><h6> 
                                                учредителя ПОДТВЕРЖДЕНА:</h6></a>
                                    </div>
                                </div>
                                <div>
                                    <?php $user_is_verified = get_field('user_is_verified', "user_$userid");
                                    $user_is_verified_label = $user_is_verified['label'];
                                    switch ($user_is_verified['value']) {
                                        case 'verified': ?>

                                            <div class="verified_yes"><?=$user_is_verified_label ?></div>

                                            <?php break;
                                        case 'checkordered': ?>

                                            <div class="verified_checkordered"><?=$user_is_verified_label ?></div>

                                            <?php break;
                                        case 'checkwithoutdocs': ?>

                                            <div class="verified_checkwithoutdocs"><?=$user_is_verified_label ?></div>

                                            <?php break;
                                        case 'checknotverified': ?>

                                            <div class="verified_checknotverified"><?=$user_is_verified_label ?></div>

                                            <?php break;
                                        case 'notverified':
                                        case null:
                                        default: ?>

                                            <div class="verified_no">
                                                <?php if(is_null($user_is_verified_label)) {?>
                                                    Не подтверждены
                                                <?php } else {?>

                                                    <?=$user_is_verified_label ?>

                                                <?php } ?></div>

                                            <?php break;?>
                                        <?php } ?>
                                </div>
                            </div>

                            <!--Проходил программу MentorsFlow-->
                            <div class="col-lg-6 col-xl text-center da_net_h1 ">
                                <div class="row">
                                    <div class="col jalobi_commenty" >
                                        <a class="jalobi_commenty_a" href="https://www.mentorsflow.com/" target="_blank">
                                            <h4>Проходил</h4>
                                            <h6>программу MentorsFlow</h6></a>
                                    </div>
                                </div>
                                <div>
                                    <?php $user_is_verified_mentorsflow = get_field('user_is_verified_mentorsflow', "user_$userid");
                                    $user_is_verified_mentorsflow_label = $user_is_verified_mentorsflow['label'];
                                    switch ($user_is_verified_mentorsflow['value']) {
                                        case 'verified': ?>

                                            <div class="verified_yes"><?=$user_is_verified_mentorsflow_label ?></div>

                                            <?php break;
                                        case 'checkordered': ?>

                                            <div class="verified_checkordered"><?=$user_is_verified_mentorsflow_label ?></div>

                                            <?php break;
                                        case 'checkwithoutdocs': ?>

                                            <div class="verified_checkwithoutdocs"><?=$user_is_verified_mentorsflow_label ?></div>

                                            <?php break;
                                        case 'checknotverified': ?>

                                            <div class="verified_checknotverified"><?=$user_is_verified_mentorsflow_label ?></div>

                                            <?php break;
                                        case 'notverified':
                                        case null:
                                        default: ?>

                                            <div class="verified_no">
                                                <?php if(is_null($user_is_verified_mentorsflow_label)) {?>
                                                    Не подтверждены
                                                <?php } else {?>

                                                    <?=$user_is_verified_mentorsflow_label ?>

                                                <?php } ?></div>

                                            <?php break;?>
                                        <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <!-- Контакты-->
        <div class="row ">
            <div class="col zero_padding_zero_margin">
                <!-- Автор публикации + контакты-->
                <?php
                //the_content();
                do_action( 'my_post_content' );
                ?>
            </div>
        </div>

        <hr>

        <!-- Комменты, жалобы, Facebook комменты = ссылки на страницы-->
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <div class="row  text-center">
                            <div class="col-xl text-center da_net_h1 jalobi_commenty_fb jalobi_commenty_fb_a_ellipsis"
                                 style="border: solid #eeeeee 1px; border-radius: 5px;">
                                <a class="jalobi_commenty_fb_a"
                                   href="<?= home_url(); ?>/os-proekt-dolzhen-byt-udalen-po-prichine/"
                                   target="_blank"><h6>Проект должен быть удален по причине…</h6></a>
                            </div>
                            <div class="col-xl text-center da_net_h1 jalobi_commenty_fb jalobi_commenty_fb_a_ellipsis"
                                 style="border: solid #eeeeee 1px; border-radius: 5px">
                                <a
                                    class="jalobi_commenty_fb_a_test"
                                    href="<?= home_url(); ?>/os-kontakty-avtora-proekta-ne-rabochie/"
                                    target="_blank"><h6>Контакты не рабочие</h6></a>
                            </div>
                            <div class="col-xl text-center da_net_h1 jalobi_commenty_fb jalobi_commenty_fb_a_ellipsis"
                                 style="border: solid #eeeeee 1px; border-radius: 5px">
                                <a
                                    class="jalobi_commenty_fb_a"
                                    href="<?= home_url(); ?>/os-zayavit-o-moshennichestve/"
                                    target="_blank"><h6>Заявить о мошенничестве</h6></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <!--12. Бизнес-цели-->
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col text-center nazvanie_razdela">
                        <h4>Цели: инвестиции / займ / продажа</h4>
                    </div>
                </div>
                <div class="row">
                    <!--12. Бизнес-цели-->
                    <div class="col text-center nazvanie_razdela_knopka" id="business_goals">
                        <p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample12"
                               role="button" aria-expanded="false"
                               aria-controls="multiCollapseExample12">Бизнес-цели</a>
                        </p>
                        <div class="row ">
                            <div class="col otkivaushayasya_karto4ka">
                                <div class="collapse multi-collapse" id="multiCollapseExample12">
                                    <div class="card card-body">
                                        <div class="col text-left">
                                            <!*--------------------------------------
                                            * Вид: таксономия
                                            * Slug: Meta-key:taxonomy-business_goal
                                            * Название: Бизнес-цели (инвестиции / займ / продажа)
                                            * Вид div-а: taxonomy_field_single_post_1
                                            * ------------------------------------->
                                            <div class="taxonomy_field_single_post_1">
                                                <!--Check if the post has checked business_goal taxonomy -->
                                                <?php
                                                $business_goal = get_the_terms(get_the_ID(), 'business_goal');
                                                if(isset($business_goal) && is_array($business_goal)) {
                                                    echo '
                                                        <div class="col text-center">
                                                            <h6>Бизнес-цели: инвестиции / займ / продажа</h6>
                                                        </div>
                                                    ';
                                                    echo '<p>';
                                                    for($i=0; $i<count($business_goal);$i++) {
                                                        echo  $business_goal[$i]->name;
                                                        if((($i == count($business_goal) || ($i+1 == count($business_goal) )) == false)) echo  '<li>';
                                                    }
                                                    echo '</p>';
                                                    ?>
                                                <?php } ?>
                                                <!*--------------------------------------
                                                *    /.
                                                *    Вид: таксономия
                                                *    Slug: Meta-key:taxonomy-business_goal
                                                *    Название: Бизнес-цели (инвестиции / займ / продажа)
                                                *    Вид div-а: taxonomy_field_single_post_1
                                                * ------------------------------------->
                                            </div>
                                            <div class="col text-center">
                                                <p>
                                                    <a class="btn btn-primary" data-toggle="collapse"
                                                       href="#multiCollapseExample12" role="button" aria-expanded="false"
                                                       aria-controls="multiCollapseExample12">Свернуть</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <!--Основные финансовые вопросы-->
        <!-- 9. Доходность в год ( % ) 10. Гарантии возврата 11. Условия возврата -->
		<?php
		if ( ( is_array( $garantii_vozvrata ) && isset( $garantii_vozvrata[0] ) ) or isset( $ysloviia_vozvrata[0] ) or isset( $post->dohodnost_v_god_dlya_investora_kreditora ) ) : ?>
            <div class="row ">
                <div class="col">
                    <div class="row">
                        <div class="col text-center nazvanie_razdela">
                            <h4>Основные финансовые вопросы</h4>
                        </div>
                    </div>
                    <!-- 9. Доходность в год-->
					<?php if ( $post->dohodnost_v_god_dlya_investora_kreditora ) : ?>
                        <div class="row">
                            <div class="col text-center nazvanie_razdela_knopka">
                                <p>
                                    <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample9"
                                       role="button" aria-expanded="false" aria-controls="multiCollapseExample9">Доходность
                                        в год</a>
                                </p>
                                <div class="row">
                                    <div class="col otkivaushayasya_karto4ka">
                                        <div class="collapse multi-collapse" id="multiCollapseExample9">
                                            <div class="card card-body">
                                                <div class="col text-center">
                                                    <!*--------------------------------------
                                                    * Вид: тексовое поле
                                                    * Slug: dohodnost_v_god_dlya_investora_kreditora
                                                    * Название: Доходность в год ( % ) для инвестора (кредитора)
                                                    * Вид div-а: text_field_single_post_1
                                                    * ------------------------------------->
                                                    <div class="text_field_single_post_1">
														<?php if ( $post->dohodnost_v_god_dlya_investora_kreditora ) : ?>
                                                            <h4><u>Доходность</u></h4>
                                                            <div class="row">
                                                                <div class="col text-right" style="color: #0069d9">
                                                                    <h3><?= $post->dohodnost_v_god_dlya_investora_kreditora ?></h3>
                                                                </div>
                                                                <div class="col text-left d-flex align-items-center">
                                                                    <h6>% годовых</h6></div>
                                                            </div>

														<?php endif; ?>
                                                        <!*--------------------------------------
                                                        * /.
                                                        * Вид: тексовое поле
                                                        * ------------------------------------->
                                                    </div>
                                                    <!--Текстовое поле: вывод текста Коммента в 1000 символов-->
                                                    <div class="col text-left p-0">
                                                        <!*--------------------------------------
                                                        * Вид: тексовое поле
                                                        * Slug: kk_dohodnost_v_god
                                                        * Название: Краткий комментарий: Доходность в год
                                                        * ------------------------------------->
                                                        <div class="text_field_single_post_1 row p-0">
															<?php if ( $post->kk_dohodnost_v_god ) : ?>
                                                                <div class="col text-left p-0" style="color: black">
                                                                    <h6><?= $post->kk_dohodnost_v_god ?></h6>
                                                                </div>
															<?php endif; ?>
                                                            <!*--------------------------------------
                                                            * /.
                                                            * Вид: тексовое поле
                                                            * ------------------------------------->
                                                        </div>
                                                    </div>
                                                    <p>
                                                        <a class="btn btn-primary" data-toggle="collapse"
                                                           href="#multiCollapseExample9" role="button"
                                                           aria-expanded="false" aria-controls="multiCollapseExample9">Свернуть</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php endif; ?>
                    <!--10. Гарантии возврата-->
					<?php $garantii_vozvrata = get_post_meta( get_the_ID(), 'garantii_vozvrata', true );
					if ( is_array( $garantii_vozvrata ) && isset( $garantii_vozvrata[0] ) ) {
						?>
                        <div class="row">
                            <div class="col text-center nazvanie_razdela_knopka">
                                <p>
                                    <a onclick="ym(68670409,'reachGoal','garantii_vozvrata')" class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample10" role="button" aria-expanded="false" aria-controls="multiCollapseExample10">Гарантии
                                        возврата</a>
                                </p>
                                <div class="row">
                                    <div class="col otkivaushayasya_karto4ka">
                                        <div class="collapse multi-collapse" id="multiCollapseExample10">
                                            <div class="card card-body">
                                                <div class="col text-left">
													<?php foreach ( $garantii_vozvrata as $single ) {
														echo '<li>' . $single . '</li>';
													} ?>
                                                    <!--Текстовое поле: вывод текста Коммента в 1000 символов-->
                                                    <div class="col text-left p-0">
                                                        <!*--------------------------------------
                                                        * Вид: тексовое поле
                                                        * Slug: kk_garantii_vozvrata
                                                        * Название: Краткий комментарий: Гарантии возврата
                                                        * ------------------------------------->
                                                        <div class="text_field_single_post_1 row p-0">
															<?php if ( $post->kk_garantii_vozvrata ) : ?>
                                                                <div class="col text-left p-0" >
                                                                    <h6><?= $post->kk_garantii_vozvrata ?></h6>
                                                                </div>
															<?php endif; ?>
                                                            <!*--------------------------------------
                                                            * /.
                                                            * Вид: тексовое поле
                                                            * ------------------------------------->
                                                        </div>
                                                    </div>
                                                    <div class="col text-center">
                                                        <p>
                                                            <a class="btn btn-primary" data-toggle="collapse"
                                                               href="#multiCollapseExample10" role="button"
                                                               aria-expanded="false" aria-controls="multiCollapseExample10">Свернуть</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php } ?>
                    <!--11. Условия возврата-->
					<?php $ysloviia_vozvrata = get_post_meta( get_the_ID(), 'ysloviia_vozvrata', true );
					if ( is_array( $ysloviia_vozvrata ) && isset( $ysloviia_vozvrata[0] ) ) {
						?>
                        <div class="row">
                            <div class="col text-center nazvanie_razdela_knopka">
                                <p>
                                    <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample11"
                                       role="button" aria-expanded="false" aria-controls="multiCollapseExample11">Условия
                                        возврата</a>
                                </p>
                                <div class="row">
                                    <div class="col otkivaushayasya_karto4ka">
                                        <div class="collapse multi-collapse" id="multiCollapseExample11">
                                            <div class="card card-body">
                                                <div class="col text-left">
													<?php foreach ( $ysloviia_vozvrata as $single ) {
														echo '<li>' . $single . '</li>';
													} ?>

                                                    <hr>
                                                    <!--Текстовое поле: вывод текста Коммента в 1000 символов-->
                                                    <div class="col text-left p-0">
                                                        <!*--------------------------------------
                                                        * Вид: тексовое поле
                                                        * Slug: kk_usloviya_vozvrata
                                                        * Название: Краткий комментарий: Условия возврата
                                                        * ------------------------------------->
                                                        <div class="text_field_single_post_1 row p-0">
															<?php if ( $post->kk_usloviya_vozvrata ) : ?>
                                                                <div class="col text-left p-0" >
                                                                    <h6><?= $post->kk_usloviya_vozvrata ?></h6>
                                                                </div>
															<?php endif; ?>
                                                            <!*--------------------------------------
                                                            * /.
                                                            * Вид: тексовое поле
                                                            * ------------------------------------->
                                                        </div>
                                                    </div>
                                                    <div class="col text-center">
                                                        <p>
                                                            <a class="btn btn-primary" data-toggle="collapse"
                                                               href="#multiCollapseExample11" role="button"
                                                               aria-expanded="false" aria-controls="multiCollapseExample11">Свернуть</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php } ?>
                </div>
            </div>
		<?php endif; ?>

        <hr>

        <!--Дополнительные финансовые вопросы-->
        <!--1. Сумма инвестиций 2. Уже собрано денег 4. После какого количества денег начнется выполнение плана развития? 5. Срок инвестиций 6. Hold инвестиций 7. Минимальная сумма инвестиций 8. Вложено своих денег-->
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col text-center nazvanie_razdela">
                        <h4>Дополнительные финансовые вопросы</h4>
                    </div>
                </div>
                <div class="row">
                    <!-- 1. Сумма инвестиций которые нужны бизнесу ( $ )-->
                    <div class="col text-center nazvanie_razdela_knopka">
                        <p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1"
                               role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Сумма
                                инвестиций, которая нужна</a>
                        </p>
                        <div class="row">
                            <div class="col otkivaushayasya_karto4ka">
                                <div class="collapse multi-collapse" id="multiCollapseExample1">
                                    <div class="card card-body">
                                        <div class="col text-center">
                                            <!*--------------------------------------
                                            * Вид: тексовое поле
                                            * Slug: summa_investicij_kotorye_nuzhny_biznesu_38
                                            * Название: Сумма инвестиций которые нужны бизнесу (в $ США )
                                            * Вид div-а: text_field_single_post_1
                                            * ------------------------------------->

                                                <div class="text_field_single_post_1">
                                                    <?php if ( $post->summa_investicij_kotorye_nuzhny_biznesu_38 ) : ?>
                                                        <div class="row">

                                                            <div class="col text-right"
                                                                 style="color: green; min-width: auto;">

                                                                    <h3>
                                                                        <!--<span class="num-beautify"> делает цифры разбитыми на тысячи и миллионы-->
                                                                        <span class="num-beautify">
                                                                            <?= $post->summa_investicij_kotorye_nuzhny_biznesu_38 ?>
                                                                        </span>
                                                                    </h3>
                                                            </div>

                                                            <div class="col text-left d-flex align-items-center"
                                                                 style="min-width: auto;"><h6>$ США</h6>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>

                                                <!*--------------------------------------
                                                * /.
                                                * Вид: тексовое поле
                                                * Slug: summa_investicij_kotorye_nuzhny_biznesu_38
                                                * Название: Сумма инвестиций которые нужны бизнесу (в $ США )
                                                * Вид div-а: text_field_single_post_1
                                                * ------------------------------------->

                                                <!--Текстовое поле: вывод текста Коммента в 1000 символов-->
                                                <div class="col text-center">
                                                    <!*--------------------------------------
                                                    * Вид: тексовое поле
                                                    * Slug: kratkiy_kommentariy_summa_investiciy_kotorye_nuzhny
                                                    * Название: Краткий комментарий: (Сумма инвестиций которые нужны
                                                    бизнесу (в $ США ))
                                                    * Вид div-а: text_field_single_post_1
                                                    * ------------------------------------->
                                                    <div class="text_field_single_post_1 row">
														<?php if ( $post->kratkiy_kommentariy_summa_investiciy_kotorye_nuzhny ) : ?>
                                                            <div class="col text-left" >
                                                                <h6><?= $post->kratkiy_kommentariy_summa_investiciy_kotorye_nuzhny ?></h6>
                                                            </div>
														<?php endif; ?>
                                                        <!*--------------------------------------
                                                        * /.
                                                        * Вид: тексовое поле
                                                        * Slug: kratkiy_kommentariy_summa_investiciy_kotorye_nuzhny
                                                        * Название: Краткий комментарий: (Сумма инвестиций которые нужны
                                                        бизнесу (в $ США ))
                                                        * Вид div-а: text_field_single_post_1
                                                        * ------------------------------------->
                                                    </div>
                                                </div>
                                            </div>
                                            <p>
                                                <a class="btn btn-primary" data-toggle="collapse"
                                                   href="#multiCollapseExample1" role="button" aria-expanded="false"
                                                   aria-controls="multiCollapseExample1">Свернуть</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--2. Уже собрано денег ( $ ) -->
				<?php if ( $post->now_collected_money ) : ?>
                    <div class="row">
                        <div class="col text-center nazvanie_razdela_knopka">
                            <p>
                                <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample2"
                                   role="button" aria-expanded="false" aria-controls="multiCollapseExample2">Уже собрано
                                    денег</a>
                            </p>
                            <div class="row">
                                <div class="col otkivaushayasya_karto4ka">
                                    <div class="collapse multi-collapse" id="multiCollapseExample2">
                                        <div class="card card-body">
                                            <div class="col text-center">
                                                <!*--------------------------------------
                                                * Вид: тексовое поле
                                                * Slug: now_collected_money
                                                * Название: Уже собрано денег (в $ США )
                                                * Вид div-а: text_field_single_post_1
                                                * ------------------------------------->
                                                <div class="text_field_single_post_1">
													<?php if ( $post->now_collected_money ) : ?>
                                                        <div class="row">
                                                            <div class="col text-right"
                                                                 style="color: green; min-width: auto;">
                                                                <h3>
                                                                    <!--<span class="num-beautify"> делает цифры разбитыми на тысячи и миллионы-->
                                                                    <span class="num-beautify">
                                                                        <?= $post->now_collected_money ?>
                                                                    </span>
                                                                </h3>
                                                            </div>
                                                            <div class="col text-left d-flex align-items-center"><h6>$
                                                                    США</h6></div>
                                                        </div>
													<?php endif; ?>
                                                    <!*--------------------------------------
                                                    * /.
                                                    * Вид: тексовое поле
                                                    * Slug: now_collected_money
                                                    * Название: Уже собрано денег (в $ США )
                                                    * Вид div-а: text_field_single_post_1
                                                    * ------------------------------------->
                                                </div>

                                                <!--Текстовое поле: вывод текста Коммента в 1000 символов-->
                                                <div class="col text-center p-0">
                                                    <!*--------------------------------------
                                                    * Вид: тексовое поле
                                                    * Slug: kratkiy_kommentariy_uzhe_sobrano_deneg
                                                    * Название: Краткий комментарий (Уже собрано денег
                                                    * ------------------------------------->
                                                    <div class="text_field_single_post_1 row p-0">
														<?php if ( $post->kratkiy_kommentariy_uzhe_sobrano_deneg ) : ?>
                                                            <div class="col text-left p-0" style="color: black">
                                                                <h6><?= $post->kratkiy_kommentariy_uzhe_sobrano_deneg ?></h6>
                                                            </div>
														<?php endif; ?>
                                                        <!*--------------------------------------
                                                        * /.
                                                        * Вид: тексовое поле
                                                        * ------------------------------------->
                                                    </div>
                                                </div>
                                                <p>
                                                    <a class="btn btn-primary" data-toggle="collapse"
                                                       href="#multiCollapseExample2" role="button" aria-expanded="false"
                                                       aria-controls="multiCollapseExample2">Свернуть</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				<?php endif; ?>

                <!--2. Уже собрано денег 20200809 ( $ ) -->
				<?php if ( $post->now_collected_money_20200909 ) : ?>
                    <div class="row">
                        <div class="col text-center nazvanie_razdela_knopka">
                            <p>
                                <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample2"
                                   role="button" aria-expanded="false" aria-controls="multiCollapseExample2">Уже собрано
                                    денег</a>
                            </p>
                            <div class="row">
                                <div class="col otkivaushayasya_karto4ka">
                                    <div class="collapse multi-collapse" id="multiCollapseExample2">
                                        <div class="card card-body">
                                            <div class="col text-left">
                                                <!*--------------------------------------
                                                * Вид: тексовое поле
                                                * Slug: now_collected_money
                                                * Название: Уже собрано денег (в $ США )
                                                * Вид div-а: text_field_single_post_1
                                                * ------------------------------------->
                                                <div class="text_field_single_post_1">
													<?php if ( $post->now_collected_money_20200909 ) : ?>
                                                        <div class="row">
                                                            <div class="col text-right"
                                                                 style="color: green; min-width: auto;">
                                                                <h3><?= $post->now_collected_money_20200909 ?></h3>
                                                            </div>
                                                            <div class="col text-left d-flex align-items-center"><h6>$
                                                                    США</h6></div>
                                                        </div>
													<?php endif; ?>
                                                    <!*--------------------------------------
                                                    * /.
                                                    * Вид: тексовое поле
                                                    * Slug: now_collected_money
                                                    * Название: Уже собрано денег (в $ США )
                                                    * Вид div-а: text_field_single_post_1
                                                    * ------------------------------------->
                                                </div>

                                                <!--Текстовое поле: вывод текста Коммента в 1000 символов-->
                                                <div class="col text-left p-0">
                                                    <!*--------------------------------------
                                                    * Вид: тексовое поле
                                                    * Slug: kratkiy_kommentariy_uzhe_sobrano_deneg
                                                    * Название: Краткий комментарий (Уже собрано денег
                                                    * ------------------------------------->
                                                    <div class="text_field_single_post_1 row p-0">
														<?php if ( $post->kratkiy_kommentariy_uzhe_sobrano_deneg ) : ?>
                                                            <div class="col text-left p-0" style="color: black">
                                                                <h6><?= $post->kratkiy_kommentariy_uzhe_sobrano_deneg ?></h6>
                                                            </div>
														<?php endif; ?>
                                                        <!*--------------------------------------
                                                        * /.
                                                        * Вид: тексовое поле
                                                        * ------------------------------------->
                                                    </div>
                                                </div>
                                                <p>
                                                    <a class="btn btn-primary" data-toggle="collapse"
                                                       href="#multiCollapseExample2" role="button" aria-expanded="false"
                                                       aria-controls="multiCollapseExample2">Свернуть</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				<?php endif; ?>

                <!--4. После какого количества денег начнется выполнение плана развития? ( $ ) -->
                <div class="row">
                    <div class="col text-center nazvanie_razdela_knopka">
                        <p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample4"
                               role="button" aria-expanded="false" aria-controls="multiCollapseExample4">После какого
                                количества денег начнется<br>выполнение плана развития?</a>
                        </p>
                        <div class="row">
                            <div class="col otkivaushayasya_karto4ka">
                                <div class="collapse multi-collapse" id="multiCollapseExample4">
                                    <div class="card card-body">
                                        <div class="col text-center">
                                            <!*--------------------------------------
                                            * Вид: тексовое поле
                                            * Slug:
                                            posle_kakogo_kolichestva_deneg_nachnetsya_vypolnenie_plana_razvitiya_14
                                            * Название: После какого количества денег начнется выполнение плана
                                            развития? (в $ США )
                                            * Вид div-а: text_field_single_post_1
                                            * ------------------------------------->
                                            <div class="text_field_single_post_1">
												<?php if ( $post->posle_kakogo_kolichestva_deneg_nachnetsya_vypolnenie_plana_razvitiya_14 ) : ?>
                                                    <div class="row">
                                                        <div class="col text-right"
                                                             style="color: green; min-width: auto;">
                                                            <h3>
                                                                <!--<span class="num-beautify"> делает цифры разбитыми на тысячи и миллионы-->
                                                                <span class="num-beautify">
                                                                    <?= $post->posle_kakogo_kolichestva_deneg_nachnetsya_vypolnenie_plana_razvitiya_14 ?>
                                                                </span>
                                                            </h3>
                                                        </div>
                                                        <div class="col d-flex align-items-center"><h6>$ США</h6></div>
                                                    </div>
												<?php endif; ?>
                                                <!*--------------------------------------
                                                * /.
                                                * Вид: тексовое поле
                                                * Slug:
                                                posle_kakogo_kolichestva_deneg_nachnetsya_vypolnenie_plana_razvitiya_14
                                                * Название: После какого количества денег начнется выполнение плана
                                                развития? (в $ США )
                                                * Вид div-а: text_field_single_post_1
                                                * ------------------------------------->
                                            </div>

                                            <!--Текстовое поле: вывод текста Коммента в 1000 символов-->
                                            <div class="col text-center p-0">
                                                <!*--------------------------------------
                                                * Вид: тексовое поле
                                                * Slug: kratkiy_kommentariy_posle_kakogo_kolichestva_deneg
                                                * Название: Краткий комментарий (После какого количества денег начнется
                                                выполнение плана развития)
                                                * ------------------------------------->
                                                <div class="text_field_single_post_1 row p-0">
													<?php if ( $post->kratkiy_kommentariy_posle_kakogo_kolichestva_deneg ) : ?>
                                                        <div class="col text-left p-0" >
                                                            <h6><?= $post->kratkiy_kommentariy_posle_kakogo_kolichestva_deneg ?></h6>
                                                        </div>
													<?php endif; ?>
                                                    <!*--------------------------------------
                                                    * /.
                                                    * Вид: тексовое поле
                                                    * ------------------------------------->
                                                </div>
                                            </div>
                                            <div class="col text-center">
                                                <p>
                                                    <a class="btn btn-primary" data-toggle="collapse"
                                                       href="#multiCollapseExample4" role="button" aria-expanded="false"
                                                       aria-controls="multiCollapseExample4">Свернуть</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--5. Срок инвестиций (лет) -->
                <div class="row">
                    <div class="col text-center nazvanie_razdela_knopka">
                        <p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample5"
                               role="button" aria-expanded="false" aria-controls="multiCollapseExample5">Срок
                                инвестиций</a>
                        </p>
                        <div class="row">
                            <div class="col otkivaushayasya_karto4ka">
                                <div class="collapse multi-collapse" id="multiCollapseExample5">
                                    <div class="card card-body">
                                        <div class="col text-center">
                                            <!--Необычное поле: содержит "от" и "до"-->
                                            <!*--------------------------------------
                                            * Вид: тексовое поле
                                            * Slug: srok_investiciy_let + srok_investicij_maksimum_let_95
                                            * Название: Срок инвестиций (лет)
                                            * Вид div-а: text_field_single_post_1
                                            * ------------------------------------->
                                            <div class="text_field_single_post_1">
                                                <div class="row">
                                                    <div class="col text-right d-flex align-items-center justify-content-center p-10">
                                                        <div class="row">
                                                            <div class=" col-auto d-flex align-items-center"><h6
                                                                        style="color: black">От </h6></div>
                                                            <div class=" col-auto d-flex align-items-center"><h3
                                                                        style="color: #0069d9"><?= $post->srok_investiciy_let ?></h3>
                                                            </div>
                                                            <div class=" col-auto d-flex align-items-center"><h6
                                                                        style="color: black"> до </h6></div>
                                                            <div class=" col-auto d-flex align-items-center"><h3
                                                                        style="color: #0069d9"><?= $post->srok_investicij_maksimum_let_95 ?></h3>
                                                            </div>
                                                            <div class="col-auto text-left d-flex align-items-center"><h6>лет</h6>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-auto text-left d-flex align-items-center"><h6>лет</h6> -->
                                                    </div>
                                                </div>
                                                <!*--------------------------------------
                                                * /.
                                                * Вид: тексовое поле
                                                * Slug: srok_investiciy_let
                                                * Название: Срок инвестиций (лет)
                                                * Вид div-а: text_field_single_post_1
                                                * ------------------------------------->
                                            </div>
                                            <!--Текстовое поле: вывод текста Коммента в 1000 символов-->
                                            <div class="col text-left p-0">
                                                <!*--------------------------------------
                                                * Вид: тексовое поле
                                                * Slug: kratkij_kommentarij_srok_investicij_let_40
                                                * Название: Краткий комментарий: Срок инвестиций (лет)
                                                * ------------------------------------->
                                                <div class="text_field_single_post_1 row p-0">
													<?php if ( $post->kratkij_kommentarij_srok_investicij_let_40 ) : ?>
                                                        <div class="col text-left p-0" >
                                                            <h6><?= $post->kratkij_kommentarij_srok_investicij_let_40 ?></h6>
                                                        </div>
													<?php endif; ?>
                                                    <!*--------------------------------------
                                                    * /.
                                                    * Вид: тексовое поле
                                                    * ------------------------------------->
                                                </div>
                                            </div>

                                            <p>
                                                <a class="btn btn-primary" data-toggle="collapse"
                                                   href="#multiCollapseExample5" role="button" aria-expanded="false"
                                                   aria-controls="multiCollapseExample5">Свернуть</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--6. Hold инвестиций-->
                <?php if ( $post->hold_investiciy || $post->kratkij_kommentarij_hold_vyvoda_investicij_14 ) : ?>
                <div class="row">
                    <div class="col text-center nazvanie_razdela_knopka">
                        <p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample6"
                               role="button" aria-expanded="false" aria-controls="multiCollapseExample6">Hold
                                инвестиций</a>
                        </p>
                        <div class="row">
                            <div class="col otkivaushayasya_karto4ka">
                                <div class="collapse multi-collapse" id="multiCollapseExample6">
                                    <div class="card card-body">
                                        <div class="col text-center">
                                            <!*--------------------------------------
                                            * Вид: тексовое поле
                                            * Slug: hold_investiciy
                                            * Название: Hold инвестиций (срок с момента обращения инвестора до возврата
                                            вложенного, если вывод по требованию предусмотрен) (месяцев)
                                            * Вид div-а: text_field_single_post_1
                                            * ------------------------------------->
                                            <div class="text_field_single_post_1 ">
                                                    <h6>Hold вывода инвестиций (срок с момента обращения инвестора до
                                                        возврата вложенного, если вывод по требованию предусмотрен)
                                                    </h6>
                                                <?php if ( $post->hold_investiciy ) : ?>
                                                    <div class="row">
                                                        <div class="col text-right"
                                                             style="color: #0069d9; min-width: auto;">
                                                            <h3><?= $post->hold_investiciy ?></h3></div>
                                                        <div class="col text-left d-flex align-items-center"
                                                             style="min-width: auto;"><h6>месяцев</h6></div>
                                                    </div>
												<?php endif; ?>
                                                <!*--------------------------------------
                                                * /.
                                                * Вид: тексовое поле
                                                * Slug: hold_investiciy
                                                * Название: Hold инвестиций (срок с момента обращения инвестора до
                                                возврата вложенного, если вывод по требованию предусмотрен) (месяцев)
                                                * Вид div-а: text_field_single_post_1
                                                * ------------------------------------->
                                            </div>
                                            <!--Текстовое поле: вывод текста Коммента в 1000 символов-->
                                            <div class="col text-center p-0">
                                                <!*--------------------------------------
                                                * Вид: тексовое поле
                                                * Slug: kratkij_kommentarij_hold_vyvoda_investicij_14
                                                * Название: Краткий комментарий: Hold вывода инвестиций
                                                * ------------------------------------->
                                                <div class="text_field_single_post_1 row p-0">
													<?php if ( $post->kratkij_kommentarij_hold_vyvoda_investicij_14 ) : ?>
                                                        <div class="col text-left p-0" >
                                                            <hr>
                                                            <h6><?= $post->kratkij_kommentarij_hold_vyvoda_investicij_14 ?></h6>
                                                        </div>
													<?php endif; ?>
                                                    <!*--------------------------------------
                                                    * /.
                                                    * Вид: тексовое поле
                                                    * ------------------------------------->
                                                </div>
                                            </div>
                                            <p>
                                                <a class="btn btn-primary" data-toggle="collapse"
                                                   href="#multiCollapseExample6" role="button" aria-expanded="false"
                                                   aria-controls="multiCollapseExample6">Свернуть</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <!--7. Минимальная сумма инвестиций-->
                <div class="row">
                    <div class="col text-center nazvanie_razdela_knopka">
                        <p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample7"
                               role="button" aria-expanded="false" aria-controls="multiCollapseExample7">Минимальная
                                сумма инвестиций</a>
                        </p>
                        <div class="row">
                            <div class="col otkivaushayasya_karto4ka">
                                <div class="collapse multi-collapse" id="multiCollapseExample7">
                                    <div class="card card-body">
                                        <div class="col text-center">
                                            <!*--------------------------------------
                                            * Вид: тексовое поле
                                            * Slug: minimum_business_ready_to_get
                                            * Название: Минимальная сумма инвестиций которые бизнес готов принять (в $
                                            США )
                                            * Вид div-а: text_field_single_post_1
                                            * ------------------------------------->
                                            <div class="text_field_single_post_1">
												<?php if ( $post->minimum_business_ready_to_get ) : ?>
                                                    <h6>Минимальная сумма инвестиций которые бизнес готов принять</h6>
                                                    <div class="row">
                                                        <div class="col text-right"
                                                             style="color: green; min-width: auto">
                                                            <h3>
                                                                <!--<span class="num-beautify"> делает цифры разбитыми на тысячи и миллионы-->
                                                                <span class="num-beautify">
                                                                   <?= $post->minimum_business_ready_to_get ?>
                                                                </span>
                                                            </h3>
                                                        </div>
                                                        <div class="col text-left d-flex align-items-center"><h6>$
                                                                США</h6></div>
                                                    </div>
												<?php endif; ?>
                                                <!*--------------------------------------
                                                * /.
                                                * Вид: тексовое поле
                                                * Slug: minimum_business_ready_to_get
                                                * Название: Минимальная сумма инвестиций которые бизнес готов принять (в
                                                $ США )
                                                * Вид div-а: text_field_single_post_1
                                                * ------------------------------------->
                                            </div>

                                            <!--Текстовое поле: вывод текста Коммента в 1000 символов-->
                                            <div class="col text-center p-0">
                                                <!*--------------------------------------
                                                * Вид: тексовое поле
                                                * Slug: kratkiy_kommentariy_minimalnaya_summa_investiciy
                                                * Название: Краткий комментарий (Минимальная сумма инвестиций которые
                                                бизнес готов принять
                                                * ------------------------------------->
                                                <div class="text_field_single_post_1 row p-0">
													<?php if ( $post->kratkiy_kommentariy_minimalnaya_summa_investiciy ) : ?>
                                                        <div class="col text-left p-0" >
                                                            <h6><?= $post->kratkiy_kommentariy_minimalnaya_summa_investiciy ?></h6>
                                                        </div>
													<?php endif; ?>
                                                    <!*--------------------------------------
                                                    * /.
                                                    * Вид: тексовое поле
                                                    * ------------------------------------->
                                                </div>
                                            </div>

                                            <p>
                                                <a class="btn btn-primary" data-toggle="collapse"
                                                   href="#multiCollapseExample7" role="button" aria-expanded="false"
                                                   aria-controls="multiCollapseExample7">Свернуть</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--8. Вложено своих денег-->
                <div class="row">
					<?php if ( $post->vlozheno_svoih_deneg ) : ?>
                        <div class="col text-center nazvanie_razdela_knopka">
                            <p>
                                <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample8"
                                   role="button" aria-expanded="false" aria-controls="multiCollapseExample8">Вложено
                                    своих денег</a>
                            </p>
                            <div class="row">
                                <div class="col otkivaushayasya_karto4ka">
                                    <div class="collapse multi-collapse" id="multiCollapseExample8">
                                        <div class="card card-body">
                                            <div class="col text-center">
                                                <!*--------------------------------------
                                                * Вид: тексовое поле
                                                * Slug: vlozheno_svoih_deneg
                                                * Название: Вложено своих денег ( $ ) (деньгами, НЕ трудом или
                                                имуществом)
                                                * Вид div-а: text_field_single_post_1
                                                * ------------------------------------->
                                                <div class="text_field_single_post_1">
													<?php if ( $post->vlozheno_svoih_deneg ) : ?>
                                                        <h6>Вложено своих денег (деньгами, НЕ трудом или имуществом и
                                                            т.д.)</h6>
                                                        <div class="row">
                                                            <div class="col text-right"
                                                                 style="color: green; min-width: auto;">
                                                                <h3>
                                                                    <!--<span class="num-beautify"> делает цифры разбитыми на тысячи и миллионы-->
                                                                    <span class="num-beautify">
                                                                        <?= $post->vlozheno_svoih_deneg ?>
                                                                   </span>
                                                                </h3>
                                                            </div>
                                                            <div class="col text-left d-flex align-items-center"><h6>$
                                                                    США</h6></div>
                                                        </div>
													<?php endif; ?>
                                                    <!*--------------------------------------
                                                    * /.
                                                    * Вид: тексовое поле
                                                    * Slug: vlozheno_svoih_deneg
                                                    * Название: Вложено своих денег ( $ ) (деньгами, НЕ трудом или
                                                    имуществом)
                                                    * Вид div-а: text_field_single_post_1
                                                    * ------------------------------------->
                                                </div>
                                                <!--Текстовое поле: вывод текста Коммента в 1000 символов-->
                                                <div class="col text-center p-0">
                                                    <!*--------------------------------------
                                                    * Вид: тексовое поле
                                                    * Slug: kk_vlozheno_svoih_deneg
                                                    * Название: Краткий комментарий: Вложено своих денег
                                                    * ------------------------------------->
                                                    <div class="text_field_single_post_1 row p-0">
														<?php if ( $post->kk_vlozheno_svoih_deneg ) : ?>
                                                            <div class="col text-left p-0" >
                                                                <h6><?= $post->kk_vlozheno_svoih_deneg ?></h6>
                                                            </div>
														<?php endif; ?>
                                                        <!*--------------------------------------
                                                        * /.
                                                        * Вид: тексовое поле
                                                        * ------------------------------------->
                                                    </div>
                                                </div>
                                                <p>
                                                    <a class="btn btn-primary" data-toggle="collapse"
                                                       href="#multiCollapseExample8" role="button" aria-expanded="false"
                                                       aria-controls="multiCollapseExample8">Свернуть</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php endif; ?>
                </div>
            </div>
        </div>

        <hr>

        <!--Вид, сфера, направление, отрасль, ниша бизнеса-->
        <!-- 13. Глобальные виды бизнеса 14. Обобщенные сферы бизнесов 15. Точное нишевое соответствие -->
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col text-center nazvanie_razdela">
                        <h4>Вид, сфера, направление, отрасль, ниша бизнеса</h4>
                    </div>
                </div>
                <div class="row">
                    <!-- 13. Глобальные виды бизнеса-->
                    <div class="col text-center nazvanie_razdela_knopka">
                        <p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample13"
                               role="button" aria-expanded="false" aria-controls="multiCollapseExample13">Глобальные
                                виды бизнеса</a>
                        </p>
                        <div class="row">
                            <div class="col otkivaushayasya_karto4ka">
                                <div class="collapse multi-collapse" id="multiCollapseExample13">
                                    <div class="card card-body">
                                        <div class="col text-left">
                                            <!*--------------------------------------
                                            * Вид: таксономия
                                            * Slug: Meta-key:taxonomy-global_business_spheres
                                            * Название: Глобальные виды бизнеса
                                            * Вид div-а: taxonomy_field_single_post_1
                                            * ------------------------------------->
                                            <div class="taxonomy_field_single_post_1">
                                                <!--Check if the post has checked global_business_spheres taxonomy -->
                                                <?php
                                                $global_business_spheres = get_the_terms(get_the_ID(), 'global_business_spheres');
                                                if(isset($global_business_spheres) && is_array($global_business_spheres)) {
                                                    echo '<p>';
                                                    for($i=0; $i<count($global_business_spheres);$i++) {
                                                        echo $global_business_spheres[$i]->name;
                                                        if((($i == count($global_business_spheres) || ($i+1 == count($global_business_spheres) )) == false)) echo '<li>';
                                                    }
                                                    echo '</p>';
                                                    ?>
                                                <?php } ?>
                                                <!*--------------------------------------
                                                *    /.
                                                *    Вид: таксономия
                                                *    Slug: Meta-key:taxonomy-global_business_spheres
                                                *    Название: Глобальные виды бизнеса
                                                *    Вид div-а: taxonomy_field_single_post_1
                                                * ------------------------------------->
                                            </div>
                                            <div class="col text-center">
                                                <p>
                                                    <a class="btn btn-primary" data-toggle="collapse"
                                                       href="#multiCollapseExample13" role="button" aria-expanded="false"
                                                       aria-controls="multiCollapseExample13">Свернуть</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!--14. Обобщенные сферы бизнесов-->
                    <div class="col text-center nazvanie_razdela_knopka">
                        <p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample14"
                               role="button" aria-expanded="false" aria-controls="multiCollapseExample14">Обобщенные
                                сферы бизнесов</a>
                        </p>
                        <div class="row">
                            <div class="col otkivaushayasya_karto4ka">
                                <div class="collapse multi-collapse" id="multiCollapseExample14">
                                    <div class="card card-body">
                                        <div class="col text-left">
                                            <!*--------------------------------------
                                            * Вид: таксономия
                                            * Slug: Meta-key:taxonomy-all_business_spheres
                                            * Название: Обобщенные сферы бизнесов
                                            * Вид div-а: taxonomy_field_single_post_1
                                            * ------------------------------------->
                                            <div class="taxonomy_field_single_post_1">
                                                <!--Check if the post has checked all_business_spheres taxonomy -->
                                                <?php
                                                $all_business_spheres = get_the_terms(get_the_ID(), 'all_business_spheres');
                                                if(isset($all_business_spheres) && is_array($all_business_spheres)) {
                                                    echo '<p>';
                                                    for($i=0; $i<count($all_business_spheres);$i++) {
                                                        echo $all_business_spheres[$i]->name;
                                                        if((($i == count($all_business_spheres) || ($i+1 == count($all_business_spheres) )) == false)) echo '<li>';
                                                    }
                                                    echo '</p>';
                                                    ?>
                                                <?php } ?>
                                                <!*--------------------------------------
                                                *    /.
                                                *    Вид: таксономия
                                                *    Slug: Meta-key:taxonomy-all_business_spheres
                                                *    Название: Обобщенные сферы бизнесов
                                                *    Вид div-а: taxonomy_field_single_post_1
                                                * ------------------------------------->
                                            </div>
                                            <div class="col text-center">
                                                <p>
                                                    <a class="btn btn-primary" data-toggle="collapse"
                                                       href="#multiCollapseExample14" role="button" aria-expanded="false"
                                                       aria-controls="multiCollapseExample14">Свернуть</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!--15. Точное нишевое соответствие-->
                    <div class="col text-center nazvanie_razdela_knopka">
                        <p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample15" role="button" aria-expanded="false" aria-controls="multiCollapseExample15">Точное нишевое соответствие</a>
                        </p>
                        <div class="row">
                            <div class="col otkivaushayasya_karto4ka">
                                <div class="collapse multi-collapse" id="multiCollapseExample15">
                                    <div class="card card-body">
                                        <div class="col text-left">
                                            <!*--------------------------------------
                                            *    Вид: таксономия
                                            *    Slug: Meta-key:taxonomy-exact_branch_accordance
                                            *    Название: Точное нишевое соответствие
                                            *    Вид div-а: taxonomy_field_single_post_1
                                            * ------------------------------------->
                                            <div class="taxonomy_field_single_post_1">
                                                <!--Check if the post has checked exact_branch_accordance taxonomy -->
                                                <?php
                                                $exact_branch_accordance = get_the_terms(get_the_ID(), 'exact_branch_accordance');
                                                if(isset($exact_branch_accordance) && is_array($exact_branch_accordance)) {
                                                    echo '<p>';
                                                    for($i=0; $i<count($exact_branch_accordance);$i++) {
                                                        echo $exact_branch_accordance[$i]->name;
                                                        if((($i == count($exact_branch_accordance) || ($i+1 == count($exact_branch_accordance) )) == false)) echo '<li>';
                                                    }
                                                    echo '</p>';
                                                    ?>
                                                <?php } ?>
                                                <!*--------------------------------------
                                                *    /.
                                                *    Вид: таксономия
                                                *    Slug: Meta-key:taxonomy-all_business_spheres
                                                *    Название: Точное нишевое соответствие
                                                *    Вид div-а: taxonomy_field_single_post_1
                                                * ------------------------------------->
                                            </div>
                                            <!--Текстовое поле: вывод текста Коммента в 1000 символов-->
                                            <div class="col text-center p-0">
                                                <!*--------------------------------------
                                                *    Вид: тексовое поле
                                                *    Slug: kk_tochnoe_nishevoe_sootvetstvie
                                                *    Название: Краткий комментарий: Точное нишевое соответствие
                                                * ------------------------------------->
                                                <div class="text_field_single_post_1 row p-0">
                                                    <?php if($post->kk_tochnoe_nishevoe_sootvetstvie) : ?>
                                                        <div class="col text-center p-0" >
                                                            <hr>
                                                            <h6><?=$post->kk_tochnoe_nishevoe_sootvetstvie?></h6>
                                                        </div>
                                                    <?php endif; ?>
                                                    <!*--------------------------------------
                                                    *    /.
                                                    *    Вид: тексовое поле
                                                    * ------------------------------------->
                                                </div>
                                            </div>
                                            <div class="col text-center">
                                                <p>
                                                    <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample15" role="button" aria-expanded="false" aria-controls="multiCollapseExample15">Свернуть</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Если есть 1. Аналоги || 2. Финплан || 3. Презентация, то показать блок -->
        <?php
        if ( ( $post->analog_of_project[0]) || ( $post->finance_plan[0] ) || ( $post->prezentaciya_vashego_proekta_v_formate_prezentacii_33[0] ) ) : 
        ?>
            <hr>

            <!--Вид, сфера, направление, отрасль, ниша бизнеса-->
            <!-- 16. Гугл-таблица: аналоги 17. Гугл таблица: финансовый план 18. Гугл презентация -->
        
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col text-center nazvanie_razdela">
                            <h4>Таблицы и презентации</h4>
                        </div>
                    </div>
                    <div class="row">
                        <!-- 16. Гугл-таблица: аналоги-->
                        <?php if ( $post->analog_of_project[0] ) : ?>
                            <div class="col text-center nazvanie_razdela_knopka">
                                <p>
                                    <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample16"
                                    role="button" aria-expanded="false" aria-controls="multiCollapseExample16">Анализ
                                        аналогов <br>+ конкурентные преимущества</a>
                                </p>
                                <div class="row">
                                    <div class="col otkivaushayasya_karto4ka">
                                        <div class="collapse multi-collapse" id="multiCollapseExample16">
                                            <div class="card card-body">
                                                <div class="col text-center">
                                                    <!*--------------------------------------
                                                    * Вид: GoogleDoc
                                                    * Slug: analog_of_project
                                                    * Название: Анализ аналогов, конкурентов вашего проекта (конкуренты или
                                                    кто уже успел реализовать вашу идею опередив вас + конкурентные
                                                    преимущества)
                                                    * Вид div-а: google_doc_field_single_post_1
                                                    * ------------------------------------->
                                                    <div class="google_doc_field_single_post_1">
                                                        <!-- Check if current post($post) has field -->
                                                        <?php if ( $post->analog_of_project[0] ) : ?>
                                                            <!-- array[0] is a link to file, array[1] is file name -->
                                                            <div class="uploadedfiles s_post_details">
                                                                <div class="col no-gutters">
                                                                    <h6><?= $post->analog_of_project[1] ?></b></h6>
                                                                    <hr>
                                                                    <h7>Посмотреть документ (без скачивания):</h7>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                        <!*--------------------------------------
                                                        * /.
                                                        * Вид: GoogleDoc
                                                        * Slug: analog_of_project
                                                        * Название: Анализ аналогов, конкурентов вашего проекта (конкуренты
                                                        или кто уже успел реализовать вашу идею опередив вас + конкурентные
                                                        преимущества)
                                                        * Вид div-а: google_doc_field_single_post_1
                                                        * ------------------------------------->
                                                    </div>
                                                    <div class="row">
                                                        <div class="col text-center" style="max-width: max-content;">
                                                            <a target="blank" href="<?= $post->analog_of_project[0] ?>">
                                                                <img src="<?= home_url(); ?>/wp-content/uploads/2020/07/google-sheets.png"
                                                                    style="max-width: 5rem;"></a>
                                                        </div>
                                                        <div class="col text-center d-flex align-items-center"
                                                            style="overflow: hidden">
                                                            <a target="blank" href="<?= $post->analog_of_project[0] ?>"
                                                            style="min-width: auto;"><?= $post->analog_of_project[0] ?></a>
                                                        </div>
                                                    </div>
                                                    <p>
                                                        <a class="btn btn-primary" data-toggle="collapse"
                                                        href="#multiCollapseExample16" role="button"
                                                        aria-expanded="false" aria-controls="multiCollapseExample16">Свернуть</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <!--17. Гугл таблица: финансовый план-->
                        <?php if ( $post->finance_plan[0] ) : ?>
                            <div class="col text-center nazvanie_razdela_knopka">
                                <p>
                                    <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample17"
                                    role="button" aria-expanded="false" aria-controls="multiCollapseExample17">Финансовый
                                        план <br> График инвестирования</a>
                                </p>
                                <div class="row">
                                    <div class="col otkivaushayasya_karto4ka">
                                        <div class="collapse multi-collapse" id="multiCollapseExample17">
                                            <div class="card card-body">
                                                <div class="col text-center">
                                                    <!*--------------------------------------
                                                    * Вид: GoogleDoc
                                                    * Slug: finance_plan
                                                    * Название: Финансовый план и/или График инвестирования
                                                    * Вид div-а: google_doc_field_single_post_1
                                                    * ------------------------------------->
                                                    <div class="google_doc_field_single_post_1">
                                                        <!-- Check if current post($post) has field -->
                                                        <?php if ( $post->finance_plan[0] ) : ?>
                                                            <!-- array[0] is a link to file, array[1] is file name -->
                                                            <div class="uploadedfiles s_post_details">
                                                                <div class="col no-gutters">
                                                                    <h6><?= $post->finance_plan[1] ?></h6>
                                                                    <hr>
                                                                    <h7>Посмотреть документ (без скачивания):</h7>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                        <!*--------------------------------------
                                                        * /.
                                                        * Вид: GoogleDoc
                                                        * Slug: finance_plan
                                                        * Название: Финансовый план и/или График инвестирования
                                                        * Вид div-а: google_doc_field_single_post_1
                                                        * ------------------------------------->
                                                    </div>
                                                    <div class="row">
                                                        <div class="col text-center" style="max-width: max-content;">
                                                            <a target="blank" href="<?= $post->finance_plan[0] ?>"> <img
                                                                        src="<?= home_url(); ?>/wp-content/uploads/2020/07/google-sheets.png"
                                                                        style="max-width: 5rem;"></a>
                                                        </div>
                                                        <div class="col text-center d-flex align-items-center"
                                                            style="overflow: hidden">
                                                            <a target="blank" href="<?= $post->finance_plan[0] ?>"
                                                            style="min-width: auto;"><?= $post->finance_plan[0] ?></a>
                                                        </div>
                                                    </div>
                                                    <p>
                                                        <a class="btn btn-primary" data-toggle="collapse"
                                                        href="#multiCollapseExample17" role="button"
                                                        aria-expanded="false" aria-controls="multiCollapseExample17">Свернуть</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <!--18. Гугл презентация-->
                        <?php if ( $post->prezentaciya_vashego_proekta_v_formate_prezentacii_33[0] ) : ?>
                            <div class="col text-center nazvanie_razdela_knopka">
                                <p>
                                    <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample18"
                                    role="button" aria-expanded="false" aria-controls="multiCollapseExample18">Презентация</a>
                                </p>
                                <div class="row">
                                    <div class="col otkivaushayasya_karto4ka">
                                        <div class="collapse multi-collapse" id="multiCollapseExample18">
                                            <div class="card card-body">
                                                <div class="col text-center">
                                                    <!*--------------------------------------
                                                    * Вид: GoogleDoc
                                                    * Slug: prezentaciya_vashego_proekta_v_formate_prezentacii_33
                                                    * Название: Презентация проекта в формате презентации (EX: Презентация
                                                    вашего проекта в формате презентации)
                                                    * Вид div-а: google_doc_field_single_post_1
                                                    * ------------------------------------->
                                                    <div class="google_doc_field_single_post_1">
                                                        <!-- Check if current post($post) has field -->
                                                        <?php if ( $post->prezentaciya_vashego_proekta_v_formate_prezentacii_33[0] ) : ?>
                                                            <!-- array[0] is a link to file, array[1] is file name -->
                                                            <div class="uploadedfiles s_post_details">
                                                                <div class="col no-gutters">
                                                                    <h6><?= $post->prezentaciya_vashego_proekta_v_formate_prezentacii_33[1] ?></h6>
                                                                    <hr>
                                                                    <h7>Посмотреть документ (без скачивания):</h7>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                        <!*--------------------------------------
                                                        * /.
                                                        * Вид: GoogleDoc
                                                        * Slug: prezentaciya_vashego_proekta_v_formate_prezentacii_33
                                                        * Название: Презентация проекта в формате презентации (EX:
                                                        Презентация вашего проекта в формате презентации)
                                                        * Вид div-а: google_doc_field_single_post_1
                                                        * ------------------------------------->
                                                    </div>
                                                    <div class="row">
                                                        <div class="col text-center" style="max-width: max-content;">
                                                            <a target="blank"
                                                            href="<?= $post->prezentaciya_vashego_proekta_v_formate_prezentacii_33[0] ?>">
                                                                <img src="<?= home_url(); ?>/wp-content/uploads/2020/07/google-slides.png"
                                                                    style="max-width: 5rem;"></a>
                                                        </div>
                                                        <div class="col text-center d-flex align-items-center"
                                                            style="overflow: hidden">
                                                            <a target="blank"
                                                            href="<?= $post->prezentaciya_vashego_proekta_v_formate_prezentacii_33[0] ?>"
                                                            style="min-width: auto;"><?= $post->prezentaciya_vashego_proekta_v_formate_prezentacii_33[0] ?></a>
                                                        </div>
                                                    </div>
                                                    <p>
                                                        <a class="btn btn-primary" data-toggle="collapse"
                                                        href="#multiCollapseExample18" role="button"
                                                        aria-expanded="false" aria-controls="multiCollapseExample18">Свернуть</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?><!-- /.Если есть 1. Аналоги || 2. Финплан || 3. Презентация, то показать блок -->
        <hr>

        <!--Текст: Цель привлечения инвестиций-->
        <!--19. Цель привлечения инвестиций (покрытие задолженности, покрытие заработной платы, покупка оборудования, разработка сайта, маркетинг, другое)-->
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col text-center nazvanie_razdela">
                        <h4>Текст: Цель привлечения инвестиций</h4>
                    </div>
                </div>
                <div class="row">
                    <!--19. Цель привлечения инвестиций (покрытие задолженности, покрытие заработной платы, покупка оборудования, разработка сайта, маркетинг, другое)-->
                    <div class="col text-center nazvanie_razdela_knopka">
                        <p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample19"
                               role="button" aria-expanded="false" aria-controls="multiCollapseExample19">Текст: Цель
                                привлечения инвестиций</a>
                        </p>
                        <div class="row">
                            <div class="col otkivaushayasya_karto4ka">
                                <div class="collapse multi-collapse" id="multiCollapseExample19">
                                    <div class="card card-body">
                                        <div class="col text-center">
                                            <!*--------------------------------------
                                            * Вид: тексовое поле
                                            * Slug: purpose_of_inv_please
                                            * Название: Цель привлечения инвестиций
                                            * Вид div-а: text_field_single_post_1
                                            * ------------------------------------->
                                            <div class="text_field_single_post_1">
												<?php if ( $post->purpose_of_inv_please ) : ?>
                                                    <p><?= $post->purpose_of_inv_please ?></p>
												<?php endif; ?>
                                                <!*--------------------------------------
                                                * /.
                                                * Вид: тексовое поле
                                                * Название: Цель привлечения инвестиций
                                                * Вид div-а: text_field_single_post_1
                                                * ------------------------------------->
                                            </div>
                                            <p>
                                                <a class="btn btn-primary" data-toggle="collapse"
                                                   href="#multiCollapseExample19" role="button" aria-expanded="false"
                                                   aria-controls="multiCollapseExample19">Свернуть</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!--Вид, сфера, направление, отрасль, ниша бизнеса-->
        <!-- 20. YouTube ролики проекта 30 сек 21. YouTube ролики проекта 2 мин 22. YouTube ролики проекта любая продолжительность -->
        <!-- 20201224 ЛИА сам написал   -->
        <?php if (get_post_meta(get_the_ID(), '30s_youtube') or (get_post_meta(get_the_ID(), '2min_youtube')) or ( $post->youtube_video )):  ?>
            <hr>
            <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col text-center nazvanie_razdela">
                        <h4>YouTube презентации</h4>
                    </div>
                </div>
                <div class="row">
                    <!-- 20. YouTube ролики проекта 30 сек-->
					<?php if ( get_post_meta( get_the_ID(), '30s_youtube' ) ): ?>
                        <div class="col text-center nazvanie_razdela_knopka">
                            <p>
                                <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample20"
                                   role="button" aria-expanded="false" aria-controls="multiCollapseExample20">30 сек.
                                    YouTube презентация</a>
                            </p>
                            <div class="row">
                                <div class="col otkivaushayasya_karto4ka">
                                    <div class="collapse multi-collapse" id="multiCollapseExample20">
                                        <div class="card card-body">
                                            <div class="col text-left">
                                                <!*--------------------------------------
                                                * Вид: YouTube
                                                * Slug: 30s_youtube
                                                * Название: Краткая презентация на 30 секунд
                                                * Вид div-а: google_doc_field_single_post_1
                                                * ------------------------------------->
                                                <div class="google_doc_field_single_post_1">
													<?php if ( get_post_meta( get_the_ID(), '30s_youtube' ) ): ?>
                                                        <div class="youtube-frame s_post_details">
                                                            <iframe width="500" height="282"
                                                                    src="https://www.youtube.com/embed/<?= extractUTubeVidId( get_post_meta( get_the_ID(), '30s_youtube', true ) ) ?>"
                                                                    frameborder="0"
                                                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                    allowfullscreen></iframe>
                                                        </div>
													<?php endif; ?>
                                                    <!*--------------------------------------
                                                    * /.
                                                    * Вид: YouTube
                                                    * Slug: 30s_youtube
                                                    * Название: Краткая презентация на 30 секунд
                                                    * Вид div-а: google_doc_field_single_post_1
                                                    * ------------------------------------->
                                                </div>
                                                <p>
                                                    <a class="btn btn-primary" data-toggle="collapse"
                                                       href="#multiCollapseExample20" role="button"
                                                       aria-expanded="false" aria-controls="multiCollapseExample20">Свернуть</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php endif; ?>
                </div>
                <div class="row">
                    <!--21. YouTube ролики проекта 2 мин-->
					<?php if ( get_post_meta( get_the_ID(), '2min_youtube' ) ): ?>
                        <div class="col text-center nazvanie_razdela_knopka">
                            <p>
                                <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample21"
                                   role="button" aria-expanded="false" aria-controls="multiCollapseExample21">2 мин.
                                    YouTube презентация</a>
                            </p>
                            <div class="row">
                                <div class="col otkivaushayasya_karto4ka">
                                    <div class="collapse multi-collapse" id="multiCollapseExample21">
                                        <div class="card card-body">
                                            <div class="col text-left">
                                                <!*--------------------------------------
                                                * Вид: YouTube
                                                * Slug: 2min_youtube
                                                * Название: Презентация на 2 минуты
                                                * Вид div-а: google_doc_field_single_post_1
                                                * ------------------------------------->
                                                <div class="google_doc_field_single_post_1">
													<?php if ( get_post_meta( get_the_ID(), '2min_youtube' ) ): ?>
                                                        <div class="youtube-frame s_post_details">
                                                            <iframe width="500" height="282"
                                                                    src="https://www.youtube.com/embed/<?= extractUTubeVidId( get_post_meta( get_the_ID(), '2min_youtube', true ) ) ?>"
                                                                    frameborder="0"
                                                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                    allowfullscreen></iframe>
                                                        </div>
													<?php endif; ?>
                                                    <!*--------------------------------------
                                                    * /.
                                                    * Вид: YouTube
                                                    * Slug: 2min_youtube
                                                    * Название: Презентация на 2 минуты
                                                    * Вид div-а: google_doc_field_single_post_1
                                                    * ------------------------------------->
                                                </div>
                                                <p>
                                                    <a class="btn btn-primary" data-toggle="collapse"
                                                       href="#multiCollapseExample21" role="button"
                                                       aria-expanded="false" aria-controls="multiCollapseExample21">Свернуть</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php endif; ?>
                </div>
                <div class="row">
                    <!--22. YouTube ролики проекта любая продолжительность-->
					<?php if ( $post->youtube_video ): ?>
                        <div class="col text-center nazvanie_razdela_knopka">
                            <p>
                                <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample22"
                                   role="button" aria-expanded="false" aria-controls="multiCollapseExample22">Любая
                                    продолжительность</a>
                            </p>
                            <div class="row">
                                <div class="col otkivaushayasya_karto4ka">
                                    <div class="collapse multi-collapse" id="multiCollapseExample22">
                                        <div class="card card-body">
                                            <div class="col text-left">
                                                <!*--------------------------------------
                                                * Вид: YouTube
                                                * Slug: youtube_video
                                                * Название: Презентация на неограниченное количество времени
                                                * Вид div-а: google_doc_field_single_post_1
                                                * ------------------------------------->
                                                <div class="google_doc_field_single_post_1">
													<?php if ( $post->youtube_video ): ?>
                                                        <div class="youtube-frame s_post_details">
															<?php if ( isset( $post->youtube_video ) && ! is_null( $post->youtube_video ) ): ?>
                                                                <iframe width="500" height="282"
                                                                        src="https://www.youtube.com/embed/<?= extractUTubeVidId( $post->youtube_video ) ?>"
                                                                        frameborder="0"
                                                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                        allowfullscreen></iframe>
															<?php endif; ?>
                                                        </div>
													<?php endif; ?>
                                                    <!*--------------------------------------
                                                    * /.
                                                    * Вид: YouTube
                                                    * Slug: youtube_video
                                                    * Название: Презентация на неограниченное количество времени
                                                    * Вид div-а: google_doc_field_single_post_1
                                                    * ------------------------------------->
                                                </div>
                                                <p>
                                                    <a class="btn btn-primary" data-toggle="collapse"
                                                       href="#multiCollapseExample22" role="button"
                                                       aria-expanded="false" aria-controls="multiCollapseExample22">Свернуть</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php endif; ?>
                </div>
            </div>
        </div>
        <?php endif;  ?>

        <!--Анкорная ссылка к блоку "обороты"--> <a id="komanda"></a>

        <hr>

        <!--Вид, сфера, направление, отрасль, ниша бизнеса-->
        <!-- 23. Уже есть инвесторы 24. Как распределены доли в компании 25. Команда -->
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col text-center nazvanie_razdela">
                        <h4>Текст: Текущий состав и доли в компании + команда</h4>
                    </div>
                </div>
                <div class="row">
                    <!-- 23. Уже есть инвесторы-->
                    <div class="col text-center nazvanie_razdela_knopka">
                        <p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample23"
                               role="button" aria-expanded="false" aria-controls="multiCollapseExample23">Есть ли уже
                                инвестиции</a>
                        </p>
                        <div class="row">
                            <div class="col otkivaushayasya_karto4ka">
                                <div class="collapse multi-collapse" id="multiCollapseExample23">
                                    <div class="card card-body">
                                        <div class="col text-left">
                                            <!*--------------------------------------
                                            * Вид: таксономия
                                            * Slug: uzhe_est_investory
                                            * Название: Наличие или отсутствие привлеченных денег в бизнесе на сейчас
                                            * Вид div-а: taxonomy_field_single_post_1
                                            * ------------------------------------->
                                            <div class="taxonomy_field_single_post_1">
												<?php if ( $post->uzhe_est_investory ) : ?>
                                                    <li><?= $post->uzhe_est_investory ?></li>
												<?php endif; ?>
                                                <!*--------------------------------------
                                                * /.
                                                * Вид: тексовое поле
                                                * Slug: uzhe_est_investory
                                                * Название: Наличие или отсутствие привлеченных денег в бизнесе на
                                                сейчас
                                                * Вид div-а: text_field_single_post_1
                                                * ------------------------------------->
                                            </div>
                                            <hr>
                                            <!--Текстовое поле: вывод текста Коммента в 1000 символов-->
                                            <div class="col text-left p-0">
                                                <!*--------------------------------------
                                                * Вид: тексовое поле
                                                * Slug: kk_est_li_uzhe_investicii
                                                * Название: Краткий комментарий: Есть ли уже инвестиции
                                                * ------------------------------------->
                                                <div class="text_field_single_post_1 row p-0">
													<?php if ( $post->kk_est_li_uzhe_investicii ) : ?>
                                                        <div class="col text-left p-0" >
                                                            <h6><?= $post->kk_est_li_uzhe_investicii ?></h6>
                                                        </div>
													<?php endif; ?>
                                                    <!*--------------------------------------
                                                    * /.
                                                    * Вид: тексовое поле
                                                    * ------------------------------------->
                                                </div>
                                            </div>
                                            <div class="col text-center">
                                                <p>
                                                    <a class="btn btn-primary" data-toggle="collapse"
                                                       href="#multiCollapseExample23" role="button" aria-expanded="false"
                                                       aria-controls="multiCollapseExample23">Свернуть</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--24. Как распределены доли в компании-->
				<?php if ( $post->kak_raspredeleny_doli_v_kompanii ) : ?>
                    <div class="row">
                        <div class="col text-center nazvanie_razdela_knopka">
                            <p>
                                <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample24"
                                   role="button" aria-expanded="false" aria-controls="multiCollapseExample24">Как
                                    распределены доли в компании</a>
                            </p>
                            <div class="row">
                                <div class="col otkivaushayasya_karto4ka">
                                    <div class="collapse multi-collapse" id="multiCollapseExample24">
                                        <div class="card card-body">
                                            <div class="row text-center">
                                                <!*--------------------------------------
                                                * Вид: тексовое поле
                                                * Slug: kak_raspredeleny_doli_v_kompanii
                                                * Название: Как распределены доли в компании на данный момент (как
                                                распределяется прибыль, доход, какие доли (сколько голосов у кого,
                                                другое))
                                                * Вид div-а: text_field_single_post_1
                                                * ------------------------------------->
                                                <div class="col text_field_single_post_1 text-center">
													<?php if ( $post->kak_raspredeleny_doli_v_kompanii ) : ?>
                                                        <p><?= $post->kak_raspredeleny_doli_v_kompanii ?></p>
                                                        <p>
                                                            <a class="btn btn-primary" data-toggle="collapse"
                                                               href="#multiCollapseExample24" role="button"
                                                               aria-expanded="false"
                                                               aria-controls="multiCollapseExample24">Свернуть</a>
                                                        </p>
													<?php endif; ?>
                                                    <!*--------------------------------------
                                                    * /.
                                                    * Вид: тексовое поле
                                                    * Slug: kak_raspredeleny_doli_v_kompanii
                                                    * Название: Как распределены доли в компании на данный момент (как
                                                    распределяется прибыль, доход, какие доли (сколько голосов у кого,
                                                    другое))
                                                    * Вид div-а: text_field_single_post_1
                                                    * ------------------------------------->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				<?php endif; ?>

                <!--25. Команда-->
				<?php if ( $post->komanda ) : ?>
                <div class="row">
                    <div class="col text-center nazvanie_razdela_knopka">
                        <p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample25"
                               role="button" aria-expanded="false" aria-controls="multiCollapseExample25">Команда</a>
                        </p>
                        <div class="row">
                            <div class="col otkivaushayasya_karto4ka">
                                <div class="collapse multi-collapse" id="multiCollapseExample25">
                                    <div class="card card-body">
                                        <div class="row text-center">
                                            <!*--------------------------------------
                                            * Вид: тексовое поле
                                            * Slug: komanda
                                            * Название: Команда (1. Страна проживания 2. Страна гражданства/резидентства
                                            3. Роль 4. Прошлый опыт (аналогичный или полезный) 5. ФИО)
                                            * Вид div-а: text_field_single_post_1
                                            * ------------------------------------->
                                            <div class="text_field_single_post_1 col text-center">
												<?php if ( $post->komanda ) : ?>
                                                    <hr>
                                                    <h6>1. Страна проживания 2. Страна гражданства/резидентства 3. Роль
                                                        4. Прошлый опыт (аналогичный или полезный) 5. ФИО</h6>
                                                    <hr>
                                                    <p><?= $post->komanda ?></p>
                                                    <p>
                                                        <a class="btn btn-primary" data-toggle="collapse"
                                                           href="#multiCollapseExample25" role="button"
                                                           aria-expanded="false" aria-controls="multiCollapseExample25">Свернуть</a>
                                                    </p>
												<?php endif; ?>
                                                <!*--------------------------------------
                                                * /.
                                                * Вид: тексовое поле
                                                * Slug: komanda
                                                * Название: Команда (1. Страна проживания 2. Страна
                                                гражданства/резидентства 3. Роль 4. Прошлый опыт (аналогичный или
                                                полезный) 5. ФИО)
                                                * Вид div-а: text_field_single_post_1
                                                * ------------------------------------->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php endif; ?>
                </div>
            </div>
        </div>



        <!--Текст: Цель привлечения инвестиций-->
        <!--26. Сайт (картинкой ГуглДок)-->
		<?php if ( $post->sayt_avtora ) { ?>
            <hr>
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col text-center nazvanie_razdela">
                            <h4>Сайт</h4>
                        </div>
                    </div>
                    <div class="row">
                        <!--26. Сайт (картинкой ГуглДок)-->
                        <div class="col text-center nazvanie_razdela_knopka">
                            <p>
                                <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample26"
                                   role="button" aria-expanded="false" aria-controls="multiCollapseExample26">Сайт</a>
                            </p>
                            <div class="row">
                                <div class="col otkivaushayasya_karto4ka">
                                    <div class="collapse multi-collapse" id="multiCollapseExample26">
                                        <div class="card card-body">
                                            <div class="col text-center">
                                                <!*--------------------------------------
                                                * Вид: GoogleDoc
                                                * Slug: Meta-key:sayt_avtora
                                                * Название: Сайт (можете разместить ссылку на ваш сайт
                                                картинкой/изображением из GoogleDrive)
                                                * Вид div-а: google_doc_field_single_post_1
                                                * ------------------------------------->
                                                <div class="google_doc_field_single_post_1">
                                                    <!-- Check if current post($post) has field -->
													<?php /*if($post->sayt_avtora[0]) : */ ?>
                                                    <hr>
                                                    <h6>Просим прощения, что ссылка на сайт картинкой,
                                                        <br>нам тоже это не нравится,
                                                        <br>но это действительно необходимо</h6>
                                                    <hr>
                                                    <!-- array[0] is a link to file, array[1] is file name -->
                                                    <div class="uploadedfiles s_post_details">
                                                        <div class="row no-gutters">
                                                            <a target="blank"
                                                               href="<? /*= $post->sayt_avtora[0] */ ?>"><? /*= $post->sayt_avtora[0] */ ?></a>

															<?php /*var_dump(get_post_meta(get_the_ID())) */ ?>

                                                        </div>
                                                    </div>
													<?php /*endif; */ ?>
                                                    <!*--------------------------------------
                                                    * /.
                                                    * Вид: GoogleDoc
                                                    * Slug: sayt
                                                    * Название: Сайт (можете разместить ссылку на ваш сайт
                                                    картинкой/изображением из GoogleDrive)
                                                    * Вид div-а: google_doc_field_single_post_1
                                                    * ------------------------------------->
                                                </div>
                                                <!-- Вывод thumbnail-->
                                                <section>
                                                    <div class="container-fluid text-center"
                                                         style="background: #007bff">
                                                        <!--Thumbnail поста (картинка превьюха)-->
                                                        <div class="container-fluid post-img">

															<?php if ( $post->sayt_avtora ) { ?>
																<?php if(!strpos($post->sayt_avtora, 'preview?usp=drive_web')) { ?>
                                                                    <iframe src="https://drive.google.com/file/d/<?= getDriveID($post->sayt_avtora); ?>/preview?usp=drive_web" frameborder="0"></iframe>
																<?php } else { ?>
                                                                    <iframe src="<?= $post->sayt_avtora ?>" frameborder="0"></iframe>
																<?php } ?>
															<?php } else { ?>
                                                                <div class="no-image"></div>
															<?php } ?>
                                                            <br>
                                                            <p>
                                                                <a class="btn btn-primary" data-toggle="collapse"
                                                                   href="#multiCollapseExample26" role="button"
                                                                   aria-expanded="false"
                                                                   aria-controls="multiCollapseExample26">Свернуть</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		<?php } ?>

        <!--Анкорная ссылка к блоку "обороты"--> <a id="oborot"></a>
        <!--Анкорная ссылка к блоку "обороты"--> <a id="pribil"></a>

        <!--Факт денег на сегодня (чистая прибыль, оборот)-->
        <!--27. Чистая прибыль за последние 28. Оборот за последние -->
        <?php if (( $post->white_profit_last ) || ( $post->oborot ) ): ?>
            <hr>
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col text-center nazvanie_razdela">
                            <h4>Факт денег на сегодня</h4>
                        </div>
                    </div>
                    <div class="row">
                        <!--27. Чистая прибыль за последние-->
                        <?php if ( $post->white_profit_last ) : ?>
                            <div class="col text-center nazvanie_razdela_knopka">
                                <p>
                                    <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample27"
                                       role="button" aria-expanded="false" aria-controls="multiCollapseExample27">Чистая
                                        прибыль</a>
                                </p>
                                <div class="row">
                                    <div class="col otkivaushayasya_karto4ka">
                                        <div class="collapse multi-collapse" id="multiCollapseExample27">
                                            <div class="card card-body">
                                                <div class="col text-left">
                                                    <!*--------------------------------------
                                                    * Вид: тексовое поле
                                                    * Slug: white_profit_last
                                                    * Название: Чистая прибыль за последние 12 месяцев (6 или 3 мес., если
                                                    существуют менее 12 мес.) (EX: Чистая прибыль за последние 12 месяцев (6
                                                    или 3 мес., если существуете менее 12 мес.))
                                                    * Вид div-а: text_field_single_post_1
                                                    * ------------------------------------->
                                                    <div class="row">
                                                        <div class="col text-left">
                                                            <div class="text_field_single_post_1 text-left">
                                                                <?php if ( $post->white_profit_last ) : ?>
                                                                    <h6>Чистая прибыль за последние 12 месяцев (6 или 3
                                                                        мес., если существуют менее 12 мес.)</h6>
                                                                    <div class="row">
                                                                        <div class="col text-right" style="color: green">
                                                                            <h3><?= $post->white_profit_last ?></h3></div>
                                                                        <div class="col text-left d-flex align-items-center">
                                                                            <h6>$ США</h6></div>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <!*--------------------------------------
                                                                * /.
                                                                * Вид: тексовое поле
                                                                * Slug: white_profit_last
                                                                * Название: Чистая прибыль за последние 12 месяцев (6 или 3
                                                                мес., если существуют менее 12 мес.) (EX: Чистая прибыль за
                                                                последние 12 месяцев (6 или 3 мес., если существуете менее
                                                                12 мес.))
                                                                * Вид div-а: text_field_single_post_1
                                                                * ------------------------------------->

                                                                <!--Текстовое поле: вывод текста Коммента в 1000 символов-->
                                                                <div class="col text-left p-0">
                                                                    <!*--------------------------------------
                                                                    * Вид: тексовое поле
                                                                    * Slug:
                                                                    kratkij_kommentarij_chistaya_pribyl_za_poslednie_17
                                                                    * Название: Краткий комментарий (Чистая прибыль за
                                                                    последние
                                                                    * ------------------------------------->
                                                                    <div class="text_field_single_post_1 row p-0">
                                                                        <?php if ( $post->kratkij_kommentarij_chistaya_pribyl_za_poslednie_17 ) : ?>
                                                                            <div class="col text-left p-0"
                                                                                 >
                                                                                <h6><?= $post->kratkij_kommentarij_chistaya_pribyl_za_poslednie_17 ?></h6>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                        <!*--------------------------------------
                                                                        * /.
                                                                        * Вид: тексовое поле
                                                                        * ------------------------------------->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p>
                                                                <a class="btn btn-primary" data-toggle="collapse"
                                                                   href="#multiCollapseExample27" role="button"
                                                                   aria-expanded="false"
                                                                   aria-controls="multiCollapseExample27">Свернуть</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <!--28. Оборот за последние-->
                        <?php if ( $post->oborot ) : ?>
                            <div class="col text-center nazvanie_razdela_knopka">
                                <p>
                                    <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample28"
                                       role="button" aria-expanded="false" aria-controls="multiCollapseExample28">Оборот</a>
                                </p>
                                <div class="row">
                                    <div class="col otkivaushayasya_karto4ka">
                                        <div class="collapse multi-collapse" id="multiCollapseExample28">
                                            <div class="card card-body">
                                                <div class="col text-left">
                                                    <!*--------------------------------------
                                                    * Вид: тексовое поле
                                                    * Slug: oborot
                                                    * Название: Оборот за последние 12 месяцев (6 мес. или 3 мес., если
                                                    существуете менее 12 мес.) ( $ США ) ( $ США. Пример №1: 56000, пример
                                                    №2: 0)
                                                    * Вид div-а: text_field_single_post_1
                                                    * ------------------------------------->
                                                    <div class="text_field_single_post_1 text-left">
                                                        <?php if ( $post->oborot ) : ?>
                                                            <h6>Оборот за последние 12 месяцев (6 или 3 мес., если
                                                                существуют менее 12 мес.)</h6>
                                                            <div class="row">
                                                                <div class="col text-right" style="color: green">
                                                                    <h3><?= $post->oborot ?></h3></div>
                                                                <div class="col text-left d-flex align-items-center"><h6>$
                                                                        США</h6></div>
                                                            </div>
                                                        <?php endif; ?>
                                                        <!*--------------------------------------
                                                        * /.
                                                        * Вид: тексовое поле
                                                        * Slug: oborot
                                                        * Название: Оборот за последние 12 месяцев (6 мес. или 3 мес., если
                                                        существуете менее 12 мес.) ( $ США ) ( $ США. Пример №1: 56000,
                                                        пример №2: 0)
                                                        * Вид div-а: text_field_single_post_1
                                                        * ------------------------------------->

                                                        <!--Текстовое поле: вывод текста Коммента в 1000 символов-->
                                                        <div class="col text-left p-0">
                                                            <!*--------------------------------------
                                                            * Вид: тексовое поле
                                                            * Slug: kratkij_kommentarij_oborot_za_poslednie_62
                                                            * Название: Краткий комментарий: Оборот за последние
                                                            * ------------------------------------->
                                                            <div class="text_field_single_post_1 row p-0">
                                                                <?php if ( $post->kratkij_kommentarij_oborot_za_poslednie_62 ) : ?>
                                                                    <div class="col text-left p-0" >
                                                                        <h6><?= $post->kratkij_kommentarij_oborot_za_poslednie_62 ?></h6>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <!*--------------------------------------
                                                                * /.
                                                                * Вид: тексовое поле
                                                                * ------------------------------------->
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <p>
                                                        <a class="btn btn-primary" data-toggle="collapse"
                                                           href="#multiCollapseExample28" role="button"
                                                           aria-expanded="false" aria-controls="multiCollapseExample28">Свернуть</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <hr>

        <!--Юридические данные о бизнесе (резидентство, территория действия, лицензии, авторские права, стадия бизнеса и др.)-->
        <!--31. Статус юридического лица 32. Стадия, категория, этап бизнеса 33. Наличие лицензий, патентов, авторских прав, других разрешений 34. Дата основания бизнеса 35. Страны действия бизнеса 36. Страны гражданства учредителей 37. Страны регистрации бизнеса-->
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col text-center nazvanie_razdela">
                        <h4>Юридические данные о бизнесе</h4>
                    </div>
                </div>

                <!--31. Статус юридического лица-->
				<?php $status_yuridicheskogo_lica = get_post_meta( get_the_ID(), 'status_yuridicheskogo_lica', true );
				if ( is_array( $status_yuridicheskogo_lica ) && isset( $status_yuridicheskogo_lica[0] ) ) {
					?>
                    <div class="row">
                        <div class="col text-center nazvanie_razdela_knopka">
                            <p>
                                <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample31"
                                   role="button" aria-expanded="false" aria-controls="multiCollapseExample31">Статус
                                    юридического лица</a>
                            </p>
                            <div class="row">
                                <div class="col otkivaushayasya_karto4ka">
                                    <div class="collapse multi-collapse" id="multiCollapseExample31">
                                        <div class="card card-body">
                                            <div class="col text-left">
                                                <!--31. Чекбокс (НЕ таксономия): Статус юридического лица. Meta-key: status_yuridicheskogo_lica-->
												<?php foreach ( $status_yuridicheskogo_lica as $single ) {
													echo '<li>' . $single . '</li>';
												} ?>

                                                <hr>

                                                <!--Текстовое поле: вывод текста Коммента в 1000 символов-->
                                                <div class="col text-left p-0">
                                                    <!*--------------------------------------
                                                    * Вид: тексовое поле
                                                    * Slug: kk_status_yuridicheskogo_lica
                                                    * Название: Краткий комментарий: Статус юридического лица
                                                    * ------------------------------------->
                                                    <div class="text_field_single_post_1 row p-0">
														<?php if ( $post->kk_status_yuridicheskogo_lica ) : ?>
                                                            <div class="col text-left p-0" style="color: black">
                                                                <h6><?= $post->kk_status_yuridicheskogo_lica ?></h6>
                                                            </div>
														<?php endif; ?>
                                                        <!*--------------------------------------
                                                        * /.
                                                        * Вид: тексовое поле
                                                        * ------------------------------------->
                                                    </div>
                                                </div>
                                                <div class="col text-center">
                                                    <p>
                                                        <a class="btn btn-primary" data-toggle="collapse"
                                                           href="#multiCollapseExample31" role="button"
                                                           aria-expanded="false" aria-controls="multiCollapseExample31">Свернуть</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				<?php } ?> <!--/.31. Статус юридического лица-->

                <!--32. Чекбокс (НЕ таксономия): Стадия, категория, этап бизнеса. Meta-key: stadiya_kategoriya_etap_biznesa_99-->
				<?php $stadiya_kategoriya_etap_biznesa_99 = get_post_meta( get_the_ID(), 'stadiya_kategoriya_etap_biznesa_99', true );
				if ( is_array( $stadiya_kategoriya_etap_biznesa_99 ) && isset( $stadiya_kategoriya_etap_biznesa_99[0] ) ) {
					?>
                    <div class="row">
                        <!--32. Стадия, категория, этап бизнеса-->
                        <div class="col text-center nazvanie_razdela_knopka">
                            <p>
                                <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample32"
                                   role="button" aria-expanded="false" aria-controls="multiCollapseExample32">Стадия,
                                    категория, этап бизнеса</a>
                            </p>
                            <div class="row">
                                <div class="col otkivaushayasya_karto4ka">
                                    <div class="collapse multi-collapse" id="multiCollapseExample32">
                                        <div class="card card-body">
                                            <div class="col text-left">
                                                <!--32. Чекбокс (НЕ таксономия): Стадия, категория, этап бизнеса. Meta-key: stadiya_kategoriya_etap_biznesa_99-->
												<?php foreach ( $stadiya_kategoriya_etap_biznesa_99 as $single ) {
													echo '<li>' . $single . '</li>';
												} ?>

                                                <hr>

                                                <!--Текстовое поле: вывод текста Коммента в 1000 символов-->
                                                <div class="col text-left p-0">
                                                    <!*--------------------------------------
                                                    * Вид: тексовое поле
                                                    * Slug: kk_stadiya_kategoriya_etap_biznesa
                                                    * Название: Краткий комментарий: Стадия, категория, этап бизнеса
                                                    * ------------------------------------->
                                                    <div class="text_field_single_post_1 row text-left p-0">
														<?php if ( $post->kk_stadiya_kategoriya_etap_biznesa ) : ?>
                                                            <div class="col text-left p-0" >
                                                                <h6><?= $post->kk_stadiya_kategoriya_etap_biznesa ?></h6>
                                                            </div>
														<?php endif; ?>
                                                        <!*--------------------------------------
                                                        * /.
                                                        * Вид: тексовое поле
                                                        * ------------------------------------->
                                                    </div>
                                                </div>
                                                <div class="col text-center">
                                                    <p>
                                                        <a class="btn btn-primary" data-toggle="collapse"
                                                           href="#multiCollapseExample32" role="button"
                                                           aria-expanded="false" aria-controls="multiCollapseExample32">Свернуть</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				<?php } ?> <!--/.32. Стадия, категория, этап бизнеса-->


                <div class="row">
                    <!--33. Наличие лицензий, патентов, авторских прав, других разрешений-->
                    <div class="col text-center nazvanie_razdela_knopka">
                        <p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample33"
                               role="button" aria-expanded="false" aria-controls="multiCollapseExample33">Патенты,
                                авторские права, др.</a>
                        </p>
                        <div class="row">
                            <div class="col otkivaushayasya_karto4ka">
                                <div class="collapse multi-collapse" id="multiCollapseExample33">
                                    <div class="card card-body">
                                        <!--Текстовое поле (+радио): радио Лицензии-->
                                        <div class="col text-left " >
                                            <!*--------------------------------------
                                            * Вид: Текстовое поле (+радио)
                                            * Slug: licenzii
                                            * Название: Лицензии
                                            * ------------------------------------->
												<?php if ( $post->licenzii ) : ?>
                                                    <li><?= $post->licenzii ?></li>
												<?php endif; ?>
                                                <!*--------------------------------------
                                                * /.
                                                * Вид: тексовое поле
                                                * ------------------------------------->
                                        </div>
                                        <!--Текстовое поле (+радио): радио Авторские права-->
                                        <div class="col text-left ">
                                            <!*--------------------------------------
                                            * Вид: Текстовое поле (+радио)
                                            * Slug: avtorskie_prava
                                            * Название: Авторские права
                                            * ------------------------------------->
												<?php if ( $post->avtorskie_prava ) : ?>
                                                        <li><?= $post->avtorskie_prava ?></li>
												<?php endif; ?>
                                                <!*--------------------------------------
                                                * /.
                                                * Вид: тексовое поле
                                                * ------------------------------------->
                                        </div>
                                        <!--Текстовое поле (+радио): радио Патенты-->
                                        <div class="col text-left ">
                                            <!*--------------------------------------
                                            * Вид: Текстовое поле (+радио)
                                            * Slug: patenty
                                            * Название: Патенты
                                            * ------------------------------------->
												<?php if ( $post->patenty ) : ?>
                                                        <li><?= $post->patenty ?></li>
												<?php endif; ?>
                                                <!*--------------------------------------
                                                * /.
                                                * Вид: тексовое поле
                                                * ------------------------------------->
                                        </div>
                                        <!--Текстовое поле (+радио): радио Иные специальные разрешения-->
                                        <div class="col text-left ">
                                            <!*--------------------------------------
                                            * Вид: Текстовое поле (+радио)
                                            * Slug: inye_specialnye_razresheniya
                                            * Название: Иные специальные разрешения
                                            * ------------------------------------->
												<?php if ( $post->inye_specialnye_razresheniya ) : ?>
                                                        <li><?= $post->inye_specialnye_razresheniya ?></li>
												<?php endif; ?>
                                                <!*--------------------------------------
                                                * /.
                                                * Вид: тексовое поле
                                                * ------------------------------------->
                                        </div>



                                        <!--Текстовое поле (+радио): вывод текста Краткий комментарий: Лицензии, Авторские права, Патенты, Иные специальные разрешения-->
                                        <div class="col text-center p-0">
                                            <!*--------------------------------------
                                            * Вид: тексовое поле
                                            * Slug: kk_licenzii_avtorskie_patenty_inye
                                            * Название: Краткий комментарий: Лицензии, Авторские права, Патенты, Иные
                                            специальные разрешения
                                            * ------------------------------------->
                                            <div class="text_field_single_post_1 row p-0">
												<?php if ( $post->kk_licenzii_avtorskie_patenty_inye ) : ?>
                                                    <div class="col text-center" >
                                                        <hr>
                                                        <h6><?= $post->kk_licenzii_avtorskie_patenty_inye ?></h6>
                                                    </div>
												<?php endif; ?>
                                                <!*--------------------------------------
                                                * /.
                                                * Вид: тексовое поле
                                                * ------------------------------------->
                                            </div>

                                            <div class="col text-center"
                                                <p>
                                                    <a class="btn btn-primary" data-toggle="collapse"
                                                       href="#multiCollapseExample33" role="button" aria-expanded="false"
                                                       aria-controls="multiCollapseExample33">Свернуть</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!--34. Дата основания бизнеса-->
                    <div class="col text-center nazvanie_razdela_knopka">
                        <p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample34"
                               role="button" aria-expanded="false" aria-controls="multiCollapseExample34">Дата основания
                                бизнеса</a>
                        </p>
                        <div class="row">
                            <div class="col otkivaushayasya_karto4ka">
                                <div class="collapse multi-collapse" id="multiCollapseExample34">
                                    <div class="card card-body">
                                        <div class="col text-center">
                                            <!*--------------------------------------
                                            * Вид: тексовое поле
                                            * Slug: data_osnovaniya_biznesa_19
                                            * Название: Дата основания бизнеса
                                            * Вид div-а: text_field_single_post_1
                                            * ------------------------------------->
                                            <div class="text_field_single_post_1 text-center">
												<?php if ( $post->data_osnovaniya_biznesa_19 ) : ?>
                                                    <h6><?= $post->data_osnovaniya_biznesa_19 ?></h6>
												<?php endif; ?>
                                                <!*--------------------------------------
                                                * /.
                                                * Вид: тексовое поле
                                                * Slug: data_osnovaniya_biznesa_19
                                                * Название: Дата основания бизнеса
                                                * Вид div-а: text_field_single_post_1
                                                * ------------------------------------->
                                            </div>
                                            <p>
                                                <a class="btn btn-primary" data-toggle="collapse"
                                                   href="#multiCollapseExample34" role="button" aria-expanded="false"
                                                   aria-controls="multiCollapseExample34">Свернуть</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!--36. Страны гражданства учредителей-->
					<?php $uchrediteli_countries = get_the_terms( get_the_ID(), 'uchrediteli_countries' );
					if ( isset( $uchrediteli_countries ) && is_array( $uchrediteli_countries ) ) { ?>
                        <div class="col text-center nazvanie_razdela_knopka">
                            <p>
                                <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample36"
                                   role="button" aria-expanded="false" aria-controls="multiCollapseExample36">Страны
                                    гражданства учредителей</a>
                            </p>
                            <div class="row">
                                <div class="col otkivaushayasya_karto4ka">
                                    <div class="collapse multi-collapse" id="multiCollapseExample36">
                                        <div class="card card-body">
                                            <div class="col text-center">
                                                <!*--------------------------------------
                                                * Вид: таксономия
                                                * Slug: Meta-key: taxonomy-uchrediteli_countries
                                                * Название: Страны гражданства (резедентства) учредителей
                                                * Вид div-а: taxonomy_field_single_post_1
                                                * ------------------------------------->
                                                <div class="taxonomy_field_single_post_1 text-left">
                                                    <!--Check if the post has checked taxonomy-countries taxonomy -->
                                                    <?php
                                                    $uchrediteli_countries = get_the_terms(get_the_ID(), 'uchrediteli_countries');
                                                    if(isset($uchrediteli_countries) && is_array($uchrediteli_countries)) {
                                                        echo '<p>';
                                                        echo '<ol>';
                                                        for($i=0; $i<count($uchrediteli_countries);$i++) {
                                                            echo $uchrediteli_countries[$i]->name;
                                                            if((($i == count($uchrediteli_countries) || ($i+1 == count($uchrediteli_countries) )) == false)) echo '<li>';
                                                        }
                                                        echo '</ol>';
                                                        echo '</p>';
                                                        ?>
                                                    <?php } ?>

                                                    <!*--------------------------------------
                                                    *    /.
                                                    *    Вид: таксономия
                                                    *    Slug: Meta-key:taxonomy-uchrediteli_countries
                                                    *    Название: Страны гражданства (резедентства) учредителей
                                                    *    Вид div-а: taxonomy_field_single_post_1
                                                    * ------------------------------------->
                                                </div>
                                                <p>
                                                    <a class="btn btn-primary" data-toggle="collapse"
                                                       href="#multiCollapseExample36" role="button"
                                                       aria-expanded="false" aria-controls="multiCollapseExample36">Свернуть</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php } ?>
                </div>
                <div class="row">
                    <!--37. Страны регистрации бизнеса-->
					<?php $country_of_registration = get_the_terms( get_the_ID(), 'country_of_registration' );
					if ( isset( $country_of_registration ) && is_array( $country_of_registration ) ) { ?>
                        <div class="col text-center nazvanie_razdela_knopka">
                            <p>
                                <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample37"
                                   role="button" aria-expanded="false" aria-controls="multiCollapseExample37">Страны
                                    регистрации бизнеса</a>
                            </p>
                            <div class="row">
                                <div class="col otkivaushayasya_karto4ka">
                                    <div class="collapse multi-collapse" id="multiCollapseExample37">
                                        <div class="card card-body">
                                            <div class="col text-center">
                                                <!*--------------------------------------
                                                * Вид: таксономия
                                                * Slug: Meta-key:taxonomy-country_of_registration
                                                * Название: Страны регистрации бизнеса
                                                * Вид div-а: taxonomy_field_single_post_1
                                                * ------------------------------------->
                                                <div class="taxonomy_field_single_post_1 text-left">
                                                    <!--Check if the post has checked taxonomy-countries taxonomy -->
                                                    <?php
                                                    $country_of_registration = get_the_terms(get_the_ID(), 'country_of_registration');
                                                    if(isset($country_of_registration) && is_array($country_of_registration)) {
                                                        echo '<p>';
                                                        echo '<ol>';
                                                        for($i=0; $i<count($country_of_registration);$i++) {
                                                            echo $country_of_registration[$i]->name;
                                                            if((($i == count($country_of_registration) || ($i+1 == count($country_of_registration) )) == false)) echo '<li>';
                                                        }
                                                        echo '</ol>';
                                                        echo '</p>';
                                                        ?>
                                                    <?php } ?>

                                                    <!*--------------------------------------
                                                    *    /.
                                                    *    Вид: таксономия
                                                    *    Slug: Meta-key:taxonomy-uchrediteli_countries
                                                    *    Название: Страны регистрации бизнеса
                                                    *    Вид div-а: taxonomy_field_single_post_1
                                                    * ------------------------------------->
                                                </div>
                                                <p>
                                                    <a class="btn btn-primary" data-toggle="collapse"
                                                       href="#multiCollapseExample37" role="button"
                                                       aria-expanded="false" aria-controls="multiCollapseExample37">Свернуть</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php } ?>
                </div>
                <div class="row">
                    <!--35. Страны действия бизнеса-->
					<?php $countries = get_the_terms( get_the_ID(), 'countries' );
					if ( isset( $countries ) && is_array( $countries ) ) { ?>
                        <div class="col text-center nazvanie_razdela_knopka">
                            <p>
                                <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample35"
                                   role="button" aria-expanded="false" aria-controls="multiCollapseExample35">Страны
                                    действия бизнеса</a>
                            </p>
                            <div class="row">
                                <div class="col otkivaushayasya_karto4ka">
                                    <div class="collapse multi-collapse" id="multiCollapseExample35">
                                        <div class="card card-body">
                                            <div class="col text-center">
                                                <!*--------------------------------------
                                                * Вид: таксономия
                                                * Slug: countries
                                                * Название: Страны действия бизнеса
                                                * Вид div-а: taxonomy_field_single_post_1
                                                * ------------------------------------->
                                                <div class="taxonomy_field_single_post_1 text-left">
                                                    <!--Check if the post has checked taxonomy-countries taxonomy -->
                                                    <?php
                                                    $countries = get_the_terms(get_the_ID(), 'countries');
                                                    if(isset($countries) && is_array($countries)) {
                                                        echo '<p class="each_second_li_is_gray">';
                                                        echo '<ol>';
                                                        for($i=0; $i<count($countries);$i++) {
                                                            echo $countries[$i]->name;
                                                            if((($i == count($countries) || ($i+1 == count($countries) )) == false)) echo '<li>';
                                                        }
                                                        echo '</ol>';
                                                        echo '</p>';
                                                        ?>
                                                    <?php } ?>

                                                    <!*--------------------------------------
                                                    *    /.
                                                    *    Вид: таксономия
                                                    *    Название: Страны действия бизнеса
                                                    *    Вид div-а: taxonomy_field_single_post_1
                                                    * ------------------------------------->
                                                </div>
                                                <p>
                                                    <a class="btn btn-primary" data-toggle="collapse"
                                                       href="#multiCollapseExample35" role="button"
                                                       aria-expanded="false" aria-controls="multiCollapseExample35">Свернуть</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php } ?>
                </div>
            </div>
        </div>

    <?php
    /*Из php ютуб репитера*/
    $youtube_repeater = get_post_meta( get_the_ID(), 'youtube_repeater', true );
    /*Из php гугл документы репитера*/
    $post_meta = get_post_meta( get_the_ID(), 'repeaterdata', true );
    /*Если добавлено видео в Ютуб репитер ИЛИ Добавлен файл в гугл документ репитер, то выводить весь раздел
    где дополнительно есть эти две проверки отдельно*/
    if ( is_array( $youtube_repeater ) && ! empty( $youtube_repeater[0] )) { ?>
            <hr>
            <!--30. Дополнительные видео и документы-->
            <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col text-center nazvanie_razdela">
                        <h4>Дополнительные видео и документы</h4>
                    </div>
                </div>
                <div class="row">
                    <!--12. Бизнес-цели-->
                    <div class="col text-center nazvanie_razdela_knopka">
                        <p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample12"
                               role="button" aria-expanded="false" aria-controls="multiCollapseExample12">Дополнительные
                                видео и документы</a>
                        </p>
                        <div class="row">
                            <div class="col otkivaushayasya_karto4ka">
                                <div class="collapse multi-collapse" id="multiCollapseExample12">
                                    <div class="card card-body">
                                        <div class="col text-center">
											<?php
											$youtube_repeater = get_post_meta( get_the_ID(), 'youtube_repeater', true );
											if ( is_array( $youtube_repeater ) && ! empty( $youtube_repeater[0] ) ) {
												echo '<h6>Дополнительные видео, загруженные автором проекта</h6>';
												foreach ( $youtube_repeater as $video ) {
													?>
                                                    <div class="youtube-frame s_post_details">
                                                        <iframe width="500" height="282"
                                                                src="https://www.youtube.com/embed/<?= extractUTubeVidId( $video ) ?>"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                allowfullscreen></iframe>
                                                    </div>
													<?php
												}
												echo '<hr>';
											}
											$post_meta = get_post_meta( get_the_ID(), 'repeaterdata', true );
											if ( is_array( $post_meta ) && $post_meta[0] ) {
												echo '<h6>Файлы, прикрепленные автором проекта</h6>';
												for ( $i = 0; $i <= count( $post_meta ); $i += 2 ) {
													if ( ! is_null( $post_meta[ $i + 1 ] ) ) {
														echo '<div class="s_post_details"><span>Файл ' . $post_meta[ $i + 1 ] . '&nbsp;</span><a target="_blank" href="' . $post_meta[ $i ] . '">' . $post_meta[ $i ] . '</a></div><br>';
													}
												}
											}
											?>
                                        </div>
                                        <div class="col text-center">
                                            <p>
                                                <a class="btn btn-primary text-center" data-toggle="collapse"
                                                   href="#multiCollapseExample12" role="button" aria-expanded="false"
                                                   aria-controls="multiCollapseExample12">Свернуть</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
           
    <!-- ЛИА 20210228 Ели описание проекта НЕ введено, поле НЕ выводить +линию перед тоже не выводить -->
     <? if (get_the_content())  { ?>
            
        <hr>


        <!--29. Вывод текста поста ( Содержание публикации )-->
        <?php /*if (get_the_content() ! NULL) : */ ?><!--
        <?php /*if ! empty ( get_the_content() ) : bool */ ?>
        --><?php /*if (!empty($text)) { */ ?>


        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col text-center nazvanie_razdela">
                        <h4>Текст: Описание проекта</h4>
                    </div>
                </div>
                <div class="row">
                    <!--29. Описание проекта-->
                    <div class="col text-center nazvanie_razdela_knopka">
                        <p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample29"
                               role="button" aria-expanded="false" aria-controls="multiCollapseExample29">Описание
                                проекта</a>
                        </p>
                        <div class="row">
                            <div class="col otkivaushayasya_karto4ka">
                                <div class="collapse multi-collapse" id="multiCollapseExample29">
                                    <div class="card card-body">
                                        <div class="row">
                                            <div class="col text-center">
                                                <div class="post-origin">
													<?= get_the_content() ?>
                                                    <p>
                                                        <a class="btn btn-primary" data-toggle="collapse"
                                                           href="#multiCollapseExample29" role="button"
                                                           aria-expanded="false" aria-controls="multiCollapseExample29">Свернуть</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <? } ?> <!-- /* ЛИА 20210228 Ели описание проекта НЕ введено, поле НЕ выводить +линию перед тоже не выводить -->

    <hr>

    <!--Кнопка дебагинга открыть все вкладки-->
    <div class="col p-2" >
        <p style="text-align: center">
            <a style="color: white" class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2 multiCollapseExample3 multiCollapseExample4 multiCollapseExample5 multiCollapseExample6 multiCollapseExample7 multiCollapseExample8 multiCollapseExample9 multiCollapseExample10 multiCollapseExample11 multiCollapseExample12 multiCollapseExample13 multiCollapseExample14 multiCollapseExample15 multiCollapseExample16 multiCollapseExample17 multiCollapseExample18 multiCollapseExample19 multiCollapseExample20 multiCollapseExample21 multiCollapseExample22 multiCollapseExample23 multiCollapseExample24 multiCollapseExample25 multiCollapseExample26 multiCollapseExample27 multiCollapseExample28 multiCollapseExample29 multiCollapseExample30 multiCollapseExample31 multiCollapseExample32 multiCollapseExample33 multiCollapseExample34 multiCollapseExample35 multiCollapseExample36 multiCollapseExample37 multiCollapseExample38 multiCollapseExample39 multiCollapseExample40 ">Открыть все кнопки</a>
        </p>
    </div>

    <!--100500 Вывод технических деталей var_dump-->
        <div class="row ">
            <div class="col">
                <div class="row">
                    <div class="col text-center">
                    </div>
                </div>
                <div class="row">

    <!--100500 Технические данные для идентификации поста-->

                    <div class="col text-center">
                    <p>
                        <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample100500"
                           role="button" aria-expanded="false" aria-controls="multiCollapseExample100500">
                            var_dump(get_post_meta(get_the_ID</a>
                    </p>
                    <div class="row">
                        <div class="col otkivaushayasya_karto4ka">
                            <div class="collapse multi-collapse" id="multiCollapseExample100500">
                                <div class="card card-body">
									<?php var_dump( get_post_meta( get_the_ID() ) ); ?>
                                    <p>
                                        <a class="btn btn-primary" data-toggle="collapse"
                                           href="#multiCollapseExample100500" role="button" aria-expanded="false"
                                           aria-controls="multiCollapseExample100500">Свернуть</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

		<? /* } endif; */ ?>

        <!-- Редактировать пост-->
		<?php if ( ! is_null( get_current_user_id() ) && get_current_user_id() !== 0 && get_current_user_id() == $post->post_author ) : ?>

            <hr>

            <!-- Редактировать пост-->
            <div class="row action post-content" style="background: #bbff80">
				<?php if ( ! is_null( get_current_user_id() ) && get_current_user_id() !== 0 && get_current_user_id() == $post->post_author ) : ?>
                    <div class="col edit-post text-center">
                        Желаете изменить данные вашего проекта? Нажмите -> <?php echo edit_post_link(); ?>
                    </div>
				<?php endif; ?>
            </div>
		<?php endif; ?>


        <hr>

        <!--Кто автор, когда сделан пост-->
        <div class="row">
            <div class="col text-center" id="post-<?php the_ID(); ?>">
                <div class="entry-header">
					<?php

					if ( 'post' === get_post_type() ) :
						?>
                        <div class="entry-meta">
                            <?php
                            mf_invest_shop_posted_on();
                            mf_invest_shop_posted_by();
                            ?>
                        </div><!-- .entry-meta -->
					<?php endif; ?>
                </div><!-- .entry-header -->
				<?php global $post; ?>
            </div>
        </div>
    </article>

    <!--bootstrap-->
    <section>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
              integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
              crossorigin="anonymous">

        <!--Воюет с плагином-переводчиком-->
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
                integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
                crossorigin="anonymous"></script>

    </section>

    <!--Шрифты Гугл-->
    <div>
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    </div>

    <!--CSS ЛИА 20200725_0136-->
    <style type="text/css">
        /*Каждый четный "контейнер" покрасить в этот цвет*/
        /* .container > .row:nth-child(even){
             background: #fdffbb !important;
         }*/

        /*отладка*/
      /*   .row {
             border: 1px green solid;
         }
         .col, .col-xl {
             border: 1px #fc3145 solid !important;
         }
           !*Каждый четный "контейнер" покрасить в этот цвет*!
           .container > .row:nth-child(even){
               background: #fdffbb;
           }

        .jalobi_commenty:hover {
            background: #f0f0fa;
        }
*/


    </style>
