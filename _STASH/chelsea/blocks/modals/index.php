<?php
/**
 * @var $block_index_path
 * @var $block_folder
 * @var $options
 */?>

<div class="modal-container">
    <div class="modal modal_stock js-menu_popup_container" data-modal="menu-popup" data-src-modal="data-src-modal">
        No selected menu position.
    </div>

    <div class="modal modal_stock" data-modal="stock" data-src-modal="data-src-modal">
        <div class="modal__content">
            <?loadBlock('info_modal');?>
        </div>
    </div>


    <div class="modal modal_order" data-modal="order" data-src-modal="data-src-modal">
        <div class="modal__content">
            <?loadBlock('order_form');?>
        </div>
    </div>
	 <div class="modal modal_order" data-modal="order-small" data-src-modal="data-src-modal">
        <div class="modal__content">
            <?loadBlock('order_form-small');?>
        </div>
    </div>

    <div class="modal modal_order" data-modal="success" data-src-modal="data-src-modal">
        <div class="modal__content">
            <div class="status-box status-box_success">
                <h2 class="status-box__text"><?pll_e('forms__success-text');?></h2>
            </div>
        </div>
    </div>

    <div class="modal modal_order" data-modal="error" data-src-modal="data-src-modal">
        <div class="modal__content">
            <div class="status-box status-box_error">
                <h2 class="status-box__text"><?pll_e('forms__fail-text');?></h2>
            </div>
        </div>
    </div>

</div>
