# WP System requirements

- PHP - 7.0 + (minimal 5.6)
    - short open tags - ON
- Server
    - apache rewrite_mod - ON

# The empty WP theme for a fast start.

The default structure of WP theme and some helpers, build in hints. Don't for Guthenberg.

## Theme structure

- (D) `hints` - some ready functions (delete after developing)
    - (D) `examples`
    - (D) `plugins` - contains some plugins and their description (delete after install)
- `assets` - for library files (jQuery, owl-carousel, and like these)
- `css` - for site css files
    - `fonts` - for fonts files
- `js` - for site js file
- `images` - for template images (only, another files must be deleted)
- `for_functions` - helpers
    - `classes`
    - `shortcodes` - adding a shortcodes functionality to `wysiwyg` redactor
    - `settings.php` - theme settings
    - `index.php` - file for include in `functions.php`
- `default wp files` - CMS theme files (`header.php`, `footer.php`, `functions.php`, `404.php`, `style.css`, `index.php`)

