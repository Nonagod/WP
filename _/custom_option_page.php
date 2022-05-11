<?php
add_theme_support('menus');

add_theme_support( 'post-thumbnails' );
function peepsakes_custom_excerpt_length( $length ) {
	return 40;
}
add_image_size ('post-preview', 639, 414, false);



function new_excerpt_length($length) {
	return 10; }
add_filter('excerpt_length', 'new_excerpt_length');

function new_excerpt_more($excerpt) {
	return str_replace('[...]', '', $excerpt); }
add_filter('wp_trim_excerpt', 'new_excerpt_more');

register_sidebar(array(
	'name'=>'Sidebar',
	'before_widget' => '',
	'after_widget' => '',
	'id' => 'left',
	'before_title' => '',
	'after_title' => '',
));

function peepsakes_register_my_menus() 
{
    register_nav_menus
    (
        array( 'right-menu' => 'Right-menu', 'footer-menu1' => 'Footer-menu1', 'footer-menu2' => 'Footer-menu2', 'footer-menu3' => 'Footer-menu3')
    );
}

if (function_exists('register_nav_menus'))
{
	add_action( 'init', 'peepsakes_register_my_menus' );
}

add_filter( 'the_content_more_link', 'peepsakes_my_more_link', 10, 2 );

function peepsakes_my_more_link( $more_link, $more_link_text ) {
	return str_replace( $more_link_text, "$more_link_text", $more_link_text );
}

add_action('admin_menu', 'peepsakes_add_global_custom_options');

function peepsakes_add_global_custom_options()
	{
		add_theme_page('ThemeOption', 'ThemeOption', '8', 'functions','peepsakes_global_custom_options');
	}

function peepsakes_global_custom_options()
{
?>
	<div class="wrap">
		<h2>Опции</h2>
		
		<?php if($_GET["settings-updated"]) echo '<div id="setting-error-settings_updated" class="updated settings-error"><p><strong>Настройки сохранены</strong></p></div>'; else 
			echo '';  ?>
		<form method="post" action="options.php">
			<?php wp_nonce_field('update-options') ?>			
			<p><strong>Контактная информация</strong></p>
			<p>Введите номер телефона</p>
			<p><input type="text" value="<?php echo get_option('phone'); ?>" name="phone" title="" size="40"></p>
			<p>Опрос (id опроса)</p>
			<p><input type="text" value="<?php echo get_option('pools'); ?>" name="pools" title="" size="40"></p>
			<p><strong>Блоки по тегам</strong></p>

			<p>Введите название </p>
			<p><input type="text" value="<?php echo get_option('name1'); ?>" name="name1" title="" size="40"></p>
			<p>Введите тег </p>
			<p><input type="text" value="<?php echo get_option('tag1'); ?>" name="tag1" title="" size="40"></p>	
			
			<p>Введите название </p>
			<p><input type="text" value="<?php echo get_option('name2'); ?>" name="name2" title="" size="40"></p>
			<p>Введите тег </p>
			<p><input type="text" value="<?php echo get_option('tag2'); ?>" name="tag2" title="" size="40"></p>	
			

			<p>Введите название </p>
			<p><input type="text" value="<?php echo get_option('name3'); ?>" name="name3" title="" size="40"></p>
			<p>Введите тег </p>
			<p><input type="text" value="<?php echo get_option('tag3'); ?>" name="tag3" title="" size="40"></p>	
			

			<p>Введите название </p>
			<p><input type="text" value="<?php echo get_option('name4'); ?>" name="name4" title="" size="40"></p>
			<p>Введите тег </p>
			<p><input type="text" value="<?php echo get_option('tag4'); ?>" name="tag4" title="" size="40"></p>	
			
			

		 
    		<p><input type="submit" name="Submit" value="Сохранить" /></p>
			<input type="hidden" name="action" value="update" />
			<input type="hidden" name="page_options" value="tag1, phone, tag2, tag3, tag4, name4, name3, name2, name1, pools" />
			
		</form>
	</div>
<?php
}


