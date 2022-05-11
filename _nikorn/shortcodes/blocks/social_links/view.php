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

<div class="social-links <?=( !$attr['class'] )?: $attr['class'];?>">

    <?if( isset($data['you']) && !empty($data['you']) ):?>
        <a href="<?=$data['you']?>" title="Nikor-n - Youtube" class="link social-links__link" target="_blank"><i class="fab fa-youtube"></i></a>
    <?endif;?>
    <?if( isset($data['od']) && !empty($data['od']) ):?>
        <a href="<?=$data['od']?>" title="Nikor-n - Однокласники" class="link social-links__link" target="_blank"><i class="fab fa-odnoklassniki-square"></i></a>
    <?endif;?>
    <?if( isset($data['tw']) && !empty($data['tw']) ):?>
        <a href="<?=$data['tw']?>" title="Nikor-n - Twitter" class="link social-links__link" target="_blank"><i class="fab fa-twitter"></i></a>
    <?endif;?>
    <?if( isset($data['pinterest']) && !empty($data['pinterest']) ):?>
        <a href="<?=$data['pinterest']?>" title="Nikor-n - Pinterest" class="link social-links__link" target="_blank"><i class="fab fa-pinterest"></i></a>
    <?endif;?>
    <?if( isset($data['inst']) && !empty($data['inst']) ):?>
        <a href="<?=$data['inst']?>" title="Nikor-n - Instagram" class="link social-links__link" target="_blank"><i class="fab fa-instagram"></i></a>
    <?endif;?>
    <?if( isset($data['fb']) && !empty($data['fb']) ):?>
        <a href="<?=$data['fb']?>" title="Nikor-n - Facebook" class="link social-links__link" target="_blank"><i class="fab fa-facebook"></i></a>
    <?endif;?>
    <?if( isset($data['vk']) && !empty($data['vk']) ):?>
        <a href="<?=$data['vk']?>" title="Nikor-n - Вконтакте" class="link social-links__link" target="_blank"><i class="fab fa-vk"></i></a>
    <?endif;?>

</div>