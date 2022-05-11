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
<?if($data['fields']['c_coordinats']):?>
    <script>
        var groups = [
            {
                items: [
                    {
                        center: [<?=$data['fields']['c_coordinats']?>],
                        name: "<?=$data['post_title']?>",
                    },
                ]
            },

        ];
    </script>

    <section class="section ">
        <div class="section__wrapper adress">
            <div class="adress__map section--hidden-mobile" data-name="<?=$data['post_title']?>">
                <div id="map"></div>
            </div>
            <div class="text-box adress__text-box">
                <h2 class="title adress__title"><?=$data['post_title']?></h2>
                <?if( $data['fields']['c_address'] ):?>
                    <p class="adress__text">
                        АДРЕС: <span><?=$data['fields']['c_address']?></span>
                    </p>
                <?endif;?>
                <?if( $data['fields']['c_telephones'] ):?>
                    <p class="adress__text">Телефон<br>
                        <?foreach( explode(', ', $data['fields']['c_telephones']) as $tel ):
                            $r = array(' ', ')', '(', '-')?>
                            <a href="tel:<?=str_replace($r, '', $tel)?>" class="link adress__tel"><?=$tel?></a>
                        <?endforeach;?>
                    </p>
                <?endif;?>
                <?if( $data['fields']['c_work-time'] ):?>
                    <p class="adress__text">Режим работы</p>
                    <table class="adress__hours">
                        <?foreach( explode(PHP_EOL, $data['fields']['c_work-time']) as $str ):
                            $el = explode('--', $str);?>
                            <tr>
                                <td><?=$el[0]?></td>
                                <td><?=$el[1]?></td>
                            </tr>
                        <?endforeach;?>
                    </table>
                <?endif;?>
                <button class="button jsBtnOrder adress__btn">Записаться на консультацию</button>
            </div>
        </div>
    </section>
<?endif?>