function mytheme_comment($comment, $args, $depth){  
   $GLOBALS['comment'] = $comment; ?>  
  <div class="item-comment">
  <a name="comment-<?php comment_ID() ?>"></a>
							<div class="left"><?php echo get_avatar( $comment, $size = '45'); ?></div>
							<div class="right">								
								<div class="author"><?php comment_author(); ?></div>
								<div class="time"><?php comment_date('d.m.Y') ?></div>
								<div class="comment-text">
								
							<?php if ($comment->comment_approved == '0') : ?>
								<?php _e('Your comment is awaiting moderation.'); ?>
								<?php endif; ?>
								  

								<?php comment_text(); ?>
								
								
								</div>
									<div class="respons"><a class="com" href="<?php comments_link(); ?>  ">Комментировать</a> 
									<?php 
									//$args = array( 'reply_text' => "цитировать", 'respond_id' => 'comments' 'depth' => 1);  
								comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>  
									  </div>
							</div>
					
							<div class="clear"></div>
						</div>
<?php  
}  


 
/* -------------------------------------------------
    Add style and JS
----------------------------------------------------*/
function peepsakes_wpthemes_media_upload_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('my-upload', get_template_directory_uri() . '/js/upload.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('my-upload');
}
 
function peepsakes_wpthemes_media_upload_styles() {
	wp_enqueue_style('thickbox');
}
 
add_action('admin_print_scripts', 'peepsakes_wpthemes_media_upload_scripts');
add_action('admin_print_styles', 'peepsakes_wpthemes_media_upload_styles');



add_action('init', 'custom_post_type');  
function custom_post_type(){  
    $labels = array(  
         'name' => 'Слайдер' // основное название для типа записи  
        ,'singular_name' => 'Слайд' // название для одной записи этого типа  
        ,'add_new' => 'Добавить слайд' // для добавления новой записи  
        ,'add_new_item' => 'Добавить слайд' // заголовка у вновь создаваемой записи в админ-панели.  
        ,'edit_item' => 'Редактировать слайд' // для редактирования типа записи  
        ,'new_item' => 'Новый слайд' // текст новой записи  
        ,'view_item' => 'Просмотреть' // для просмотра записи этого типа.  
        ,'search_items' => 'Найти' // для поиска по этим типам записи  
        ,'not_found' => 'Не найдено ничего' // если в результате поиска ничего не было найдень  
        ,'not_found_in_trash' => 'В корзине нет слайдов' // если не было найдено в корзине  
        ,'parent_item_colon' => '' // для родительских типов. для древовидных типов  
        ,'menu_name' => 'Слайдер' // название меню  
    );  
    $args = array(  
        'labels' => $labels,  
    'public' => true,  
    'publicly_queryable' => true,  
    'show_ui' => true,  
    'show_in_menu' => true,  
    'query_var' => true,  
    'rewrite' => true,  
    'capability_type' => 'post',  
    'has_archive' => true,  
    'hierarchical' => false,  
    'menu_position' => null
        ,'supports' => array('title','editor', 'thumbnail', 'custom-fields')  
     
    );  
    register_post_type( 'slider', $args );  
}  


