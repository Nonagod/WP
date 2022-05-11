# Some plugins for test

- Velvet Blues Update URLs - updating all url  (domain name change)

# Plugins description

All of used and proven plugins.

## Polylang
**Site** - https://polylang.pro  
**Status** - FREE, USED  
**Destination** - the plugin adding multi language supported functionality

### Usage (popular)
`asd`
#### Language list
```php
<?$translations = pll_the_languages( array( 'raw' => 1 ) );
foreach( $translations as $code => $lang):
    if( !$lang['no_translation'] ): // don't show lang without translation
        $cl = ( $lang['current_lang'] ) ? ' active' : '';?>
        <a class="header__substrate-lang-item<?=$cl?>" href="<?=$lang['url']?>"><?=strtoupper($lang['name'])?></a>
    <? endif;
endforeach;?> 
```
#### Adding new phrase
```php
pll_register_string('wstd', 'Фраза', 'wstd_theme', false);
```
#### Get active language
```php
pll_current_language();
```


## Custom Post Type UI (CPT UI)
**Site** - https://ru.wordpress.org/plugins/custom-post-type-ui/  
**Status** - FREE, USED  
**Description** - the plugin adding functionality to manage custom post types

## Advance Custom Fields PRO (ACF) 
**Site** - https://www.advancedcustomfields.com  
**Status** - PAID, USED  
**Description** - the plugin adding functionality to add new custom fields for all elements and site

### Usage (popular)
#### Adding options page in admin panel
```php
if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
}
```

## Visual Composer (VC) || WPBakery Page Builder
**Sites** - https://wpbakery.com/ (present) https://visualcomposer.com/help/api/ (documentation) https://kb.wpbakery.com/docs/developers-how-tos/nested-shortcodes-container/ (vc_map example) https://kb.wpbakery.com/docs/inner-api/vc_map/ (vc_map doc) https://kb.wpbakery.com/ (documentation)
**Status** - UNUSED, bought themes   
**Description** - page constructor functionality
### Usage (popular)
### Adding block functionality
```php
/*ADD VC BLOCKS*/
require_once __DIR__ . 'examples/vc_block/index.php';
```
Directory structure:
- `class.php` - fetching data logic
- `front.php` - block template
- `index.php` - block init