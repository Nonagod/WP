<?php
// === Define functions in init.php ===
$meta_robots_hide = false;
function printMetaRobotsTag() {
    global $APPLICATION;
    echo $APPLICATION->AddBufferContent("getMetaRobots");
}
function setMetaRobots( $status = false ) {
    $GLOBALS['meta_robots_hide'] = $status;
}
function getMetaRobots() {
    return $GLOBALS['meta_robots_hide'] ? '<meta name="robots" content="noindex, nofollow" />' : '<meta name="robots" content="all" />';
}

// === Template header.php output function call. ===
    // может быть потребуется вставить перед $APPLICATION->ShowHead();, т.к. битрикс будет выводить свой мета-тэг robots
printMetaRobotsTag();


// === Component result_modifier.php file condition set. ===
if( $arResult['properties']['NO_INDEX_CHECK']['~VALUE'] ) setMetaRobots(true);