<?get_header();
//
$terms = $title = null;
$post_type = $wp_query->query['post_type'];
$term_name = null;
$query_object = $wp_query->queried_object;

if( $query_object->taxonomies && $query_object->taxonomies[0] ) {
    $term_name = $query_object->taxonomies[0];
    $title = $query_object->label;
}else {
    $term_name = $query_object->taxonomy;
    $title = $query_object->name;
}

$terms = get_terms([
    'taxonomy'              => $term_name,
    'hide_empty'            => true,
    'parent'                => 0,
]);

//_p($post_type);
//_p($terms);
//_p($wp_query->query);
//_p($query_object);
?>

<section class="section">
    <div class="container">
        <div class="title-block">
            <h1 class="title-block__title title-block__title_big"><?=$title?></h1>
        </div>
    </div>
</section>

<?if ( have_posts() ):?>
    <section class="section">
        <div class="container">
            <div class="tabs tabs_magazine">

                <?if( $terms && count($terms) > 1 ):
                    if( $post_type ):?>
                        <nav class="tabs__nav">
                            <a href="<?=prepareLinkPll('/'.$post_type.'/')?>" class="tabs__tab<?=(!isset($wp_query->query[$term_name])) ? ' is-active' : ''?>">Все</a>
                            <?foreach( $terms as $term ):
                                $active = ( isset($wp_query->query[$term_name]) && $wp_query->query[$term_name] === $term->slug ) ? ' is-active' : '';?>
                                <a href="<?=prepareLinkPll('/'.$post_type.'/?'.$term_name.'='.$term->slug)?>" class="tabs__tab<?=$active?>" data-term="<?=$term_name?>" data-filter="<?=$term->slug?>"><?=$term->name?></a>
                            <?endforeach;?>
                        </nav>
                    <?else:?>
                        <nav class="tabs__nav">
                            <?foreach( $terms as $term ):
                                $active = ( isset($wp_query->query['category_name']) && $wp_query->query['category_name'] === $term->slug ) ? ' is-active' : '';?>
                                <a href="<?=prepareLinkPll("/$term->slug/")?>" class="tabs__tab<?=$active?>"><?=$term->name?></a>
                            <?endforeach;?>
                        </nav>
                    <?endif;
                endif;?>

                <div class="tabs__panels">
                    <div class="tabs__panel is-active">

                        <?loadBlock( (!$post_type) ? 'archive-section' : 'archive-section_'.$post_type );?>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="section">
        <div class="container">
            <style>
                .pagination {
                    display: flex;
                    align-items: center;
                    justify-content: flex-start;
                    padding: 0 25px;
                }
                .pagination * {
                    padding: 5px;
                    color: rgba(1, 15, 20, 0.8);
                }
                .pagination .current {
                    color: #EF233C;
                }
            </style>
            <div class="pagination">
                <?
                $big = 999999999; // need an unlikely integer
                echo paginate_links( array(
                    'base'          => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    'format'        => '?paged=%#%',
                    'current'       => max( 1, get_query_var('paged') ),
                    'total'         => $wp_query->max_num_pages,
                    'prev_next'     => false,
                ) );

                //        $wp_query = NULL;
                //        $wp_query = $temp_query;
                ?>
            </div>
        </div>
    </div>


<?endif;?>

<?get_footer(); ?>