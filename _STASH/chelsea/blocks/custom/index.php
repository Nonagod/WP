<?php
/**
 * @var string $block_index_path
 * @var string $block_folder
 * @var array $options
 *    custom-block_item_id
 */
echo do_blocks(get_the_content(null, false, $options['custom-block_item_id']));
