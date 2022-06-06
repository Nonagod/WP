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

<?if( $attr['title'] && $attr['blockquote'] ):?>
    <section class="section" id="clinics" >
        <div class="section__wrapper">
            <h3 class="title"><?=$attr['title']?></h3>
            <blockquote class="blockquote"><?=$attr['blockquote']?></blockquote>
        </div>
    </section>
<?endif;?>

<?if($data['posts']):?>
    <section class="section ">
        <div class="section__wrapper map">
            <div class="map__cont">
                <div id="map"></div>
            </div>
            <div class="map__list">
                <?$js_output = 'var groups = [';
                foreach( $data['posts'] as $e ):
                    $js_output .= '{name:"'. $e['name'] . '",style:[{iconLayout:"default#image",iconImageHref:"' . $e['icon'] . '",iconImageSize: [50, 50],iconImageOffset: [0, -40]}],items:[';?>
                    <h5 class="map__category"><?=$e['name']?></h5>
                    <?foreach($e['items'] as $item):
                        if( !empty($item['fields']['c_coordinats']) && !empty($item['name']) ): $js_output .= '{center: [' . $item['fields']['c_coordinats'] . '],name: "' . $item['name'] . '",},'; ?>
                        <div class="drop-down map__dd js-hiddenDesOpenerPar">
                            <div class="drop-down__visible js-hiddenDesOpenerBt" data-name="<?=$item['name']?>">
                                <h4 class="map__clinic-title"><i class="fas fa-map-marker-alt"></i><?=$item['name']?></h4>
                            </div>
                            <div class="drop-down__hidden text-box map__text-box js-hiddenDesOpenerCont" style="display: none;">
                                <?if($item['fields']['c_address']):?>
                                    <p class="map__text">
                                        АДРЕС: <span><?=$item['fields']['c_address']?></span>
                                    </p>
                                <?endif;?>
                                <?if( $item['fields']['c_telephones'] ):?>
                                    <p class="map__text">Телефон<br>
                                        <?foreach( explode(', ', $item['fields']['c_telephones']) as $tel ):
                                            $r = array(' ', ')', '(', '-')?>
                                            <a href="tel:<?=str_replace($r, '', $tel)?>" class="link map__tel"><?=$tel?></a>
                                        <?endforeach;?>
                                    </p>
                                <?endif;?>
                                <?if( $item['fields']['c_work-time'] ):?>
                                    <p class="map__text">Режим работы</p>
                                    <table class="map__hours">
                                        <?foreach( explode(PHP_EOL, $item['fields']['c_work-time']) as $str ):
                                            $el = explode('--', $str);?>
                                            <tr>
                                                <td><?=$el[0]?></td>
                                                <td><?=$el[1]?></td>
                                            </tr>
                                        <?endforeach;?>
                                    </table>
                                <?endif;?>
                                <a href="<?=$item['link']?>" title="<?=$item['name']?>" class="link map__more-link">Подробнее</a>
                            </div>
                        </div>
                    <?endif;endforeach;
                    $js_output .= ']}';?>
                <?endforeach;
                $js_output .= '];';?>
            </div>
        </div>
    </section>
    <script><?=$js_output?></script>
<?endif;?>







