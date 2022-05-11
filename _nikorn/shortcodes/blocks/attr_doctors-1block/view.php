<?
/**
 * @var object WSTDGetData $wstd_gd_cl
 * @var array $attr - shortcode parameters
 * @var string $content - shortcode content
 * @var string $tag - name of shortcode
 *
 * @var array $data - result of data get
 */
//_p($wstd_gd_cl);?>

<section class="section">
    <div class="section__wrapper">
        <div class="specialist">
			<div class="specialist__title-row">
				<div class="img-box specialist__img-box">
					<img src="<?=$wstd_gd_cl->page_data['thumbnail']['src']?>" alt="<?=$wstd_gd_cl->page_data['post_title']?>" title="<?=$wstd_gd_cl->page_data['post_title']?>" class="img-responsive">
				</div>
				<div class="text-box specialist__text-box">
					<h1 class="title specialist__title"><?=$wstd_gd_cl->page_data['post_title']?></h1>
					<div class="specialist__sub-title"><?=$wstd_gd_cl->page_data['fields']['type']?></div>
					<div class="specialist__row">
						<button data-name="<?=$wstd_gd_cl->page_data['post_title']?>" class="button jsBtnOrder specialist__btn">Записаться</button>
						<a href="#review" class="button specialist__review">Оставить отзыв</a>
					</div>
	<!--                <div class="specialist__adress">-->
	<!--                    ВЕДЁТ ПРИЁМ: ЦЕНТР ИМПЛАНТОЛОГИИ И ПАРОДОНТОЛОГИИ В КОРПУСЕ 250-->
	<!--                </div>-->
				</div>
			</div>
            <div class="specialist__desc">
                <?=$content?>
            </div>
        </div>
    </div>
</section>
