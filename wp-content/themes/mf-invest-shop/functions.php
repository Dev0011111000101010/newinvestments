<?php
/**
 * MF Invest Shop functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MF_Invest_Shop
 */
date_default_timezone_set('Europe/Kiev');

if ( ! function_exists( 'mf_invest_shop_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mf_invest_shop_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on MF Invest Shop, use a find and replace
		 * to change 'mf-invest-shop' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'mf-invest-shop', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'mf-invest-shop' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'mf_invest_shop_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'mf_invest_shop_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mf_invest_shop_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'mf_invest_shop_content_width', 640 );
}
add_action( 'after_setup_theme', 'mf_invest_shop_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mf_invest_shop_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mf-invest-shop' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'mf-invest-shop' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'mf_invest_shop_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mf_invest_shop_scripts() {
	$scriptdep = ['jquery'];
	wp_dequeue_script('jquery');
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.1.1.min.js');
	wp_enqueue_style( 'full-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css' );
	wp_enqueue_style( 'mf-invest-shop-style', get_stylesheet_uri(), '', time() );
	wp_enqueue_style( 'mf-invest-shop-misha', get_template_directory_uri().'/stylemisha.css', '', time() );

//	wp_enqueue_script( 'bootstrap-modalmanager', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modalmanager.js', array('jquery') );
	wp_enqueue_script( 'bootstrap-modal', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array('jquery') );

	wp_enqueue_script( 'mf-invest-shop-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'googleuploader', get_template_directory_uri() . '/js/uploadgooglefile.js', array('jquery'), null);

	if(is_archive('ambassador')) {
		wp_enqueue_script( 'shuffle', get_template_directory_uri() . '/js/shuffle.js', array('jquery'));
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if(isset($_GET['tab']) && $_GET['tab'] == 'postform') {
		$scriptdep[] = 'swiper-js';
		wp_enqueue_script( 'swiper-js', get_template_directory_uri() . '/js/swiper.bundle.min.js', array('jquery') );
		wp_enqueue_style( 'swiper-css', get_template_directory_uri() . '/assets/css/swiper.bundle.min.css' );
	}

	wp_enqueue_script( 'scripts-js', get_template_directory_uri() . '/js/scripts.js', $scriptdep, '20151215', true );
}
add_action( 'wp_enqueue_scripts', 'mf_invest_shop_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/* Function to get Youtube video id from link */
function extractUTubeVidId($url){
	/*
	* type1: http://www.youtube.com/watch?v=9Jr6OtgiOIw
	* type2: http://www.youtube.com/watch?v=9Jr6OtgiOIw&feature=related
	* type3: http://youtu.be/9Jr6OtgiOIw
	*/
	$vid_id = "";
	$flag = false;
	if(isset($url) && !empty($url)){
		/*case1 and 2*/
		$parts = explode("?", $url);
		if(isset($parts) && !empty($parts) && is_array($parts) && count($parts)>1){
			$params = explode("&", $parts[1]);
			if(isset($params) && !empty($params) && is_array($params)){
				foreach($params as $param){
					$kv = explode("=", $param);
					if(isset($kv) && !empty($kv) && is_array($kv) && count($kv)>1){
						if($kv[0]=='v'){
							$vid_id = $kv[1];
							$flag = true;
							break;
						}
					}
				}
			}
		}

		/*case 3*/
		if(!$flag){
			$needle = "youtu.be/";
			$pos = null;
			$pos = strpos($url, $needle);
			if ($pos !== false) {
				$start = $pos + strlen($needle);
				$vid_id = substr($url, $start, 11);
				$flag = true;
			}
		}
	}
	return $vid_id;
}
function displayYoutubeHelper ($url) {
	$url = $url;
	if(!$url) return false;
	$embed = '<iframe width="300" height="250" src="https://www.youtube.com/embed/'.extractUTubeVidId($url).'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';;
	return $embed;
}// хук для регистрации

//Илья 20201218_08_34 Создание отдельного ПостТипа для Лидгенщиков, Амбасадоров и Других дружественных лиц
add_action( 'init', 'register_post_types' );
function register_post_types(){
	register_post_type( 'ambassador', [
		'label'  => null,
		'labels' => [
			'name'               => 'Амбассадоры', // основное название для типа записи
			'singular_name'      => 'Амбассадор', // название для одной записи этого типа
			'add_new'            => 'Добавить Амбассадора', // для добавления новой записи
			'add_new_item'       => 'Добавление Амбассадора', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование Амбассадора', // для редактирования типа записи
			'new_item'           => 'Новый Амбассадор', // текст новой записи
			'view_item'          => 'Смотреть Амбассадора', // для просмотра записи этого типа.
			'search_items'       => 'Искать Амбассадора', // для поиска по этим типам записи
			'not_found'          => 'Амбассадор не найден', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Амбассадоры', // название меню
		],
		'description'         => '',
		'public'              => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'thumbnail' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => true,
		'rewrite'             => true,
		'query_var'           => true,
	] );
}//Илья 20201218_08_34 Создание отдельного ПостТипа для Лидгенщиков, Амбасадоров и Других дружественных лиц


add_action( 'init', 'create_taxonomy' );
function create_taxonomy(){

	//Илья 20201218_1032 Создание Таксономии для ПостТипа "Амбасадор" post_type_ambassador taxonomy_ambassador
	register_taxonomy( 'taxonomy_ambassador', [ 'ambassador' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Амбассадор',
			'singular_name'     => 'Амбассадор',
			'all_items'         => 'Амбассадоры',
			'view_item '        => 'Амбассадора',
			'edit_item'         => 'Редактировать Амбассадора',
			'add_new_item'      => 'Добавить Амбассадора',
			'menu_name'         => 'Амбассадор',
		],
		'description'           => '', // описание таксономии
		'public'                => true,
		'hierarchical'          => true,

		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => true, // добавить в REST API
	] );
	register_taxonomy( 'money_fact', [ 'post' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Факт денег',
			'singular_name'     => 'Факт денег',
			'all_items'         => 'Все Факты денег',
			'view_item '        => 'Просмотр',
			'edit_item'         => 'Редактировать Факт денег',
			'add_new_item'      => 'Добавить новый',
			'menu_name'         => 'Факт денег',
		],
		'description'           => '', // описание таксономии
		'public'                => true,
		'hierarchical'          => true,

		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => true, // добавить в REST API
	] );
	register_taxonomy( 'judicial_data', [ 'post' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Юридические данные о бизнесе',
			'singular_name'     => 'Юридические данные',
			'all_items'         => 'Все Юридические данные',
			'view_item '        => 'Просмотр',
			'edit_item'         => 'Редактировать Юридические данные',
			'add_new_item'      => 'Добавить новый',
			'menu_name'         => 'Юридические данные',
		],
		'description'           => '', // описание таксономии
		'public'                => true,
		'hierarchical'          => true,

		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => true, // добавить в REST API
	] );
	register_taxonomy( 'add_financial_questions', [ 'post' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Дополнительные вопросы финансирования (инвестирования, займа)',
			'singular_name'     => 'Вопросы финансирования',
			'all_items'         => 'Все Дополнительные вопросы финансирования (инвестирования, займа)',
			'view_item '        => 'Просмотр',
			'edit_item'         => 'Редактировать Дополнительные вопрос',
			'add_new_item'      => 'Добавить новый',
			'menu_name'         => 'Дополнительные Вопросы фин',
		],
		'description'           => '', // описание таксономии
		'public'                => true,
		'hierarchical'          => true,

		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => true, // добавить в REST API
	] );
	register_taxonomy( 'business_goal', [ 'post' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Бизнес-цели (инвестиции / займ / продажа)',
			'singular_name'     => 'Бизнес-цель (инвестиции / займ / продажа)',
			'all_items'         => 'Все Бизнес-цель (инвестиции / займ / продажа)',
			'view_item '        => 'Просмотр',
			'edit_item'         => 'Редактировать Бизнес-цель',
			'add_new_item'      => 'Добавить новый',
			'menu_name'         => 'Бизнес-цель',
		],
		'description'           => '', // описание таксономии
		'public'                => true,
		'hierarchical'          => true,

		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => true, // добавить в REST API
	] );
	register_taxonomy( 'all_business_spheres', [ 'post' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Обобщенные сферы бизнесов',
			'singular_name'     => 'Обобщенные сферы бизнесов',
			'all_items'         => 'Все Обобщенные сферы бизнесов',
			'view_item '        => 'Просмотр',
			'edit_item'         => 'Редактировать сферу',
			'add_new_item'      => 'Добавить новый',
			'menu_name'         => 'Обобщенные сферы бизнесов',
		],
		'description'           => '', // описание таксономии
		'public'                => true,
		'hierarchical'          => true,

		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => true, // добавить в REST API
	] );
	register_taxonomy( 'global_business_spheres', [ 'post' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Глобальные виды бизнеса',
			'singular_name'     => 'Глобальный вид бизнеса',
			'all_items'         => 'Все Глобальные виды бизнеса',
			'view_item '        => 'Просмотр',
			'edit_item'         => 'Редактировать вид бизнеса',
			'add_new_item'      => 'Добавить новый',
			'menu_name'         => 'Глобальные виды бизнеса',
		],
		'description'           => '', // описание таксономии
		'public'                => true,
		'hierarchical'          => true,

		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => true, // добавить в REST API
	] );
	register_taxonomy( 'countries', [ 'post' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Страны',
			'singular_name'     => 'Страны',
			'all_items'         => 'Все Страны',
			'view_item '        => 'Просмотр',
			'edit_item'         => 'Редактировать Страну',
			'add_new_item'      => 'Добавить страну',
			'menu_name'         => 'Страны',
		],
		'description'           => '', // описание таксономии
		'public'                => true,
		'hierarchical'          => true,

		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => true, // добавить в REST API
	] );
	register_taxonomy( 'uchrediteli_countries', [ 'post' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Страны гражданства учредителей',
			'singular_name'     => 'Страны',
			'all_items'         => 'Все Страны',
			'view_item '        => 'Просмотр',
			'edit_item'         => 'Редактировать Страну',
			'add_new_item'      => 'Добавить страну',
			'menu_name'         => 'Страны гражданства учредителей',
		],
		'description'           => '', // описание таксономии
		'public'                => true,
		'hierarchical'          => true,

		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => true, // добавить в REST API
	] );
	register_taxonomy( 'country_of_registration', [ 'post' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Страна регистрации бизнеса',
			'singular_name'     => 'Страны',
			'all_items'         => 'Все Страны',
			'view_item '        => 'Просмотр',
			'edit_item'         => 'Редактировать Страну',
			'add_new_item'      => 'Добавить страну',
			'menu_name'         => 'Страна регистрации бизнеса',
		],
		'description'           => '', // описание таксономии
		'public'                => true,
		'hierarchical'          => true,

		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => true, // добавить в REST API
	] );
	register_taxonomy( 'data_confirmed', [ 'post' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Данные ПОДТВЕРЖДЕНЫ',
			'singular_name'     => 'Данные ПОДТВЕРЖДЕНЫ',
			'all_items'         => 'Все Данные ПОДТВЕРЖДЕНЫ',
			'view_item '        => 'Просмотр',
			'edit_item'         => 'Редактировать Данные ПОДТВЕРЖДЕНЫ',
			'add_new_item'      => 'Добавить новый',
			'menu_name'         => 'Данные ПОДТВЕРЖДЕНЫ',
		],
		'description'           => '', // описание таксономии
		'public'                => true,
		'hierarchical'          => true,

		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => true, // добавить в REST API
	] );
	register_taxonomy( 'exact_branch_accordance', [ 'post' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Точное нишевое соответствие',
			'singular_name'     => 'Точное нишевое соответствие',
			'all_items'         => 'Точное нишевое соответствие',
			'view_item '        => 'Просмотр',
			'edit_item'         => 'Редактировать Точное нишевое соответствие',
			'add_new_item'      => 'Добавить новый',
			'menu_name'         => 'Точное нишевое соответствие',
		],
		'description'           => '', // описание таксономии
		'public'                => true,
		'hierarchical'          => true,

		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => true, // добавить в REST API
	] );

}
//add_action( 'add_meta_boxes_post', 'adding_custom_meta_boxes' ,3);
//function adding_custom_meta_boxes( $post ) {
//	add_meta_box( 'my-meta-box', 'Дополнительные файлы', 'render_my_meta_box', 'post', 'normal', 'default' );
//}
//
//function render_my_meta_box(){
//    $post_meta = get_post_meta(get_the_ID());
//	for($i=1; $i<count($post_meta); $i++) {
//		if($post_meta['addedfile'.$i]) {
//			$field = explode('::', $post_meta['addedfile'.$i][0]);
//			echo '<div><span>'.$field[0].'&nbsp;</span><a href="'.$field[1].'">'.$field[1].'</a></div><br>';
//		}else break;
//	}
//	if(isset($post_meta['thumbnailimg']) && $post_meta['thumbnailimg'][0] !== NULL && $post_meta['thumbnailimg'][0] !== false) {
//		echo '<iframe src="'.$post_meta['thumbnailimg'][0].'" width="500" height="500">';
//	}
//}
add_action('my_post_content', function () {
	echo rcl_get_author_block();
});
add_filter('rcl_tab','edit_profile_tab_data');
function edit_profile_tab_data($data){
	if($data['id']!='profile') return $data;
	$data['content'][0]['callback'] = array(
		'name' => 'my_custom_function',
		'args' => @array($arg_1,$arg_2),
	);
	$data['public'] = 1;
	return $data;
}

