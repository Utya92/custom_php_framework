<?php
include('src/init.php');
$app->header();

$app->pager->addString('<title>EPAM</title>');
$app->pager->addCss("https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css");
$app->includeComponent('myNews', 'default', ['h1' => "Project history"]);
//$app->pager->setProperty("mockHeader", "BODYHEADER");
$app->pager->setProperty("mockFooter", "Footer");
$app->includeComponent('form', 'default',
    [
        'test_class' => 'window--full-form', //доп класс на контейнер
        'attr' => [  // доп атрибуты
            'data-form-id' => 'form-123'
        ],
        'method' => 'post',
        'action' => 'handler.php', //url отправки
        'elements' => [  //список элементов формы
            [
                'type' => 'text',
                'name' => 'login',
                'class' => 'form-control',
                'multiple' => true,
                'attr' => [
                    'data-id' => '17'
                ],
                'title' => 'Логин',
                'default' => 'Введите имя',
                'placeholder' => 'Enter your name'
            ],
            [
                'type' => 'password',
                'name' => 'password',
                'class' => "form-control",
                'title' => 'пароль',
                'placeholder' => 'Enter your password'
            ],

            [
                'type' => 'select',
                'name' => 'server',
                'class' => 'form-select form-select-lg mb-3',
                'multiple' => true,
                'attr' => [
                    'data-id' => '17'
                ],

                'title' => 'Выберите сервер',
                'list' => [
                    [
                        'title' => 'Онлайнер',
                        'value' => 'onliner',
                        'class' => 'mini--option',
                        'attr' => [
                            'data-id' => '188'
                        ],
                        'selected' => true
                    ],
                    [
                        'title' => 'Тутбай',
                        'value' => 'tut.by(rip)',
                    ]
                ]
            ],
            [
                'type' => 'select',
                'name' => 'server',
                'class' => 'form-select',
                'multiple' => false,
                'attr' => [
                    'data-id' => '17'
                ],

                'title' => 'Выберите сервер',
                'list' => [
                    [
                        'title' => 'Онлайнер',
                        'value' => 'onliner',
                        'class' => 'mini--option',
                        'attr' => [
                            'data-id' => '188'
                        ],
                        'selected' => true
                    ],
                    [
                        'title' => 'Тутбай',
                        'value' => 'tut.by(rip)',
                    ]
                ]
            ],
            [
                'type' => 'textarea',
                'class' => 'form-control',
                'cols' => '5',
                'rows' => '10',
                'attr' => [
                    'id' => '1234'
                ]
            ],
            [
                'type' => 'checkbox',
                'name' => 'login',
                'class' => 'form-check-input',
                'multiple' => true,
                'attr' => [
                    'data-id' => '17'
                ],
                'title' => 'Логин'
            ], [
                'type' => 'checkbox',
                'name' => 'login',
                'class' => 'form-check-input',
                'multiple' => false,
                'attr' => [
                    'data-id' => '17'
                ],
                'title' => 'Логин'
            ],
            [
                'type' => 'radio',
                'name' => 'login',
                'class' => 'form-check-input',
                'multiple' => true,
                'attr' => [
                    'data-id' => '17'
                ],
                'title' => 'Логин'
            ],

        ]
    ]
);

$app->footer();
?>