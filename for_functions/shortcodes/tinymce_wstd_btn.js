(function() {
    tinymce.PluginManager.add('wstd_btn', function( editor, url ) {
        editor.addButton( 'wstd_btn', {
            text: 'Блоки',
            type: 'menubutton',
            title: 'Вставить блок',
            menu: [
                {
                    text: 'Default template',
                    onclick: function() {
                        editor.insertContent('[load_block block="def_templates" title=""][/load_block]');
                    }
                },
                {
                    text: 'Системные блоки',
                    menu: [

                        {
                            text: 'Investments',
                            onclick: function() {
                                editor.insertContent('[load_block block="investments" title="Some title" except="Except an element (id)"][/load_block]');
                            }
                        },

                    ]
                },
            ]
        });
    });
})();