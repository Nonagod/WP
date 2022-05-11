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

<?if( is_array($data['posts']) && !empty($data['posts'])):?>
    <section class="section">
        <div class="section__wrapper sub-services-nav">
            <h4 class="title sub-services-nav__title"><?=$attr['title']?></h4>
            <?foreach( $data['posts'] as $p ):?>
                <a href="<?=$p['link']?>" title="<?=$p['name']?>" class="button sub-services-nav__link"><?=$p['name']?></a>
            <?endforeach;?>
        </div>
    </section>
<?endif;?>