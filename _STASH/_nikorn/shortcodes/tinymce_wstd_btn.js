(function() {
    tinymce.PluginManager.add('wstd_btn', function( editor, url ) { // id кнопки wstd_btn должен быть везде один и тот же
        editor.addButton( 'wstd_btn', { // id кнопки wstd_btn
            //icon: 'perec', // css class с помощью которго можно задать иконку кнопки
            text: 'Блоки', // или просто указать текст кнопки
            type: 'menubutton',
            title: 'Вставить блок', // всплывающая подсказка при наведении
            menu: [ // тут начинается первый выпадающий список
                {
                    text: 'Использующие поля элемента',
                    menu: [ // тут начинается второй выпадающий список внутри первого
                        // {
                        //     text: 'Текстовое поле',
                        //     onclick: function() {
                        //         editor.windowManager.open( {
                        //             title: 'Задайте параметры поля',
                        //             body: [
                        //                 {
                        //                     type: 'textbox', // тип textbox = текстовое поле
                        //                     name: 'textboxName', // ID, будет использоваться ниже
                        //                     label: 'ID и name текстового поля', // лейбл
                        //                     value: 'comment' // значение по умолчанию
                        //                 },
                        //                 {
                        //                     type: 'textbox', // тип textbox = текстовое поле
                        //                     name: 'multilineName',
                        //                     label: 'Значение текстового поля по умолчанию',
                        //                     value: 'Привет',
                        //                     multiline: true, // большое текстовое поле - textarea
                        //                     minWidth: 300, // минимальная ширина в пикселях
                        //                     minHeight: 100 // минимальная высота в пикселях
                        //                 },
                        //                 {
                        //                     type: 'listbox', // тип listbox = выпадающий список select
                        //                     name: 'listboxName',
                        //                     label: 'Заполнение',
                        //                     'values': [ // значения выпадающего списка
                        //                         {text: 'Обязательное', value: '1'}, // лейбл, значение
                        //                         {text: 'Необязательное', value: '2'}
                        //                     ]
                        //                 }
                        //             ],
                        //             onsubmit: function( e ) { // это будет происходить после заполнения полей и нажатии кнопки отправки
                        //                 editor.insertContent( '[textarea id="' + e.data.textboxName + '" value="' + e.data.multilineName + '" required="' + e.data.listboxName + '"]');
                        //             }
                        //         });
                        //     }
                        // },
                        {
                            text: 'Слайдер с пагинацией',
                            onclick: function() {
                                editor.insertContent('[load_block block="fields_gall_pagination_slider" title="" another-field="for doctor - diplom"][/load_block]');
                            }
                        },
                        {
                            text: 'Слайдер с необязательной цитатой, текстами до и после',
                            onclick: function() {
                                editor.insertContent('[load_block block="fields_slider_with_blockquote" blockquote_bigger="" text="before"]after[/load_block]');
                            }
                        },
                        {
                            text: 'Три слайда с описанием',
                            onclick: function() {
                                editor.insertContent('[load_block block="fields_three_slides_with_description" title=""][/load_block]');
                            }
                        },
                        {
                            text: 'Блок "Преимущества"',
                            onclick: function() {
                                editor.insertContent('[load_block block="fields_advantages" title=""][/load_block]');
                            }
                        },
                        {
                            text: 'Связанные врачи',
                            onclick: function() {
                                editor.insertContent('[load_block block="fields_related-doctors" title=""][/load_block]');
                            }
                        },
                        {
                            text: 'Связаные услуги',
                            onclick: function() {
                                editor.insertContent('[load_block block="fields_related-services" field="services_related"][/load_block]');
                            }
                        },
                        {
                            text: 'Текстовый блок с галереей',
                            onclick: function() {
                                editor.insertContent('[load_block block="fields_text_with_gallery"][/load_block]');
                            }
                        }


                    ]
                },
                {
                    text: 'Использующие атрибуты',
                    menu: [
                        {
                            text: 'Блок текста с цитатой и заголовком на фоне',
                            onclick: function() {
                                editor.insertContent('[load_block block="about_company" title="" accent_text="" background=""]Text[/load_block]');
                            }
                        },
                        {
                            text: 'Блок со свободным контентом',
                            onclick: function() {
                                editor.insertContent('[load_block block="attr_free-content"]Content[/load_block]');
                            }
                        },
                        {
                            text: 'Первый блок с фоном и текстом на всю ширину',
                            onclick: function() {
                                editor.insertContent('[load_block block="attr_1block_full_width_text" title="" background="" sub_text=""][/load_block]');
                            }
                        },
                        {
                            text: 'Блок с видео',
                            onclick: function() {
                                editor.insertContent('[load_block block="attr_video" classes=""]iframe[/load_block]');
                            }
                        },
                        {
                            text: 'Технологии - слайдер',
                            onclick: function() {
                                editor.insertContent('[load_block block="system_technology-slider" title="Технологии в клинике" background-image=""][/load_block]');
                            }
                        },
                        {
                            text: 'Наши специалисты',
                            onclick: function() {
                                editor.insertContent('[load_block block="fields_related-doctors" title="Наши специалисты" specialization=""][/load_block]');
                            }
                        },
                        {
                            text: 'Отзывы - слайдер',
                            onclick: function() {
                                editor.insertContent('[load_block block="system_reviews-slider" title="Отзывы наших клиентов" all-comments="Y" blockquote="Мы заботимся о вашем здоровье на самом высоком уровне и всегда прислушиваемся к вашему мнению и пожеланиям" form="Y"][/load_block]');
                            }
                        },
                        {
                            text: 'Карта - Наши клиники',
                            onclick: function() {
                                editor.insertContent('[load_block block="system_clinics-map" title="Наши клиники" blockquote="Более 25 лет мы дарим красоту и здоровье, оказывая полный спектр медицинских и косметологических услуг!"][/load_block]');
                            }
                        },
                    ]
                },

                {
                    text: 'Статические блоки',
                    menu: [
                        {
                            text: 'Плюсы Никор',
                            onclick: function() {
                                editor.insertContent('[load_block block="static_nikor-pluses"][/load_block]');
                            }
                        }
                    ]
                },

                {
                    text: 'Самостоятельные блоки',
                    menu: [
                        {
                            text: 'Услуги - показать еще',
                            onclick: function() {
                                editor.insertContent('[load_block block="system_services-show-more"][/load_block]');
                            }
                        }
                    ]
                },

                {
                    text: 'Специфические блоки',
                    menu: [
                        {
                            text: 'Страница "Услуга"',
                            menu: [
                                {
                                    text: 'Блок текста с цитатой и заголовком на фоне',
                                    onclick: function() {
                                        editor.insertContent('[load_block block="attr_services-1block" title="" text="" background-image=""][/load_block]');
                                    }
                                },
                                {
                                    text: 'Ссылки на подуслуги с заголовком',
                                    onclick: function() {
                                        editor.insertContent('[load_block block="system_sub-services-links" title="Так же можете узнать и записать на прием <br>по лечению таких болезней как"][/load_block]');
                                    }
                                },
                                {
                                    text: 'Таблица с ценой',
                                    onclick: function() {
                                        editor.insertContent('[load_block block="fields_prices-table" title="Стоимость"][/load_block]');
                                    }
                                }
                            ]
                        },
                        {
                            text: 'Страница "Врача"',
                            menu: [
                                {
                                    text: 'Первый блок',
                                    onclick: function() {
                                        editor.insertContent('[load_block block="attr_doctors-1block"]Text[/load_block]');
                                    }
                                }
                            ]
                        },
                        {
                            text: 'Страница "Никоренок"',
                            menu: [
                                {
                                    text: 'Первый блок',
                                    onclick: function() {
                                        editor.insertContent('[load_block block="attr_1block-nkrnk" title="" sub-title="" img=""][/load_block]');
                                    }
                                }
                            ]
                        },
                    ]
                },

                // {
                //     text: 'Полностью самостоятельные',
                //     menu: [
                //         {
                //             text: 'Слайдер технологий',
                //             onclick: function() {
                //                 editor.insertContent('[load_block block="system_technology-slider" title="" background-image=""][/load_block]');
                //             }
                //         }
                //     ]
                // }

                // { // второй элемент первого выпадающего списка, просто вставляет [misha]
                //     text: 'Шорткод [test_fun]',
                //     onclick: function() {
                //         editor.insertContent('[test_fun]');
                //     }
                // }
            ]
        });
    });
})();