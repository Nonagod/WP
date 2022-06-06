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

<section class="section" id="price">
    <div class="section__wrapper">
        <h3 class="title"><?=$attr['title']?></h3>
        <div class="price-list">
            <?=$wstd_gd_cl->page_data['fields']['price']?>
        </div>
    </div>
</section>