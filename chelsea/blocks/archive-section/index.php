<?php
/**
 * @var $block_index_path
 * @var $block_folder
 * @var $options
 */?>

<div class="hit-slider ">
    <div class="hit-slider__slider swiper-container">
        <div class="swiper-wrapper fgrid fgrid_journal">
            <?while ( have_posts() ): the_post();
                global $post;
                loadBLock('journal_card', array('post' => $post, 'thumbnail' => getThumbnail($post->ID)))?>
            <?endwhile;?>
        </div>
    </div>
</div>
