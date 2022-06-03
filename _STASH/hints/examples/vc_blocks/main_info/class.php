<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

//if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
//    class WPBakeryShortCode_Your_Gallery extends WPBakeryShortCodesContainer {
//    }
//}

if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Main_Info extends WPBakeryShortCode {
        protected function content($atts, $content = null) {
            $output = '';
            $template = __DIR__ . '/front.php';

            if( file_exists($template) ) {

                $atts_def = vc_map_get_attributes($this->shortcode, $atts);
                $atts = shortcode_atts( $atts_def, $atts );
                extract($atts);

                ob_start();
                include $template;
                $output .= ob_get_contents();
                ob_end_clean();

            }else {
                $output = '<p>Template file don\'t exists! (<b>' . $template . '</b>)</p>';
            }
//            $output .= '<pre>'. var_export(get_defined_vars(), true) . ' </pre>';
            return $output;
        }
    }
}
