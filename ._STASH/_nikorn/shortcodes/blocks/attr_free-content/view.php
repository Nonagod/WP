<?
/**
 * @var object WSTDGetData $wstd_gd_cl
 * @var array $attr - shortcode parameters
 * @var string $content - shortcode content
 * @var string $tag - name of shortcode
 *
 * @var array $data - result of data get
 */
if( $content ):?>
    <section class="section">
        <div class="section__wrapper">
            <article class="<?=( $attr['container'] )? $attr['container'] : 'content' ; ?>">
                <?=$content?>
            </article>
        </div>
    </section>
<?endif;?>