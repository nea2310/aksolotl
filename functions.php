<?php 
include_once(__DIR__ . '\inc\test-recent-posts.php');
include_once(__DIR__ . '\tools\import-svg.php');
add_action( 'wp_enqueue_scripts', 'test_media'); // wp_enqueue_scripts - хук, который регистрирует скрипты

add_action( 'after_setup_theme', 'test_after_setup' );

add_action( 'widgets_init', 'test_widgets' );
/*pre_get_document_title - работает до того, как WP стал рассчитывать title и если она
 вернет что-то отличное от пустоты, то title WP рассчитывать не станет.
 Поэтому хуки document_title_parts, document_title_separator в WP даже не случатся, если 
 pre_get_document_title уже отработала. И поэтому когда мы находимся на странице одной записи (is_single),
 мы берем из дополнительных полей title для этой записи (CFS()->get('doc_title')), и только в противном случае 
 (если это не is_single) либо если этого поля нет - отработают фильтры add_filter('document_title_parts', function...
 и add_filter('document_title_separator', function ...
 
 */

add_filter('pre_get_document_title', function($t){ // задаем постам произвольные title, для этого мы предвариетльно добавили новое произвольное поле (настройки -> custom fields suit)
	if(is_single()){
		$t = CFS()->get('doc_title');
	}
	return $t;
});
add_filter('widget_text', 'do_shortcode'); // включает шорткоды в виджетах

add_filter('document_title_parts', function($parts){
$parts['tagline'] .= '!';
return($parts);
});


add_filter('document_title_separator', function($sep){
 return '|';
	});

add_filter('the_content', function($content){
	return str_replace('-[]-', '!!!', $content);
	});


	
add_shortcode('test_recent', 'test_recent');


function test_media (){
	wp_enqueue_style( 'test-main', get_stylesheet_uri()); // wp_enqueue_style - ф-ция подключения стилей
	wp_enqueue_script( 'test-script-main', get_template_directory_uri().'/assets/js/script.js');//wp_enqueue_script - ф-ция подключения скриптов

}


function test_after_setup (){
	register_nav_menu('top', 'Для шапки'); // register_nav_menu - ф-ция подключения меню
	register_nav_menu('footer', 'Для подвала');
	add_theme_support('post-thumbnails'); // add_theme_support - Регистрирует поддержку новых возможностей темы в WordPress (поддержка миниатюр, форматов записей и т.д.).
	add_theme_support('title-tag');
	add_theme_support('post-formats', array('aside', 'quote'));
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

	register_sidebar([
		'name' => 'Sidebar Right column',
		'id' => 'sidebar-right-column',
		'description' => 'Правая колонка блога',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_sidebar' => '<div class="right-column %2$s">', // WP 5.6
		'after_sidebar'  => "</div>\n", // WP 5.6
	]);
	register_sidebar([
		'name' => 'Sidebar Contacts',
		'id' => 'sidebar-contacts',
		'description' => 'Контакты',
		'before_widget' => '<div class="contact %2$s">',
		'after_widget'  => "</div>\n",
		'before_sidebar' => '<div class="footer-contacts %2$s">', // WP 5.6
		'after_sidebar'  => "</div>\n", // WP 5.6
	]);

	register_sidebar([
		'name' => 'Sidebar Social',
		'id' => 'sidebar-social',
		'description' => 'Соцсети',
		'before_widget' => '<div class="social %2$s">',
		'after_widget'  => "</div>\n",
		'before_sidebar' => '<div class="footer-social %2$s">', // WP 5.6
		'after_sidebar'  => "</div>\n", // WP 5.6
	]);

	register_widget('Test_Recent_Posts');
}


function test_recent($atts){


global $post;
$atts = shortcode_atts(array(
	'cnt' => 5
), $atts);

	$str = '';
	

	// параметры по умолчанию
$args = array(
	'numberposts' => $atts['cnt'],
	'orderby'     => 'date',
	'order'       => 'DESC',
	'post_type'   => 'post',
) ;

$postslist =  get_posts($args);

foreach($postslist as $post){
	setup_postdata($post);

	$link = get_the_permalink();
	$title = get_the_title();
	$dt = get_the_date();
	$intro = CFS()->get('intro');

	$str .= "
	<div>
	<div><em>$dt</em></div>
	<div><strong>$title</strong></div>
	<div>$intro</div>
	<a href=\"$link\" >Далее...</a>
	</div>
	";
}

 wp_reset_postdata(); // сброс

 return $str;

};



add_filter('wp_nav_menu', 'process_menu');
function process_menu($block_menu) {
// Выбираем все <li>...</li>
	preg_match_all('|<li(.*?)</li>|is', $block_menu,  $array);
// Проходим в цикле по всем выбранным тегам '<li>' 
	foreach ($array[0] as  $key=>$val){
		 // если встретили класс "menu-item-home" то делаем 3 действия:сохраняем индекс этого элемента, удаляем текст (название страницы) из тега <a> и добавляем в тег <a> тег <img>
		if (strpos($val, 'menu-item-home')){
		  $result[] = $key; //сохраняем индекс этого элемента
		  $regexp = "/[A-Za-zА-Яа-яЁё]*<\/a/";
		  $a = preg_replace($regexp, '</a', $val); // удаляем текст (название страницы) из тега <a>
		  $imgPath = get_template_directory_uri() . '/assets/img/logo.png';
		  $imgLink = str_replace('</a>', '<img src="' . $imgPath . '" alt="перейти на главную"></a>',  $a); // добавляем в тег <a> тег <img>
		  $block_menu = str_replace($val, $imgLink, $block_menu);
		}
	 }
	 for ($i=0; $i<count($array[0]); $i++){
		 if($i!==$result[0] && $i!==$result[0]-1 && $i!==count($array[0])-1){
			$b = str_replace('</li>', '</li><div style = "width: 3px; height: 3px; background-color: lightgrey; border-radius: 50%"></div>',  $array[0][$i]);
			$block_menu = str_replace($array[0][$i], $b, $block_menu);
		 }
	 }
	echo $result[0];
	return $block_menu;
}