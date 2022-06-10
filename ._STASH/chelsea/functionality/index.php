<?php





function getThumbnail( $post_id ) {
    $data = null;
    $attachment_id = get_post_meta($post_id, '_thumbnail_id');
    if( $attachment_id ) {
        $attachment_id = $attachment_id[0];
        $data = get_post($attachment_id);
    }
    return ($data) ? $data : null;
}

function getRandArrayElement( $elements ) {
    // $rand_index = rand( 0, count($elements) -1 );
	$rand_index = array_rand($elements, 1);
	
    $element = $elements[$rand_index];
    $element['index'] = md5(serialize($element));
    return $element;
}

function filterElementsByAvailability( $elements ) {
    $now_time = time() + 60 * 60 * 3;
    $day_of_week = date('w', $now_time); // 0 - 6
    return array_filter($elements, function($element) use (&$now_time, &$day_of_week){
        $filter_result = false;
        if( isset($element['availability']) ) {
            $availability = $element['availability'];
            if( $availability['active'] ) {
                $filter_result = true;
                if( $availability['date_from'] || $availability['date_to'] ) {
                    if( $availability['date_from'] && strtotime($availability['date_from']) > $now_time ) { $filter_result = false; }
                    if( $availability['date_to'] && strtotime($availability['date_to']) < $now_time ) { $filter_result = false; }
                }

                if( ( $availability['show_time_from'] || $availability['show_time_to'] ) && $filter_result ) {
                    if( $availability['show_time_from'] && strtotime($availability['show_time_from']) > $now_time ) { $filter_result = false; }
                    if( $availability['show_time_to'] && strtotime($availability['show_time_to']) < $now_time ) { $filter_result = false; }
                }

                if(
                    (
                        $availability['show_at_monday']
                        || $availability['show_at_tuesday']
                        || $availability['show_at_wednesday']
                        || $availability['show_at_thursday']
                        || $availability['show_at_friday']
                        || $availability['show_at_saturday']
                        || $availability['show_at_sunday']
                    )
                    && $filter_result
                ) {
                    $filter_result = false;
                    if(
                        ( $availability['show_at_monday'] && $day_of_week === '1' )
                        || ( $availability['show_at_tuesday'] && $day_of_week === '2' )
                        || ( $availability['show_at_wednesday'] && $day_of_week === '3' )
                        || ( $availability['show_at_thursday'] && $day_of_week === '4' )
                        || ( $availability['show_at_friday'] && $day_of_week === '5' )
                        || ( $availability['show_at_saturday'] && $day_of_week === '6' )
                        || ( $availability['show_at_sunday'] && $day_of_week === '0' )
                    ) $filter_result = true;
                }

            }
        }
        return $filter_result; //bool
    });
}

function checkElementByAvailability( $element ) {
    $now_time = time();
    $filter_result = false;

    if( isset($element['availability']) ) {
        $availability = $element['availability'];
        if( $availability['active'] ) {
            $filter_result = true;
            if( $availability['date_from'] || $availability['date_to'] ) {
                if( $availability['date_from'] && strtotime($availability['date_from']) > $now_time ) { $filter_result = false; }
                if( $availability['date_to'] && strtotime($availability['date_to']) < $now_time ) { $filter_result = false; }
            }

        }
    }

    return $filter_result ;
}