function my_custom_function($arg_1, $arg_2){
	global $user_ID, $user_LK;
	if($user_ID !== $user_LK){
		$usedata = get_userdata($user_LK);
		$returninfo = '<div class="user-cabinet">';
		if(is_user_logged_in()) $logged=true;
		if($usedata->number) {
			if(!$logged) {
				$number=substr($usedata->number, '0','8');
				$returninfo.='<div class="rcl-table__row-must-sort rcl-table__row" id="profile-field-number"><div class="rcl-table__cell rcl-table__cell-w-30"><label>Телефон:</label></div><div class="rcl-table__cell rcl-table__cell-w-70"><div id="rcl-field-number" class="rcl-field-input type-tel-input"><div class="rcl-field-core">
<a href="tel:'.$number.'">'.$number.' <span class="show-hidden btn btn-primary">Показать</span></a>
</div></div></div></div>';
			}
			else {
				$number = $usedata->number;
				$returninfo.='<div class="rcl-table__row-must-sort rcl-table__row" id="profile-field-number"><div class="rcl-table__cell rcl-table__cell-w-30"><label>Телефон:</label></div><div class="rcl-table__cell rcl-table__cell-w-70"><div id="rcl-field-number" class="rcl-field-input type-tel-input"><div class="rcl-field-core">
<a data-content="'.$number.'" href="tel:'.$number.'">'.substr($number, '0', '8').' <span class="show-hidden btn btn-primary">Показать</span></a>
</div></div></div></div>';
			}
		}
		if($usedata->social_facebook) {
			if(!$logged) {
				$facebook=substr($usedata->social_facebook, '0','11');
				$returninfo.='<div class="rcl-table__row-must-sort rcl-table__row" id="profile-field-social_facebook"><div class="rcl-table__cell rcl-table__cell-w-30"><label>Facebook:</label></div><div class="rcl-table__cell rcl-table__cell-w-70"><div id="rcl-field-social_facebook" class="rcl-field-input type-text-input"><div class="rcl-field-core"><a target="_blank" href="'.$facebook.'">'.$facebook.' <span class="show-hidden btn btn-primary">Показать</span></a></div></div></div></div>';
			}
			else {
				$facebook = $usedata->social_facebook;
				$returninfo.='<div class="rcl-table__row-must-sort rcl-table__row" id="profile-field-social_facebook"><div class="rcl-table__cell rcl-table__cell-w-30"><label>Facebook:</label></div><div class="rcl-table__cell rcl-table__cell-w-70"><div id="rcl-field-social_facebook" class="rcl-field-input type-text-input"><div class="rcl-field-core"><a target="_blank" data-content="'.$facebook.'" href="'.$facebook.'">'.substr($facebook, '0', '11').' <span class="show-hidden btn btn-primary">Показать</span></a></div></div></div></div>';
			}
		}
		if($usedata->social_linkedin) {
			if(!$logged) {
				$linkedin=substr($usedata->social_linkedin, '0',11);
				$returninfo.='<div class="rcl-table__row-must-sort rcl-table__row" id="profile-field-social_linkedin"><div class="rcl-table__cell rcl-table__cell-w-30"><label>LinkedIn:</label></div><div class="rcl-table__cell rcl-table__cell-w-70"><div id="rcl-field-social_linkedin" class="rcl-field-input type-text-input"><div class="rcl-field-core"><a target="_blank" href="'.$linkedin.'">'.$linkedin.' <span class="show-hidden btn btn-primary">Показать</span></a></div></div></div></div>';
			}
			else {
				$linkedin = $usedata->social_linkedin;
				$returninfo.='<div class="rcl-table__row-must-sort rcl-table__row" id="profile-field-social_linkedin"><div class="rcl-table__cell rcl-table__cell-w-30"><label>LinkedIn:</label></div><div class="rcl-table__cell rcl-table__cell-w-70"><div id="rcl-field-social_linkedin" class="rcl-field-input type-text-input"><div class="rcl-field-core"><a target="_blank" data-content="'.$linkedin.'" href="'.$linkedin.'">'.substr($linkedin, '0', '11').' <span class="show-hidden btn btn-primary">Показать</span></a></div></div></div></div>';
			}
		}
		if($usedata->social_instagram) {
			if(!$logged) {
				$instagram=substr($usedata->social_instagram, '0','11');
				$returninfo.='<div class="rcl-table__row-must-sort rcl-table__row" id="profile-field-social_instagram"><div class="rcl-table__cell rcl-table__cell-w-30"><label>Instagram:</label></div><div class="rcl-table__cell rcl-table__cell-w-70"><div id="rcl-field-social_instagram" class="rcl-field-input type-text-input"><div class="rcl-field-core"><a target="_blank" href="'.$instagram.'">'.$instagram.' <span class="show-hidden btn btn-primary">Показать</span></a></div></div></div></div>';
			}
			else {
				$instagram = $usedata->social_instagram;
				$returninfo.='<div class="rcl-table__row-must-sort rcl-table__row" id="profile-field-social_instagram"><div class="rcl-table__cell rcl-table__cell-w-30"><label>Instagram:</label></div><div class="rcl-table__cell rcl-table__cell-w-70"><div id="rcl-field-social_instagram" class="rcl-field-input type-text-input"><div class="rcl-field-core"><a target="_blank" data-content="'.$instagram.'" href="'.$instagram.'">'.substr($instagram, '0', '11').' <span class="show-hidden btn btn-primary">Показать</span></a></div></div></div></div>';
			}
		}
		if($usedata->social_telegram) {
			if(!$logged) {
				$telegram=substr($usedata->social_telegram, '0',11);
				$returninfo.='<div class="rcl-table__row-must-sort rcl-table__row" id="profile-field-social_telegram"><div class="rcl-table__cell rcl-table__cell-w-30"><label>Telegram:</label></div><div class="rcl-table__cell rcl-table__cell-w-70"><div id="rcl-field-social_telegram" class="rcl-field-input type-text-input"><div class="rcl-field-core"><a target="_blank" href="'.$telegram.'">'.$telegram.' <span class="show-hidden btn btn-primary">Показать</span></a></div></div></div></div>';
			}
			else {
				$telegram = $usedata->social_telegram;
				$returninfo.='<div class="rcl-table__row-must-sort rcl-table__row" id="profile-field-social_telegram"><div class="rcl-table__cell rcl-table__cell-w-30"><label>Telegram:</label></div><div class="rcl-table__cell rcl-table__cell-w-70"><div id="rcl-field-social_telegram" class="rcl-field-input type-text-input"><div class="rcl-field-core"><a target="_blank" data-content="'.$telegram.'" href="'.$telegram.'">'.substr($telegram, '0', '11').' <span class="show-hidden btn btn-primary">Показать</span></a></div></div></div></div>';
			}
		}
		$returninfo.='</div>';
		$posts = new WP_Query(array('author'=>$user_LK));
		if ( $posts->have_posts() ){
			$returninfo.='<div class="display-4">Проекты</div><div class="cabinet-post-list">';
			while ( $posts->have_posts() ){
				$posts->the_post();
				global $post;
				$title = get_the_title();
				!$title ? $title='Без названия' : false;
				$returninfo.='<a href="'.get_the_permalink().'" class="jumbotron post-jumbotron">';
				if($post->thumbnailimg) {
					$returninfo.='<iframe src="'.$post->thumbnailimg.'" frameborder="0"></iframe>';
				}
				$returninfo.='<div class="jumbotron-text"><h2 class="display-4">'.$title.'</h2>'.get_the_excerpt().'<div class="row no-gutters go-to-post justify-content-between">
					<span href="'.get_the_permalink().'" class="btn btn-primary">Подробнее о проекте</span><span class="author">'.get_the_author().'</span></div>
			</div></a>';
			}
			$returninfo.='</div>';
		} else {
			echo wpautop( 'Постов для вывода не найдено.' );
		}
		return $returninfo;

	}
	return rcl_tab_profile_content($arg_1, $arg_2);
}
add_filter( 'excerpt_length', function(){
	return 20;
} );
remove_action('dbx_post_advanced', 'custom_fields_editor_post_rcl', 1);
add_action('rcl_bar_menu', function ($tabdata){
	if(get_current_user_id()!==0) {
		$tabdata['account-link']['url'].='&tab=postform';
	}
	return $tabdata;
} );


