//20201025_0727 Липкая кнопка фильтров JS c сайта https://html5css.ru/howto/howto_js_scroll_to_top.php
    //Файл НЕ подключен, отрабатывается скрипт из
    // \wp-content\themes\mf-invest-shop\front-page.php
    // \wp-content\themes\mf-invest-shop\front-page-debug.php

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