/* Подсчет количества посещений страниц 
---------------------------------------------------------- */  
add_action('wp_head', 'kama_postviews');  
function kama_postviews() {  
  
/* ------------ Настройки -------------- */  
$meta_key       = 'views';  // Ключ мета поля, куда будет записываться количество просмотров.  
$who_count      = 1;            // Чьи посещения считать? 0 - Всех. 1 - Только гостей. 2 - Только зарегистрированых пользователей.  
$exclude_bots   = 1;            // Исключить ботов, роботов, пауков и прочую нечесть :)? 0 - нет, пусть тоже считаются. 1 - да, исключить из подсчета.  
/* СТОП настройкам */  
  
global $user_ID, $post;  
    if(is_singular()) {  
        $id = (int)$post->ID;  
        static $post_views = false;  
        if($post_views) return true; // чтобы 1 раз за поток  
        $post_views = (int)get_post_meta($id,$meta_key, true);  
        $should_count = false;  
        switch( (int)$who_count ) {  
            case 0: $should_count = true;  
                break;  
            case 1:  
                if( (int)$user_ID == 0 )  
                    $should_count = true;  
                break;  
            case 2:  
                if( (int)$user_ID > 0 )  
                    $should_count = true;  
                break;  
        }  
        if( (int)$exclude_bots==1 && $should_count ){  
            $useragent = $_SERVER['HTTP_USER_AGENT'];  
            $notbot = "Mozilla|Opera"; //Chrome|Safari|Firefox|Netscape - все равны Mozilla  
            $bot = "Bot/|robot|Slurp/|yahoo"; //Яндекс иногда как Mozilla представляется  
            if ( !preg_match("/$notbot/i", $useragent) || preg_match("!$bot!i", $useragent) )  
                $should_count = false;  
        }  
  
        if($should_count)  
            if( !update_post_meta($id, $meta_key, ($post_views+1)) ) add_post_meta($id, $meta_key, 1, true);  
    }  
    return true;  
}  


/** Функция для вывода записей по произвольному полю содержащему числовое значение. 
------------------------------------- 
Параметры передаваемые функции (в скобках дефолтное значение): 
num (10) - количество постов. 
key (views) - ключ произвольного поля, по значениям которого будет проходить выборка. 
order (DESC) - порядок вывода записей. Чтобы вывести сначала менее просматириваемые устанавливаем order=1 
format(0) - Формат выводимых ссылок. По дефолту такой: ({a}{title}{/a}). Можно использовать, например, такой: {date:j.M.Y} - {a}{title}{/a} ({views}, {comments}). 
days(0) - число последних дней, записи которых нужно вывести по количеству просмотров. Если указать год (2011,2010), то будут отбираться популярные записи за этот год. 
cache (0) - использовать кэш или нет. Варианты 1 - кэширование включено, 0 - выключено (по дефолту). 
echo (1) - выводить на экран или нет. Варианты 1 - выводить (по дефолту), 0 - вернуть для обработки (return). 
Пример вызова: kama_get_most_viewed("num=5 &key=views &cache=1 &format={a}{title}{/a} - {date:j.M.Y} ({views}) ({comments})"); 
*/  
function kama_get_most_viewed($args=''){  
    parse_str($args, $i);  
    $num    = isset($i['num']) ? $i['num']:10;  
    $key    = isset($i['key']) ? $i['key']:'views';  
    $order  = isset($i['order']) ? 'ASC':'DESC';  
    $cache  = isset($i['cache']) ? 1:0;  
    $days   = isset($i['days']) ? (int)$i['days']:0;  
    $echo   = isset($i['echo']) ? 0:1;  
    $format = isset($i['format']) ? stripslashes($i['format']):0;  
    global $wpdb,$post;  
    $cur_postID = $post->ID;  
  
    if( $cache ){ $cache_key = (string) md5( __FUNCTION__ . serialize($args) );  
        if ( $cache_out = wp_cache_get($cache_key) ){ //получаем и отдаем кеш если он есть  
            if ($echo) return print($cache_out); else return $cache_out;  
        }  
    }  
  
    if( $days ){  
        $AND_days = "AND post_date > CURDATE() - INTERVAL $days DAY";  
        if( strlen($days)==4 )  
            $AND_days = "AND YEAR(post_date)=" . $days;  
    }  
  
    $sql = "SELECT p.ID, p.post_title, p.post_date, p.guid, p.comment_count, (pm.meta_value+0) AS views  
    FROM $wpdb->posts p  
        LEFT JOIN $wpdb->postmeta pm ON (pm.post_id = p.ID)  
    WHERE pm.meta_key = '$key' $AND_days  
        AND p.post_type = 'post'  
        AND p.post_status = 'publish'  
    ORDER BY views $order LIMIT $num";  
    $results = $wpdb->get_results($sql);  
    if( !$results ) return false;  
  
    $out= '';  
    preg_match( '!{date:(.*?)}!', $format, $date_m );  
    foreach( $results as $pst ){  
        $x == 'li1' ? $x = 'li2' : $x = 'li1';  
        if ( (int)$pst->ID == (int)$cur_postID ) $x .= " current-item";  
        $Title = $pst->post_title;  
        $a1 = "<a href='". get_permalink($pst->ID) ."' title='{$pst->views} просмотров: $Title'>";  
        $a2 = "</a>";  
        $comments = $pst->comment_count;  
        $views = $pst->views;  
        if( $format ){  
            $date = apply_filters('the_time', mysql2date($date_m[1],$pst->post_date));  
            $Sformat = str_replace ($date_m[0], $date, $format);  
            $Sformat = str_replace(array('{a}','{title}','{/a}','{comments}','{views}'), array($a1,$Title,$a2,$comments,$views), $Sformat);  
        }  
        else $Sformat = $a1.$Title.$a2;  
        $out .= "<div class=\"item\">$Sformat</div>";  
    }  
  
    if( $cache ) wp_cache_add($cache_key, $out);  
  
    if( $echo )  
        return print $out;  
    else  
        return $out;  
}  


