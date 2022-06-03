<?php
$url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] ;
if( !stristr($_SERVER['REQUEST_URI'], '404') ) {
    header('Location: ' . $url . '/404/');
}
get_header(); ?>

<style>

    /**{*/
        /*margin: 0;*/
        /*padding: 0;*/
        /*box-sizing: border-box;*/
    /*}*/
    /*body {*/
        /*background-color: #fff;*/
        /*height: 100vh;*/
    /*}*/
    section.bg {
        padding: 50px 0;
        /*height: 100%;*/
        background-image: url(https://nikor-n.ru/wp-content/themes/raten/images/bg_page_head.png);
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
    }

    .wrapper404 {
        position: relative;
        /*top: 50%;*/
        /*left: 50%;*/
        /*transform: translate(-50%, -50%);*/
        display: flex;
        flex-direction: row;
        justify-content: center;

        padding: 0 5em;
    }

    .wrap-block404 {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 50%;
        padding: 10px;
    }

    .img404 {
        padding: 10px;
    }

    .title404 {
        margin: 0;
        display: flex;
        font-size: 20em;
        font-weight: 700;
        color: #5CA836;
        line-height: 1;
        font-family: Roboto, sans-serif;
    }

    .subtitle404 {
        font-size: 5em;
        font-weight: 700;
        color: #5CA836;
        text-align: center;
        font-family: Roboto, sans-serif;
    }

    .buttons404 {
        padding-top: 30px;
        display: flex;
        flex-direction: column;
    }

    .buttons404 a.button404 {
        display: flex;
        justify-content: center;
        border: 2px solid #5CA836;
        text-decoration: none;
        padding: 15px;
        text-transform: uppercase;
        color: #5CA836;
        transition: 0.2s;
        text-align: center;
        line-height: 1.3;
        border-radius: 2em;
        margin: 10px 0;
        font-family: Roboto, sans-serif;
    }
    .buttons404 a.button404:hover {
        color: #5CA83699
    }

    @media (max-width: 1120px) {
        .wrapper404 {
            flex-direction: column;
            align-items: center;
            padding: 0 2em;
        }
        .wrap-block404 {
            width: 100%;
        }
    }
    @media (max-width: 640px) {
        .title404 {
            font-size: 10em;
        }
        .subtitle404 {
            font-size: 2em;
        }
    }

    @media (max-width: 480px) {
        .title404 {
            font-size: 5em;
        }
        .button404 {
            font-size: 0.8em;
        }
    }

</style>

<section class='section bg'>
    <div class="wrapper404">
        <div class="wrap-block404">
            <h1 class="title404" data-content="404">
                404
            </h1>
        </div>
        <div class="wrap-block404">
            <div class="subtitle404">
                Page not found
            </div>
            <div class="buttons404">
                <a class="button404" href="/">Вернуться на главную</a>
                <a class="button404" href="/services/">Страница услуг</a>
            </div>
        </div>

    </div>
</section>
<?php get_footer(); ?>
