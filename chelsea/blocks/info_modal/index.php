<?php
/**
 * @var $block_index_path
 * @var $block_folder
 * @var $options
 */

$address = $GLOBALS['theme_options']['contacts']['address'];
$phone = $GLOBALS['theme_options']['contacts']['phone'];
if( $GLOBALS['theme_options']['info_modals'] ):
    $windows = $GLOBALS['theme_options']['info_modals']['windows'];
    $windows = filterElementsByAvailability( $windows );
    $window = getRandArrayElement($windows);
    if( $window && !isset($_SESSION['info_modals'][$window['index']]) ):
        $_SESSION['info_modals'][$window['index']] = true; ?>
        <script>
            window.INFO_MODAL_SHOW = true;
        </script>
        <div class="modal-template">
            <button class="modal-template__close" type="button" data-modal-close="data-modal-close"><img alt="close" title="close" src="<?=THEME_URL?>/assets/images/modal-close.png"/></button>
            <div class="modal-template__note">
                <span><?=$window['titles']['clarifying_text_1']?></span>
                <span><?=$window['titles']['date']?></span>
                <span><?=$window['titles']['clarifying_text_2']?></span>
            </div>
            <div class="modal-template__heading"><img alt="ChelseaPub" title="ChelseaPub" src="<?=THEME_URL?>/assets/images/modal-logo.svg"/><span>the</span><span>Сhelsea Times</span></div>
            <h2 class="modal-template__title"><?=$window['titles']['main_title']?></h2>
            <h3 class="modal-template__subtitle"><?=$window['titles']['secondary_title']?></h3>
            <div class="modal-template__box">
                <div>
                    <?if( $window['content']['image']['url'] ):?><img class="image-full_width" src="<?=$window['content']['image']['url']?>"/><?endif;?>
                    <div class="modal-template__info">
                        <?if( $window['content']['text'] ):?><p class="modal-template__info-text"><?=$window['content']['text']?></p><?endif;?>
                        <?if( $window['content']['link_target'] && $window['content']['link_title'] ):?><a href="<?= $window['content']['link_target']?>" class="button button_accent modal-template__info-button"><?=$window['content']['link_title']?></a><?endif;?>
                    </div>
                </div>
            </div>
            <div class="modal-template__footer">
                <?if( $address ):?><span><?=$address?></span><?endif;?>
                <?if( $phone ):?><a href="tel:<?=$phone?>"><?=$phone?></a><?endif;?>
            </div>
        </div>
    <?else:?>
        <script>
            window.INFO_MODAL_SHOW = false;
        </script>
    <?endif;?>
<?endif;?>