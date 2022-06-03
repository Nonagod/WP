<?php get_header(); ?>
<!-- Основная часть -->

<section class="section">
    <div class="section__wrapper about" style="background-image: url('<?=THEME_URL?>img/about/bg-4.png');">
        <div class="text-box about__text-box about__text-box_title">
            <h1 class="title title_color-light">Наши специалисты</h1>
            <div class="search-bar">
                <form action="#" onsubmit="filterDoctors(this); return false;" class="search-bar__form">
                    <input name="s" type="text" class="input-field search-bar__input" placeholder="Найти специалиста">
                    <button class="button search-bar__btn">Найти</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?if( $_POST['ajax'] == 'DocFilter' ) {ob_clean();}?>

<?echo do_shortcode('[load_block block="fields_related-doctors" title="Наши специалисты" hide-title="Y" specialization=""][/load_block]');?>
			
			
		
         
<?php get_footer(); ?>
