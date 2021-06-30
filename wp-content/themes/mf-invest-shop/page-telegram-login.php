<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MF_Invest_Shop
 */

get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="container">
                <h1 class="entry-title">Telegram Login (как привязать Telegram для альтернативного входа в
                    Платформу)</h1>
				<?php
				if ( wptelegram_login_user_id() ) {
					echo 'Если вы уже зарегистрировались через Facebook или LinkedIN, привязали Telegram, то кнопка входа
                    появится';
					echo do_shortCode( '[wptelegram-login button_style="small" show_user_photo="0" show_if_user_is="logged_in"]' );
					echo " &lt;&lt;здесь";
				} ?>
                <hr/>

				<?php
				if ( wptelegram_login_user_id() == 0 ) {
					echo ' Если вы уже зарегистрировались через Facebook или LinkedIN, вошли в портал через Facebook или
                    LinkedIN и желаете привязать Telegram, то кнопка привязки Telegram появится';
					echo do_shortCode( '[wptelegram-login button_style="small" show_user_photo="0" show_if_user_is="logged_in"]' );
					echo "&lt;&lt;здесь. Нажмите ее и выполните указанные в ней и ниже действия.";
				}
				?>
                <div class="mb-3"></div>

                <p>Войдите в ваш Telegram, откройте сообщения от сервиса Telegram и нажмите "Принять".</p>

                <p>Далее кликнете пожалуйста сюда <a href="https://telegram.me/MentorsflBot">@MentorsflBot</a> и нажмите
                    "Start" чтобы запустить бота.</p>

                <hr/>

                <p>Инструкция достаточно проста.</p>
                <ol>
                    <li>При помощи Telegram, нет возможности регистрироваться на платформе (создавать новую учетную
                        запись
                        пользователя для публикации проекта. Для регистрации можно использовать только Facebook или
                        LinkedIN
                        социальные сети).
                    </li>
                    <li>При помощи Telegram можно облегчить вход в платформу. Facebook сервис залогинивания использует
                        достаточно сложные механизмы, которые замедляют вход в платформу, возможность (после регистрации
                        через Facebook или LinkedIN) привязать Telegram позволяет:
                    </li>

                    <p>
                        <strong>Добавить альтернативный способ входа в платформу;</strong>
                    </p>
                    <ol>
                        <li>Позволяет использовать более быстрый способ входа в платформу;</li>
                        <li>Позволяет войти в платформу даже в случае, если на текущем устройстве входа не залогинен
                            Facebook или LinkedIN которые использовались для регистрации в платформе, но при этом есть
                            Телеграм;
                        </li>
                        <li>Позволяет получить дополнительную информацию в Telegram через бот Mentors Flow: Investments
                            (далее MFI). Если вы амбассадор MFI, вы будете получать технические данные полезные для
                            взаимодействия с MFI.
                        </li>
                    </ol>
                </ol>

                <p>Если вы амбассадор и желаете получать уведомления о пользователях, которые повторно зашли на сайт, кликнете пожалуйста сюда <a href="https://telegram.me/AllMentorfslowBot">@AllMentorfslowBot</a> и нажмите
                    "Start" чтобы запустить бота.</p>
                <div class="mb-5"></div>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
//get_sidebar();
get_footer();