/* Часть кода отправки в телеграм о новых юзерах, регистрациях и т.д */
require_once 'telegram/telegram_new_visitors.php';

/* Часть кода отправки в телеграм обо всех зашедших повторно */
require_once 'telegram/telegram_repeat_visitor.php';

function sendMessage($message, $chatid = 335765864) {
//function sendMessage($message, $chatid = 454255748) {
	$token = '1256392454:AAFhV5Nz8sOhGdbEGY3ZsQg8swMgKqaWhno';
	$url = "https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chatid}&text=";
	$url .= urlencode($message);
	$ch = curl_init();
	$options = array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true
	);
	curl_setopt_array($ch, $options);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}

function getDriveID($gdriveurl){
	$filter1 = preg_match('/drive\.google\.com\/open\?id\=(.*)/', $gdriveurl, $fileid1);
	$filter2 = preg_match('/drive\.google\.com\/file\/d\/(.*?)\//', $gdriveurl, $fileid2);
	$filter3 = preg_match('/drive\.google\.com\/uc\?id\=(.*?)\&/', $gdriveurl, $fileid3);
	if($filter1){
		$fileid = $fileid1[1];
	} else if($filter2){
		$fileid = $fileid2[1];
	} else if($filter3){
		$fileid = $fileid3[1];
	} else {
		$fileid = null;
	}

	return($fileid);
}

