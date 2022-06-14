<?php
/**
 * @var string $block - название блока
 * @var array $options - опции для рендера блока
 *      - string active_restaurants_id
 *      - string is_block
 * @var bool $return - возвращать ли отрендереный блок
 *
 * @var bool $block_folder - путь до папки блока
 *
 * НУЖНО ДОБАВИТЬ ПРАВИЛО ПАГИНАЦИИ
 */

global $ContentClass;

$filter = array(
    'post_type' => 'restaurants',
    'orderby' => 'ID',
    'posts_per_page' => 4,
    'order' => 'ASC',
);
if( !$options['is_block'] ) {
    $filter['posts_per_page'] = 1;
    $filter['paged'] = get_query_var('paged') ?: 1;
}
if( $options['active_restaurant_id'] ) $filter['post__not_in'] = array($options['active_restaurant_id']);

Nonagod\_p($filter);
$query_result = $ContentClass->getElementsData( $filter, true );

if( $query_result['posts'] ):?>
    <section class="section section--footer">
        <div class="section__head">
            <?if( $options['is_block'] ):?>
                <a href="/restaurants/"><h2 class="title--sub title--page w-link">Смотрите также</h2></a>
            <?else:?>
                <h1 class="title--sub title--page">Рестораны</h1>
            <?endif;?>
        </div>
        <div class="grid-4 grid-4--restaurants">

            <?foreach( $query_result['posts'] as $restaurant ):?>
                <a class="restaurants-item" href="<?=$restaurant['link']?>">
                    <div class="restaurants-item__image">
                        <?if( $restaurant['fields']['card_image'] ):?><img src="<?=$restaurant['fields']['card_image']['url']?>" title="<?=$restaurant['name']?>" alt="<?=$restaurant['name']?>"><?endif;?>
                    </div>
                    <div class="restaurants-item__content">
                        <h3><?=$restaurant['name']?></h3>
                        <?if( $restaurant['fields']['card_description'] ):?><p><?=$restaurant['fields']['card_description']?></p><?endif;?>
                    </div>
                </a>
            <?endforeach;?>

        </div>
    </section>
<?endif;?>

<div class="pagination">
    <? $big = 999999999; // need an unlikely integer
    echo paginate_links( array(
        'base'          => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format'        => '?paged=%#%',
        'current'       => max( 1, get_query_var('paged') ),
        'total'         => $query_result['number_of_pages'],
        'prev_next'     => false,
    ) ); ?>
</div>