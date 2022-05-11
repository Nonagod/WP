<?
add_action('init', 'rewriteCities');
/**
 * Describes additional rules of CMS routing.
 */
function rewriteCities() {
    // adding new rewrite tag which can be used from admin panel
    add_rewrite_tag( '%city%', '([^&]+)' );

    // adding new rewrite rules (after adding function must be drop CMS rules cache)
    add_rewrite_rule(
        '^(cities)/([^/]*)/([^/\?]*)/?',
        'index.php?post_type=cities&name=$matches[3]&city=$matches[2]&hotel=$matches[3]',
        'top'
    );
    add_rewrite_rule(
        '^(cities)/([^/]*)/?',
        'index.php?taxonomy=cities_tax&term=$matches[2]&city=$matches[2]',
        'top'
    );
    add_rewrite_rule(
        '^(cities)/?',
        'index.php?pagename=cities&city=goroda',
        'top'
    );

    //adding new variable for fetching to $query_vars array
    add_filter( 'query_vars', function( $vars ){
        $vars[] = 'hotel';
        return $vars;
    } );
}

add_filter('template_include', 'templateCities');
/**
 * Function to choose which template must be load
 * @param $template - template in
 * @return string - template out
 */
function templateCities($template) {

    if( stristr( $_SERVER['REQUEST_URI'], '/cities/' ) ) {
        $arr = array_diff(explode('/', explode('?', $_SERVER['REQUEST_URI'])[0]), array(''));
        sort($arr);
        $template = $_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/pets-grooming/wstd/cities/list.php';
        if( isset($arr[1]) ) {
            $template = $_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/pets-grooming/wstd/cities/section.php';
        }
        if( isset($arr[2]) ) {
            $template = $_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/pets-grooming/wstd/cities/detail.php';
        }
    }

    return $template;
}
// Фильтры разные post_type_link - кастомные посты post_link - посты term_link - таксономии
add_filter('post_type_link', 'my_filter_post_link', 10, 2 );
/**
 * Replacing a rewrite tag and returning valid  post permalink.
 * @param $permalink - permalink with tag
 * @param $post - post data
 * @return mixed - valid permalink
 */
function my_filter_post_link( $permalink, $post ) {

    // bail if %city% tag is not present in the url:
    if ( false === strpos( $permalink, '%city%'))
        return $permalink;

    // getting a data for replacement
    $terms = wp_get_post_terms( $post->ID, 'cities_tax');
    // set location, if no location is found, provide a default value.
    if ( 0 < count( $terms ))
        $location = $terms[0]->slug;
    else
        $location = 'no_dir';

    $location = urlencode( $location );
    $permalink = str_replace('%city%', $location , $permalink );

    return $permalink;
}
