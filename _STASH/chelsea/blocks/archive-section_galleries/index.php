<?php
/**
 * @var $block_index_path
 * @var $block_folder
 * @var $options
 */
global $wp_query;?>

<?while ( have_posts() ): the_post();
    global $post;
    if( $wp_query->post_count > 1 ):?>
        <section class="section">
            <div class="container">
                <div class="title-block">
                    <div class="title-block__title title-block__title_small"><?=$post->post_title?></div>
                </div>
            </div>
        </section>
    <?endif;
    the_content();?>
<?endwhile;?>
