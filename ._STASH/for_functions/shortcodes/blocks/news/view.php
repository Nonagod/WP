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

<?if( $data['posts'] ):?>
    <section id="news" class="section">
        <div class="wrapper news">
            <h2 class="title"><?=$attr['title']?></h2>

            <?foreach( $data['posts'] as $news ):?>
                <div class="news__item">
                    <div class="news__date"><?=getFormattedDate($news['date'])?></div>
                    <h3 class="title title_black title_left news__title"><?=$news['name']?></h3>
                    <p class="text news__text">
                        <?=$news['fields']['preview']?>
                        <a href="<?=$news['link']?>" title="<?=$news['name']?>" class="link">Подробнее > </a>
                    </p>
                </div>
            <?endforeach;?>

        </div>
    </section>
<?endif;?>