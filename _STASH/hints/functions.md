# Formatting date
```php
/**
 * Return formatted date by active lang.
 * 
 * @param string $date - date value
 * @param string $format - 
 * @return false|string
 */
function getFormattedDate( $date, $format = 'F, d Y' ) {
    /**
     * @var $LANG - global active language code
     */
    if( isset($LANG) && !empty($LANG) ) {
        if( $LANG === "ru" )
            return date_i18n($format, strtotime($date));
    }

    return date($format, strtotime($date));
}
```