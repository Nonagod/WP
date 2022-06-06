<?
/**
 * @var object WSTDGetData $wstd_gd_cl
 * @var array $attr - shortcode parameters
 * @var string $content - shortcode content
 * @var string $tag - name of shortcode
 *
 * @var array $data - result of data get
 */

$el = unserialize(base64_decode($content));;

if( $el ):?>
    <div class="card<?=( $attr['card_class'] )? $attr['card_class'] : ' card_fourth' ;?>">

        <div class="img-box card__img-box">
            <img src="<?=$el['thumbnail']['src']?>" alt="<?=$el['name']?>" title="<?=$el['name']?>" class="img-responsive">
            <div class="card__tag<?=($el['category_color_class']) ? " " . $el['category_color_class'] : "" ;?>"><?=$el['category_name']?></div>
        </div>

        <div class="text-box card__text-box">
            <div class="card__row">
                <span class="card__date"><?=( $el['fields']['pa_available_to'] ) ? 'до ' . $el['fields']['pa_available_to'] : date_i18n('d F Y', strtotime($el['modify'])) ;?></span>
            </div>
            <h4 class="card__title"><?=$el['name']?></h4>
            <?if( $el['preview'] ):?><p class="card__text"><?=$el['preview']?></p><?endif;?>
            <a href="<?=$el['link']?>" title="<?=$el['name']?>" class="link card__link">Читать</a>
        </div>

    </div>
<?endif;?>