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
        <h1 class="title"><?=$wstd_gd_cl->page_data['label']?></h1>
        <?if( $data['options']['pr_text-under-title'] ):?><blockquote class="blockquote"><?=$data['options']['pr_text-under-title']?></blockquote><?endif;?>

        <?if( $data['terms'] ):?>
            <div class="filter<?=($attr['filter_classes'])?$attr['filter_classes']:'';?>">
                <a href="" class="js-filterLink link filter__link<?=(!isset($_POST['filter']) || $_POST['filter'] == "-" )? " filter__link_active" : "" ;?>" data-filter="-" data-ajax="reviews_tax">Все</a>
                <?foreach($data['terms'] as $term):
                    $cl = ( $term['id'] == $_POST['filter'] ) ? " filter__link_active": '';?>

                    <a href="" data-filter="<?=$term['id']?>" data-ajax="reviews_tax" class="js-filterLink link filter__link<?=$cl?>" title="<?=$term['name']?>"><?=$term['name']?></a>

                <?endforeach;?>
            </div>
        <?endif;?>

    </div>
</section>