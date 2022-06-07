<?php

function highlightAccents( $text, $class_name = '' ) {
    return preg_replace('/~([^~]+)~/i', "<span class='$class_name'>$1</span>", $text);
}