<?php
/**
 * @var string $block_index_path
 * @var string $block_folder
 * @var array $options
 *    int questions_section_id
 */
global $WSTDGetData;

$questions = $WSTDGetData->getElementsData( [
  'post_type' => 'questions',
  'posts_per_page' => -1,
  'tax_query' => array(
    array(
      'taxonomy' => 'questions_tax',
      'field'    => 'id',
      'terms'    => $options['questions_section_id']
    )
  ),
  'meta_query' => array(
    'position_index' => array(
      'key'     => 'index',
      'compare' => 'EXISTS',
    ),
  ),
  'orderby' => 'position_index',
  'order'   => 'ASC',
] )['posts'];


if($questions):?>
  <section class="section section_l">
    <div class="container">
      <div class="title-block">
        <div class="title-block__title"><span><?pll_e('title_questions');?></span></div>
      </div>

      <div class="fgrid fgrid_faq">
        <?foreach( $questions as $question ):?>
          <div class="faq" data-faq="data-faq">
            <div class="faq__head" data-faq-head="data-faq-head"><span><?=$question['name']?></span><i class="icon icon_fill faq__icon">
                <svg viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.185737 1.18524C0.433387 0.923931 0.834906 0.923931 1.08256 1.18524L6 6.37387L10.9174 1.18524C11.1651 0.923931 11.5666 0.923931 11.8143 1.18524C12.0619 1.44654 12.0619 1.87021 11.8143 2.13151L6.44841 7.79328C6.20076 8.05458 5.79924 8.05458 5.55159 7.79328L0.185737 2.13151C-0.0619124 1.87021 -0.0619124 1.44654 0.185737 1.18524Z"></path>
                </svg></i></div>
            <div class="faq__body" data-faq-body="data-faq-body">
              <p><?=$question['content']?></p>
            </div>
          </div>
        <?endforeach;?>

      </div>

    </div>
  </section>
<?endif;?>
