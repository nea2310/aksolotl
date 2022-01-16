<?php 
add_action( 'wp_enqueue_scripts', 'test_media'); // wp_enqueue_scripts - хук, который регистрирует скрипты

add_action( 'after_setup_theme', 'test_after_setup' );

add_action( 'widgets_init', 'test_widgets' );


function test_media (){
	wp_enqueue_style( 'test-main', get_stylesheet_uri()); // wp_enqueue_style - ф-ция подключения стилей
	wp_enqueue_script( 'test-script-main', get_template_directory_uri().'/assets/js/script.js');//wp_enqueue_script - ф-ция подключения скриптов

}

function test_after_setup (){
	register_nav_menu('top', 'Для шапки'); // register_nav_menu - ф-ция подключения меню
	register_nav_menu('footer', 'Для подвала');
	add_theme_support('post-thumbnails'); // add_theme_support - Регистрирует поддержку новых возможностей темы в WordPress (поддержка миниатюр, форматов записей и т.д.).
	add_theme_support('title-tag');
}

function test_widgets (){
	register_sidebar([  // register_sidebar - Регистрирует панель виджетов (место, куда размещаются виджеты в админ-панели, чтобы потом вывести их в лицевой части).
		'name' => 'Sidebar Right',
		'id' => 'sidebar-right',
		'description' => 'Правая колонка',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => "</div>\n",
	]);

	register_sidebar([
		'name' => 'Sidebar Top',
		'id' => 'sidebar-top',
		'description' => 'Странный пример',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => "</div>\n"
	]);
}