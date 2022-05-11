<?php get_header();

    echo do_shortcode('[load_block block="system_clinic-card"][/load_block]');

    if ( have_posts() ) : while ( have_posts() ) : the_post();
         the_content();
    endwhile; else: endif;

    echo do_shortcode('[load_block block="system_technology-slider" title="Технологии в клинике" title-classes=" title_color-light" background-image="/wp-content/uploads/2018/12/bg-2-1.png"][/load_block]');

    echo do_shortcode('[load_block block="system_reviews-slider" title="Отзывы наших клиентов" blockquote="Мы заботимся о вашем здоровье на самом высоком уровне и всегда прислушиваемся к вашему мнению и пожеланиям"][/load_block]');

 get_footer();