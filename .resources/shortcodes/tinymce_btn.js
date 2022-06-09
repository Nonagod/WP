(function() {
    tinymce.PluginManager.add('WebsterSTD_shortcodes', function( editor, url ) {
        editor.addButton( 'WebsterSTD_shortcodes', {
            text: 'Блоки',
            type: 'menubutton',
            title: 'Вставить блок',
            menu: [
                {
                    text: 'Произвольный блок',
                    onclick: function() {
                        editor.insertContent('[load_block block=""');
                    }
                },
                {
                    text: 'Список доступных блоков',
                    menu: [

                        {
                            text: 'Какой-то блок',
                            onclick: function() {
                                editor.insertContent('[load_block block="some" title="Some title"][/load_block]');
                            }
                        },

                    ]
                },
            ]
        });
    });
})();