function wp_corenavi() {  
global $wp_query, $wp_rewrite;  
$pages = '';  
$max = $wp_query->max_num_pages;  
if (!$current = get_query_var('paged')) $current = 1;  
$a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));  
$a['total'] = $max;  
$a['current'] = $current;  
  
$total = 0; //1 - выводить текст "Страница N из N", 0 - не выводить  
$a['mid_size'] = 3; //сколько ссылок показывать слева и справа от текущей  
$a['end_size'] = 1; //сколько ссылок показывать в начале и в конце  
$a['prev_text'] = '&laquo;'; //текст ссылки "Предыдущая страница"  
$a['next_text'] = '&raquo;'; //текст ссылки "Следующая страница"  
  
if ($max > 1) echo '<div class="pagination">';  
if ($total == 1 && $max > 1) $pages = '<span class="pages">Страница ' . $current . ' из ' . $max . '</span>'."\r\n";  
echo $pages . paginate_links($a);  
if ($max > 1) echo '</div>';  
}  


remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'custom_gallery_wstd');
function custom_gallery_wstd($attr) {
    $data = '';
    if( $attr['ids'] ) {
        $data .= '<div class="doctor_certs_slider owl-carousel">';
        foreach( explode(',', $attr['ids']) as $id ) {
            $img = wp_get_attachment_metadata( $id );
//            echo '<pre>';
//            print_r($img);
//            echo '</pre>';
            $data .= '<div class="slide"><a href="/wp-content/uploads/' . $img['file'] . '" class="fancy_img" data-fancybox="license" rel="ligthbox"><img src="https://andreevka.nikormed.ru/wp-content/themes/raten/timthumb.php?src=https://andreevka.nikormed.ru/wp-content/uploads/' . $img['file'] . '&w=166&h=236&zc=1&q=90"/></a></div>';
        }
        $data .= '</div>';
    }
    return $data;
}

