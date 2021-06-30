<a href="<?php the_permalink(); ?>" class="jumbotron p-jumbotron">
    <?php if($post->thumbnailimg) : ?>
	<?php if ( ! strpos( $post->thumbnailimg, 'preview?usp=drive_web') && !is_null(getDriveID( $post->thumbnailimg))) {?>
        <iframe src="https://drive.google.com/file/d/<?= getDriveID( $post->thumbnailimg ); ?>/preview?usp=drive_web"
                frameborder="0"></iframe>
	<?php } else { ?>
        <iframe src="<?= $post->thumbnailimg ?>" frameborder="0"></iframe>
	<?php } ?>
    <?php endif; ?>


    <h2 class="f18">
		<?php if ( empty( get_the_title() ) ) {
			echo 'Без названия';
		} else {
			the_title();
		} ?>
    </h2>

    <!-- Название: Сумма инвестиций которые нужны бизнесу (в $ США ) -->
    <div class="text_field_single_post_1">
		<?php if ( $post->summa_investicij_kotorye_nuzhny_biznesu_38 ) : ?>
            <div class="row">

                <div class="col text-right" style="color: green; min-width: auto;">
                    <h5>
                        Проект получит
                    </h5>


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
    </div>


    <!--2. Уже собрано денег ( $ ) -->
    <div class="text_field_single_post_1">
		<?php if ( $post->now_collected_money ) : ?>
            <div class="row">
                <div class="col text-right"
                     style="color: green; min-width: auto;">
                    <hr>
                    <h5>
                        Уже собрано денег
                    </h5>

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
    </div>
    <hr>

    <!-- Глобальные виды бизнеса -->
    <div class="taxonomy_field_single_post_1">
        <!--Check if the post has checked global_business_spheres taxonomy -->
		<?php
		$global_business_spheres = get_the_terms( get_the_ID(), 'global_business_spheres' );
		if ( isset( $global_business_spheres ) && is_array( $global_business_spheres ) ) {
			echo '<p>';
			for ( $i = 0; $i < count( $global_business_spheres ); $i ++ ) {
				echo $global_business_spheres[ $i ]->name;
				if ( ( ( $i == count( $global_business_spheres ) || ( $i + 1 == count( $global_business_spheres ) ) ) == false ) ) {
					echo '<li>';
				}
			}
			echo '</p>';
			?>
		<?php } ?>
        <!*--------------------------------------
        * /.
        * Вид: таксономия
        * Slug: Meta-key:taxonomy-global_business_spheres
        * Название: Глобальные виды бизнеса
        * Вид div-а: taxonomy_field_single_post_1
        * ------------------------------------->
    </div>

    <hr>

    <!--14. Обобщенные сферы бизнесов-->
    <div class="taxonomy_field_single_post_1">
        <!--Check if the post has checked all_business_spheres taxonomy -->
		<?php
		$all_business_spheres = get_the_terms( get_the_ID(), 'all_business_spheres' );
		if ( isset( $all_business_spheres ) && is_array( $all_business_spheres ) ) {
			echo '<p>';
			for ( $i = 0; $i < count( $all_business_spheres ); $i ++ ) {
				echo $all_business_spheres[ $i ]->name;
				if ( ( ( $i == count( $all_business_spheres ) || ( $i + 1 == count( $all_business_spheres ) ) ) == false ) ) {
					echo '<li>';
				}
			}
			echo '</p>';
			?>
		<?php } ?>
        <!*--------------------------------------
        * /.
        * Вид: таксономия
        * Slug: Meta-key:taxonomy-all_business_spheres
        * Название: Обобщенные сферы бизнесов
        * Вид div-а: taxonomy_field_single_post_1
        * ------------------------------------->
    </div>

    <hr>

    <!--15. Точное нишевое соответствие-->
    <div class="taxonomy_field_single_post_1">
        <!--Check if the post has checked exact_branch_accordance taxonomy -->
		<?php
		$exact_branch_accordance = get_the_terms( get_the_ID(), 'exact_branch_accordance' );
		if ( isset( $exact_branch_accordance ) && is_array( $exact_branch_accordance ) ) {

			echo '<p>';
			for ( $i = 0; $i < count( $exact_branch_accordance ); $i ++ ) {
				echo $exact_branch_accordance[ $i ]->name;
				if ( ( ( $i == count( $exact_branch_accordance ) || ( $i + 1 == count( $exact_branch_accordance ) ) ) == false ) ) {
					echo '<li>';
				}
			}
			echo '</p>';
			?>
		<?php } ?>
        <!*--------------------------------------
        * /.
        * Вид: таксономия
        * Slug: Meta-key:taxonomy-all_business_spheres
        * Название: Точное нишевое соответствие
        * Вид div-а: taxonomy_field_single_post_1
        * ------------------------------------->
    </div>


    <!--Точное нишевое соответствие: Текстовое поле: вывод текста Коммента в 1000 символов-->
    <div class="col text-center p-0">
        <!*--------------------------------------
        * Вид: тексовое поле
        * Slug: kk_tochnoe_nishevoe_sootvetstvie
        * Название: Краткий комментарий: Точное нишевое соответствие
        * ------------------------------------->
        <div class="text_field_single_post_1 row p-0">
			<?php if ( $post->kk_tochnoe_nishevoe_sootvetstvie ) : ?>
                <hr>
                <div class="col text-center p-0">
                    <hr>
                    <h6><?= $post->kk_tochnoe_nishevoe_sootvetstvie ?></h6>
                </div>
			<?php endif; ?>
            <!*--------------------------------------
            * /.
            * Вид: тексовое поле
            * ------------------------------------->
        </div>
    </div>


    <!-- Краткая запись о проекте -->
    <!-- <?php the_excerpt(); ?> -->
</a>