# SideBar
## Регистрация сайдбара
```php
function true_register_wp_sidebars() {
 
	/* В боковой колонке - первый сайдбар */
	register_sidebar( // register_sidebars
		array(
			'id' => 'true_side', // уникальный id
			'name' => 'Боковая колонка', // название сайдбара
			'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
			'before_widget' => '<div id="%1$s" class="side widget %2$s">', // по умолчанию виджеты выводятся <li>-списком
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">', // по умолчанию заголовки виджетов в <h2>
			'after_title' => '</h3>'
		)
	);
}
add_action( 'widgets_init', 'true_register_wp_sidebars' ); // hook widgets_init - required
```
- **is_active_sidebar( 'side_bar_name' )** — проверяет, есть ли в сайдбаре виджеты,
- **dynamic_sidebar( 'side_bar_name' )** — выводит сайдбар,
- **get_sidebar( 'name Or null' )** — подключает файл с шаблоном сайдбара;

#Widgets
В wp должен быть подключен хотябы один sidebar!
## Turn off default widgets
```php
function true_remove_default_widget() {
	unregister_widget('WP_Widget_Archives'); // Архивы
	unregister_widget('WP_Widget_Calendar'); // Календарь
	unregister_widget('WP_Widget_Categories'); // Рубрики
	unregister_widget('WP_Widget_Meta'); // Мета
	unregister_widget('WP_Widget_Pages'); // Страницы
	unregister_widget('WP_Widget_Recent_Comments'); // Свежие комментарии
	unregister_widget('WP_Widget_Recent_Posts'); // Свежие записи
	unregister_widget('WP_Widget_RSS'); // RSS
	unregister_widget('WP_Widget_Search'); // Поиск
	unregister_widget('WP_Widget_Tag_Cloud'); // Облако меток
	unregister_widget('WP_Widget_Text'); // Текст
	unregister_widget('WP_Nav_Menu_Widget'); // Произвольное меню
}
add_action( 'widgets_init', 'true_remove_default_widget', 20 );
```
> при удалении виджета также удалятся и все его настройки

## Create widget
```php
<?class trueTopPostsWidget extends WP_Widget {
 
	/*
	 * создание виджета
	 */
	function __construct() {
		parent::__construct(
			'true_top_widget', 
			'Популярные посты', // заголовок виджета
			array( 'description' => 'Позволяет вывести посты, отсортированные по количеству комментариев в них.' ) // описание
		);
	}
 
	/*
	 * фронтэнд виджета
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] ); // к заголовку применяем фильтр (необязательно)
		$posts_per_page = $instance['posts_per_page'];
 
		echo $args['before_widget'];
 
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
 
		$q = new WP_Query("posts_per_page=$posts_per_page&orderby=comment_count");
		if( $q->have_posts() ):
			?><ul><?php
			while( $q->have_posts() ): $q->the_post();
				?><li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li><?php
			endwhile;
			?></ul><?php
		endif;
		wp_reset_postdata();
 
		echo $args['after_widget'];
	}
 
	/*
	 * бэкэнд виджета
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		if ( isset( $instance[ 'posts_per_page' ] ) ) {
			$posts_per_page = $instance[ 'posts_per_page' ];
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Заголовок</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'posts_per_page' ); ?>">Количество постов:</label> 
			<input id="<?php echo $this->get_field_id( 'posts_per_page' ); ?>" name="<?php echo $this->get_field_name( 'posts_per_page' ); ?>" type="text" value="<?php echo ($posts_per_page) ? esc_attr( $posts_per_page ) : '5'; ?>" size="3" />
		</p>
		<?php 
	}
 
	/*
	 * сохранение настроек виджета
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['posts_per_page'] = ( is_numeric( $new_instance['posts_per_page'] ) ) ? $new_instance['posts_per_page'] : '5'; // по умолчанию выводятся 5 постов
		return $instance;
	}
}
 
/*
 * регистрация виджета
 */
function true_top_posts_widget_load() {
	register_widget( 'trueTopPostsWidget' );
}
add_action( 'widgets_init', 'true_top_posts_widget_load' );?>
```
# Menu
> WARRNING: Theme must be supporting menu functionality.
## Menu area (location) adding
```php
function register_menu_area_fma(){ register_nav_menu('area_code', __('Area name')); }
add_action('init', 'register_menu_area_fma');
```
## Get items by location
```php
/**
 * (rework) Fetching menu items by the menu location code.
 * @param $location - area code
 * @param array $args - arguments for wp_get_nav_menu_items function (https://wp-kama.ru/function/wp_get_nav_menu_items)
 * @return array
 */
function getMenuItemsByLocation( $location, $args = [] ) {
    $locations = get_nav_menu_locations();
    $object = wp_get_nav_menu_object($locations[$location]);
    $menu_items = wp_get_nav_menu_items($object->name, $args);

    return $menu_items;
}
```
# Content formatting
```php
    $formatted_text = wpautop( $wstd_gd_cl->page_data['post_content'], $br = true );
```
## Deleting a default CMS filters on content 
```php
    remove_filter( 'the_content', 'wpautop' );
```

# Rewrite rules & Custom rules of page template load
Example of this in `examples/routing_&_template.php`.
## Unique single page templates 
Example of this in `single-templates-logic.php`.
## Custom template path
```get_template_part( 'inc/nav', 'single' );``` - любые файлы (```<шаблон_темы>/inc/nav-single.php```)

