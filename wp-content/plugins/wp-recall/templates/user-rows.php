<!--Вывод контактов из базы данных: ФБ, Ин, Тг, Моб-->
<?php global $rcl_user, $rcl_users_set; ?>
<div class="container container_wp_recall_contacts" data-user-id="<?php echo $rcl_user->ID; ?>">
    <div class="row foto_and_name">
        <div class="col profile_thumbnail_wp_recall_user_rows_php">
            <a title="<?php rcl_user_name(); ?>" href="<?php rcl_user_url(); ?>">
                <?php rcl_user_avatar( 120 ); ?>
            </a>
            <?php rcl_user_rayting(); ?>
            <?php rcl_user_description(); ?>
        </div>
        <div class="col d-flex flex-row align-items-center justify-content-start imya_kogda_bil">
            <div class="row d-flex flex-row align-items-start justify-content-end kogda_bil">
                <div class="col d-flex flex-row align-items-start justify-content-start ">
                    <?php rcl_user_action( 2 ); ?>
                </div>
            </div>
            <div class="row d-flex flex-row align-items-center justify-content-start">
                <div class="user-name col d-flex flex-row align-items-center justify-content-start">
                    <a href="<?php rcl_user_url(); ?>"><?php rcl_user_name(); ?></a>
                </div>
            </div>
        </div>
    </div>


    <div class="user-contacts">
        <?php $usedata = get_user_meta($rcl_user->ID);
        		if(is_user_logged_in()) $logged=true;
        ?>
        <?php
        echo '<div class="display-4">Контакты:</div>';
        		if(@$usedata['number']) {
			if(!$logged) {
				$number=substr($usedata['number'][0], '0','8');
				echo '<div class="rcl-table__row-must-sort rcl-table__row" id="profile-field-number"><div class="rcl-table__cell rcl-table__cell-w-30"><label>Телефон:</label></div><div class="rcl-table__cell rcl-table__cell-w-70"><div id="rcl-field-number" class="rcl-field-input type-tel-input"><div class="rcl-field-core">
<a>'.$number.' <span class="show-hidden btn btn-primary">Показать</span></a>
</div></div></div></div>';
			}
			else {
				$number = $usedata['number'][0];
				echo '<div class="rcl-table__row-must-sort rcl-table__row" id="profile-field-number"><div class="rcl-table__cell rcl-table__cell-w-30"><label>Телефон:</label></div><div class="rcl-table__cell rcl-table__cell-w-70"><div id="rcl-field-number" class="rcl-field-input type-tel-input"><div class="rcl-field-core">
<a href="" disabled="disabled"  data-content="'.$number.'">'.substr($number, '0', '8').' <span class="show-hidden btn btn-primary">Показать</span></a>
</div></div></div></div>';
			}
		}
        if(@$usedata['social_facebook']) {
	        if(!$logged) {
		        $facebook=substr($usedata['social_facebook'][0], '0','11');
		        echo '<div class="rcl-table__row-must-sort rcl-table__row" id="profile-field-social_facebook"><div class="rcl-table__cell rcl-table__cell-w-30"><label>Facebook:</label></div><div class="rcl-table__cell rcl-table__cell-w-70"><div id="rcl-field-social_facebook" class="rcl-field-input type-text-input"><div class="rcl-field-core"><a target="_blank">'.$facebook.' <span class="show-hidden btn btn-primary">Показать</span></a></div></div></div></div>';
	        }
	        else {
		        $facebook = $usedata['social_facebook'][0];
		        echo '<div class="rcl-table__row-must-sort rcl-table__row" id="profile-field-social_facebook"><div class="rcl-table__cell rcl-table__cell-w-30"><label>Facebook:</label></div><div class="rcl-table__cell rcl-table__cell-w-70"><div id="rcl-field-social_facebook" class="rcl-field-input type-text-input"><div class="rcl-field-core"><a disabled="disabled"  href="" target="_blank" data-content="'.$facebook.'">'.substr($facebook, '0', '11').' <span class="show-hidden btn btn-primary">Показать</span></a></div></div></div></div>';
	        }
        }
        if(@$usedata['social_linkedin']) {
	        if(!$logged) {
		        $linkedin=substr($usedata['social_linkedin'][0], '0',11);
		        echo '<div class="rcl-table__row-must-sort rcl-table__row" id="profile-field-social_linkedin"><div class="rcl-table__cell rcl-table__cell-w-30"><label>LinkedIn:</label></div><div class="rcl-table__cell rcl-table__cell-w-70"><div id="rcl-field-social_linkedin" class="rcl-field-input type-text-input"><div class="rcl-field-core"><a target="_blank">'.$linkedin.' <span class="show-hidden btn btn-primary">Показать</span></a></div></div></div></div>';
	        }
	        else {
		        $linkedin = $usedata['social_linkedin'][0];
		        echo '<div class="rcl-table__row-must-sort rcl-table__row" id="profile-field-social_linkedin"><div class="rcl-table__cell rcl-table__cell-w-30"><label>LinkedIn:</label></div><div class="rcl-table__cell rcl-table__cell-w-70"><div id="rcl-field-social_linkedin" class="rcl-field-input type-text-input"><div class="rcl-field-core"><a disabled="disabled"  target="_blank" href="" data-content="'.$linkedin.'">'.substr($linkedin, '0', '11').' <span class="show-hidden btn btn-primary">Показать</span></a></div></div></div></div>';
	        }
        }
        if(@$usedata['social_instagram']) {
	        if(!$logged) {
		        $instagram=substr($usedata['social_instagram'][0], '0','11');
		        echo '<div class="rcl-table__row-must-sort rcl-table__row" id="profile-field-social_instagram"><div class="rcl-table__cell rcl-table__cell-w-30"><label>Instagram:</label></div><div class="rcl-table__cell rcl-table__cell-w-70"><div id="rcl-field-social_instagram" class="rcl-field-input type-text-input"><div class="rcl-field-core"><a target="_blank">'.$instagram.' <span class="show-hidden btn btn-primary">Показать</span></a></div></div></div></div>';
	        }
	        else {
		        $instagram = $usedata['social_instagram'][0];
		        echo '<div class="rcl-table__row-must-sort rcl-table__row" id="profile-field-social_instagram"><div class="rcl-table__cell rcl-table__cell-w-30"><label>Instagram:</label></div><div class="rcl-table__cell rcl-table__cell-w-70"><div id="rcl-field-social_instagram" class="rcl-field-input type-text-input"><div class="rcl-field-core"><a disabled="disabled"  target="_blank" href="" data-content="'.$instagram.'">'.substr($instagram, '0', '11').' <span class="show-hidden btn btn-primary">Показать</span></a></div></div></div></div>';
	        }
        }
        if(@$usedata['social_telegram']) {
	        if(!$logged) {
		        $telegram=substr($usedata['social_telegram'][0], '0',11);
		        echo '<div class="rcl-table__row-must-sort rcl-table__row" id="profile-field-social_telegram"><div class="rcl-table__cell rcl-table__cell-w-30"><label>Telegram:</label></div><div class="rcl-table__cell rcl-table__cell-w-70"><div id="rcl-field-social_telegram" class="rcl-field-input type-text-input"><div class="rcl-field-core"><a target="_blank">'.$telegram.' <span class="show-hidden btn btn-primary">Показать</span></a></div></div></div></div>';
	        }
	        else {
		        $telegram = $usedata['social_telegram'][0];
		        echo '<div class="rcl-table__row-must-sort rcl-table__row" id="profile-field-social_telegram"><div class="rcl-table__cell rcl-table__cell-w-30"><label>Telegram:</label></div><div class="rcl-table__cell rcl-table__cell-w-70"><div id="rcl-field-social_telegram" class="rcl-field-input type-text-input"><div class="rcl-field-core"><a disabled="disabled" target="_blank" href="" data-content="'.$telegram.'">'.substr($telegram, '0', '11').' <span class="show-hidden btn btn-primary">Показать</span></a></div></div></div></div>';
	        }
        }
        ?>
    </div>
</div>

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