function custom_gallery($attr) {
	$post = get_post();

	static $instance = 0;
	$instance++;

	# hard-coding these values so that they can't be broken
	
	$attr['columns'] = 1;
	$attr['size'] = 'full';
	$attr['link'] = 'none';

	$attr['orderby'] = 'post__in';
	$attr['include'] = $attr['ids'];		

	#Allow plugins/themes to override the default gallery template.
	$output = apply_filters('post_gallery', '', $attr);
	
	if ( $output != '' )
		return $output;

	# We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'div',
		'icontag'    => 'div',
		'captiontag' => 'p',
		'columns'    => 1,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => ''
	), $attr));

	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';

	if ( !empty($include) ) {
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}

	if ( empty($attachments) )
		return '';

	$gallery_style = $gallery_div = '';

	if ( apply_filters( 'use_default_gallery_style', true ) )
		$gallery_style = "";
	
	$gallery_div = '
	<div id="gallery">
					<ul class="bxslider">
						
					
				';
	
	$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );


	
	foreach ( $attachments as $id => $attachment ) {
		$link = wp_get_attachment_image_src($id, 'full');
		$link = $link[0];
		$link2 = get_bloginfo('template_directory'); 


		global $post;
		$args = array(
			 'post_type' => 'attachment',
			'post_status' => null,
			'post_parent' => $post->ID,
			 'include'  => $id
			  ); 

	$thumbnail_image = get_posts($args);

		$caption =  $thumbnail_image[0]->post_excerpt; 
		
		$output .= "";
		$output .= "
				<li><img src=\"$link2/timthumb.php?src=$link&w=780&zc=1&q=90\" alt=\"\"></li>		
				
			";
		if ( $captiontag && trim($attachment->post_excerpt) ) {
			
		}
		$output .= "";
	}
	$output .= "</ul><div id=\"bx-pager\">";
	$k=0;
	foreach ( $attachments as $id => $attachment ) {
		$link = wp_get_attachment_image_src($id, 'full');
		$link = $link[0];
		$link2 = get_bloginfo('template_directory'); 
		

		global $post;
		$args = array(
			 'post_type' => 'attachment',
			'post_status' => null,
			'post_parent' => $post->ID,
			 'include'  => $id
			  ); 

	$thumbnail_image = get_posts($args);

		$caption =  $thumbnail_image[0]->post_excerpt; 
		
		$output .= "";
		$output .= "
				<a data-slide-index=\"$k\" href=\"\"><img src=\"$link2/timthumb.php?src=$link&w=119&zc=1&q=90\" alt=\"\"></a>
			
				
			";
		if ( $captiontag && trim($attachment->post_excerpt) ) {
			
		}
		$output .= "";
		$k++;
	}
	

	$output .= '</div></div>';

	return $output;
}

register_sidebar(array(
    'name'=>'Обратный звонок',
    'before_widget' => '',
    'after_widget' => '',
    'id' => 'telephones',
    'before_title' => '',
    'after_title' => '',
));

function dimox_breadcrumbs() {

	/* === ОПЦИИ === */
	$text['home'] = 'Медицинский центр «Никор-Мед»'; // текст ссылки "Главная"
	$text['category'] = '%s'; // текст для страницы рубрики
	$text['search'] = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
	$text['tag'] = 'Записи с тегом "%s"'; // текст для страницы тега
	$text['author'] = 'Статьи автора %s'; // текст для страницы автора
	$text['404'] = 'Ошибка 404'; // текст для страницы 404

	$show_current = 1; // 1 - показывать название текущей статьи/страницы/рубрики, 0 - не показывать
	$show_on_home = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
	$show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
	$show_title = 1; // 1 - показывать подсказку (title) для ссылок, 0 - не показывать
	$delimiter = ' / '; // разделить между "крошками"
	$before = '<span class="current">'; // тег перед текущей "крошкой"
	$after = '</span>'; // тег после текущей "крошки"
	/* === КОНЕЦ ОПЦИЙ === */

	global $post;
	$home_link = home_url('/');
	$link_before = '<span typeof="v:Breadcrumb">';
	$link_after = '</span>';
	$link_attr = ' rel="v:url" property="v:title"';
	$link = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
	$parent_id = $parent_id_2 = $post->post_parent;
	$frontpage_id = get_option('page_on_front');

	if (is_home() || is_front_page()) {

		if ($show_on_home == 1) echo '<div class="breadcrumbs"><a href="' . $home_link . '">' . $text['home'] . '</a></div>';

	} else {

		echo '<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">';
		if ($show_home_link == 1) {
			echo '<a href="' . $home_link . '" rel="v:url" property="v:title">' . $text['home'] . '</a>';
			if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo $delimiter;
		}

		if ( is_category() ) {
			$this_cat = get_category(get_query_var('cat'), false);
			if ($this_cat->parent != 0) {
				$cats = get_category_parents($this_cat->parent, TRUE, $delimiter);
				if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
				echo $cats;
			}
			if ($show_current == 1) echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;

		} elseif ( is_search() ) {
			echo $before . sprintf($text['search'], get_search_query()) . $after;

		} elseif ( is_day() ) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
			echo $before . get_the_time('d') . $after;

		} elseif ( is_month() ) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo $before . get_the_time('F') . $after;

		} elseif ( is_year() ) {
			echo $before . get_the_time('Y') . $after;

		} elseif ( is_single() && !is_attachment() ) {
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				printf($link, $home_link . $slug['slug'] . '/', $post_type->labels->singular_name);
				if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;
			} else {
				$cat = get_the_category(); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, $delimiter);
				if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
				echo $cats;
				if ($show_current == 1) echo $before . get_the_title() . $after;
			}

		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;

		} elseif ( is_attachment() ) {
			$parent = get_post($parent_id);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			if ($cat) {
				$cats = get_category_parents($cat, TRUE, $delimiter);
				$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
				echo $cats;
			}
			printf($link, get_permalink($parent), $parent->post_title);
			if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;

		} elseif ( is_page() && !$parent_id ) {
			if ($show_current == 1) echo $before . get_the_title() . $after;

		} elseif ( is_page() && $parent_id ) {
			if ($parent_id != $frontpage_id) {
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					if ($parent_id != $frontpage_id) {
						$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
					}
					$parent_id = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo $breadcrumbs[$i];
					if ($i != count($breadcrumbs)-1) echo $delimiter;
				}
			}
			if ($show_current == 1) {
				if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo $delimiter;
				echo $before . get_the_title() . $after;
			}

		} elseif ( is_tag() ) {
			echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;

		} elseif ( is_author() ) {
	 		global $author;
			$userdata = get_userdata($author);
			echo $before . sprintf($text['author'], $userdata->display_name) . $after;

		} elseif ( is_404() ) {
			echo $before . $text['404'] . $after;

		} elseif ( has_post_format() && !is_singular() ) {
			echo get_post_format_string( get_post_format() );
		}

		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
			echo 'Страница ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}

		echo '</div><!-- .breadcrumbs -->';

	}
} // end dimox_breadcrumbs()