add_filter('rcl_public_form_attributes', 'rcl_public_id');

function rcl_public_id($attrs) {
	$attrs['id'] = 'publish_form';
	return $attrs;
}

function update_count_transient( $new_status, $old_status, $post ) {
	delete_transient('summa_investicij_kotorye_nuzhny_biznesu_38_total');
	delete_transient('now_collected_money_vlozheno_svoih_deneg_total');
	$query   = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => - 1 ) );
	$summa_investicij_kotorye_nuzhny_biznesu_38 = []; $now_collected_money_vlozheno_svoih_deneg = [];
	if ( $query->have_posts() ) {
		// перебираем все имеющиеся посты и выводим их
		while ( $query->have_posts() ) {
			$query->the_post();
			array_push($summa_investicij_kotorye_nuzhny_biznesu_38, get_post_meta(get_the_ID(), 'summa_investicij_kotorye_nuzhny_biznesu_38', true));
			array_push($now_collected_money_vlozheno_svoih_deneg, get_post_meta(get_the_ID(), 'now_collected_money', true), get_post_meta(get_the_ID(), 'vlozheno_svoih_deneg', true));
		}
	}
	$summa_investicij_kotorye_nuzhny_biznesu_38_total = array_reduce($summa_investicij_kotorye_nuzhny_biznesu_38, "sum");
	$now_collected_money_vlozheno_svoih_deneg_total = array_reduce($now_collected_money_vlozheno_svoih_deneg, "sum");
	set_transient('summa_investicij_kotorye_nuzhny_biznesu_38_total', $summa_investicij_kotorye_nuzhny_biznesu_38_total);
	set_transient('now_collected_money_vlozheno_svoih_deneg_total', $now_collected_money_vlozheno_svoih_deneg_total);
}
add_action('transition_post_status', 'update_count_transient', 10, 3 );

