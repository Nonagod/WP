<?
/**
 * @var $post
 */
get_header();
$taxonomies = get_the_terms(  $post->ID, $post->post_type . '_tax' ); ?>

<section class="section">
    <div class="container">
        <div class="article">
            <?if( $taxonomies ):?><mark><?=implode(' | ', array_map(function( $obj ){ return $obj->name; }, $taxonomies))?></mark><?endif;?>
            <h1><?=$post->post_title?></h1>

            <?the_content();?>

        </div>
    </div>
</section>

<?get_footer();?>