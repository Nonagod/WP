<?php
/**
 * @var string $block_index_path
 * @var string $block_folder
 * @var array $options
 */
?>

<section class="section section_l">
    <style>
        .itt {
            display: flex;
            justify-content: space-between;
        }
        .itt--image {width: 40%; position: relative; overflow: hidden;}
        .itt--image img { object-fit: contain; object-position: center; width: 100%; height: 100%; }
        .itt--content {
            width: 58%;
            display: flex;
            justify-content: center;
            flex-direction: column;
        }
        .itt--title {}
        .itt--text {}

        @media (max-width: 769px) {
            .itt {
                flex-direction: column;
            }
            .itt--image {
                width: 100%;
                max-height: 300px;
            }
            .itt--content {
                width: 100%;
                margin: 24px 0 0;
            }
        }
    </style>
    <div class="container">
        <div class="itt">
            <div class="itt--image">
                <img src="<?=$options['image']['url']?>" alt="<?=$options['title']?>">
            </div>
            <div class="itt--content">
                <?if( $options['title'] ):?><h2 class="itt--title awward__title"><?=$options['title']?></h2><?endif;?>
                <p class="itt--text awward__text"><?=$options['text']?></p>
            </div>
        </div>
    </div>
</section>