function sum($carry, $item)
{
	$carry += $item;
	return $carry;
}
add_action( 'rest_api_init', function () {
	register_rest_route( 'dcp3450', '/test_endpoint/', array(
		'methods' => 'POST',
		'callback' => 'deleter_post'
	) );
});
add_action( 'rest_api_init', function () {
	register_rest_route( 'dcp3450', '/test_endpoint2/', array(
		'methods' => 'POST',
		'callback' => 'user_deleter'
	) );
});

require_once(ABSPATH.'wp-admin/includes/user.php');

function user_deleter () {
	if($_POST['delete']) {
		$deleteid = (int) $_POST['delete'];
		wp_delete_user($deleteid);
		wp_send_json_success(array('user_delete' => $_POST['delete']));
	}
}

function deleter_post () {
	if($_REQUEST['delete']) {
		$deleteid = (int) $_REQUEST['delete'];
		wp_delete_post($deleteid);
		wp_send_json_success(array('post_delete' => $_REQUEST['delete']));
	}
}

add_filter('rcl_users', function ($users) {
	$returnusers = [];
	$namevalues = ['Сергей Норышкин', 'Ίλια Αριστοκράτης', 'Ильядев Левдев', 'Человек Имени', 'Misha Marchak', 'Admin_No_Ne_Super_Prostoi_(', 'Admin_Trevor_Search_Filter'];
	foreach ($users as $user) {
		if(in_array($user->display_name, $namevalues)) {

		}
		else {
			array_push( $returnusers, $user );
		}
	}
	return $returnusers;
});

add_action( 'user_register', 'allUsersSetAuthor');

function allUsersSetAuthor($user_id) {
	$user = new WP_User( $user_id );
	$user->add_role( 'author' );
	$user->remove_role( 'subscriber' );
}

//update_post_meta(1106, 'now_collected_money', 1);