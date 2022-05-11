<?
/**
 * @var object WSTDGetData $wstd_gd_cl
 * @var array $attr - shortcode parameters
 * @var string $content - shortcode content
 * @var string $tag - name of shortcode
 *
 * @var array $data - result of data get
 */
?>

<section class="section">
    <div class="section__wrapper">
        <h1 class="title"><?=$wstd_gd_cl->page_data['name']?></h1>

        <?if( $data['terms'] ):?>
            <div class="filter">
                <?foreach($data['terms'] as $term):
                    $cl = ( $wstd_gd_cl->page_data['term_id'] == $term['id']) ? " filter__link_active": '';?>

                    <a href="<?=$term['link']?>" class="link filter__link<?=$cl?>" title="<?=$term['name']?>"><?=$term['name']?></a>

                <?endforeach;?>
            </div>
        <?endif;?>

    </div>
</section>