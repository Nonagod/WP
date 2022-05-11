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
    <section id="team" class="section section_red">
        <div class="wrapper team">
            <h2 class="title title_white"><?=$attr['title']?></h2>

            <?foreach( $data['posts'] as $person ):?>
                <a href="<?=$person['link']?>" class="team__person" title="<?=$person['name']?>">
                    <?if( $person['fields']['photography']['url'] ):?><img class="team__img" src="<?=$person['fields']['photography']['url']?>" title="<?=$person['name']?>" alt="<?=$person['name']?>"><?endif;?>
                    <div class="title title_white team__title"><?=$person['name']?></div>
                    <div class="team__sub-title"><?=$person['fields']['person_position']?></div>
                </a>
            <?endforeach;?>

        </div>
    </section>
<?endif;?>