function pluralForm($n, $form1, $form2, $form5) {
    $n = abs($n) % 100;
    $n1 = $n % 10;
    if ($n > 10 && $n < 20) return $form5;
    if ($n1 > 1 && $n1 < 5) return $form2;
    if ($n1 == 1) return $form1;
    return $form5;
}

define( 'SINGLE_PATH', TEMPLATEPATH . '/single' );
add_filter( 'single_template', 'my_single_template' );
function my_single_template( $single ) {
    global $wp_query, $post;

    /**
     * post id
     */
    if ( file_exists( SINGLE_PATH . '/single-' . $post->ID . '.php' ) ) {
        return SINGLE_PATH . '/single-' . $post->ID . '.php';
    }

    /**
     * category
     */
    foreach ( (array) get_the_category() as $cat ) :

        if ( file_exists( SINGLE_PATH . '/single-cat-' . $cat->slug . '.php' ) ) {
            return SINGLE_PATH . '/single-cat-' . $cat->slug . '.php';
        } elseif ( file_exists( SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php' ) ) {
            return SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php';
        }

    endforeach;

    /**
     * tags
     */
    $wp_query->in_the_loop = true;
    foreach ( (array) get_the_tags() as $tag ) :

        if ( file_exists( SINGLE_PATH . '/single-tag-' . $tag->slug . '.php' ) ) {
            return SINGLE_PATH . '/single-tag-' . $tag->slug . '.php';
        } elseif ( file_exists( SINGLE_PATH . '/single-tag-' . $tag->term_id . '.php' ) ) {
            return SINGLE_PATH . '/single-tag-' . $tag->term_id . '.php';
        }

    endforeach;
    $wp_query->in_the_loop = false;

    /**
     * default
     */
    if ( file_exists( SINGLE_PATH . '/single.php' ) ) {
        return SINGLE_PATH . '/single.php';
    }

    return $single;
}

if( file_exists(__DIR__ . '/Webster/index.php') ) include_once __DIR__ . '/Webster/index.php';
?>