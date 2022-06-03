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
    <div class="section__wrapper services-image-hidden" style="background-image: url(<?=$attr['background-image']?>);">
        <div class="text-box service-intro">
            <div class="img-box service-intro__img-box">
                <img src="<?=$wstd_gd_cl->page_data['thumbnail']['src']?>" alt="<?=$attr['title']?>" title="<?=$attr['title']?>" class="img-responsive">
            </div>
            <h1 class="title service-intro__title"><?=$attr['title']?></h1>
            <p class="service-intro__text"><?=$attr['text']?></p>
            <div class="service-intro__row">
                <button data-title="<?=$attr['title']?>" data-id="<?=$wstd_gd_cl->page_data['ID']?>" class="button jsBtnOrder service-intro__order-btn">Записаться</button>
                <a href="#price" class="button service-intro__price-btn">Цены</a>
            </div>
        </div>
    </div>
</section>
