<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Конфигурация пользователя
    |--------------------------------------------------------------------------
    |
    | Здесь вы можете указать конфигурацию пользователя Voyager
    |
    */

    'user' => [
        'add_default_role_on_register' => true,
        'default_role'                 => 'user',
        'default_avatar'               => 'users/default.png',
        'redirect'                     => '/admin',
    ],

    /*
    |--------------------------------------------------------------------------
    | Конфигурация контроллеров
    |--------------------------------------------------------------------------
    |
    | Здесь вы можете указать настройки контроллеров Voyager
    |
    */

    'controllers' => [
        'namespace' => 'TCG\\Voyager\\Http\\Controllers',
    ],

    /*
    |--------------------------------------------------------------------------
    | Конфигурация моделей
    |--------------------------------------------------------------------------
    |
    | Здесь вы можете указать пространство имен моделей по умолчанию при создании BREAD.
    | Должно включать обратные слеши в конце. Если не определено, будет использовано
    | пространство имен приложения по умолчанию.
    |
    */

    'models' => [
        'namespace' => 'App\\Models\\',
    ],

    /*
    |--------------------------------------------------------------------------
    | Конфигурация хранилища
    |--------------------------------------------------------------------------
    |
    | Здесь вы можете указать атрибуты, связанные с файловой системой вашего приложения
    |
    */

    'storage' => [
        'disk' => 'public',
    ],

    /*
    |--------------------------------------------------------------------------
    | Менеджер медиафайлов
    |--------------------------------------------------------------------------
    |
    | Здесь вы можете указать, может ли менеджер медиафайлов показывать скрытые файлы, такие как (.gitignore)
    |
    */

    'hidden_files' => false,

    /*
    |--------------------------------------------------------------------------
    | Конфигурация базы данных
    |--------------------------------------------------------------------------
    |
    | Здесь вы можете указать настройки базы данных Voyager
    |
    */

    'database' => [
        'tables' => [
            'hidden' => ['migrations', 'data_rows', 'data_types', 'menu_items', 'password_resets', 'permission_role', 'personal_access_tokens', 'settings'],
        ],
        'autoload_migrations' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Конфигурация многоязычности
    |--------------------------------------------------------------------------
    |
    | Здесь вы можете указать, хотите ли вы, чтобы Voyager поставлялся с поддержкой
    | многоязычия и какие локали включены.
    |
    */

    'multilingual' => [
        /*
         * Установите, поддерживается ли многоязычие BREAD input.
         */
        'enabled' => false,

        /*
         * Выберите язык по умолчанию
         */
        'default' => 'ru',

        /*
         * Выберите поддерживаемые языки.
         */
        'locales' => [
            'ru',
            //'pt',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Конфигурация панели управления
    |--------------------------------------------------------------------------
    |
    | Здесь вы можете изменить некоторые аспекты вашей панели управления
    |
    */

    'dashboard' => [
        // Добавить пользовательские элементы списка в выпадающем меню панели навигации
        'navbar_items' => [
            'voyager::generic.profile' => [
                'route'      => 'voyager.profile',
                'classes'    => 'class-full-of-rum',
                'icon_class' => 'voyager-person',
            ],
            'voyager::generic.home' => [
                'route'        => '/',
                'icon_class'   => 'voyager-home',
                'target_blank' => true,
            ],
            'voyager::generic.logout' => [
                'route'      => 'voyager.logout',
                'icon_class' => 'voyager-power',
            ],
        ],

        'widgets' => [

        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Автоматические процедуры
    |--------------------------------------------------------------------------
    |
    | Когда что-то меняется в Voyager, мы можем автоматизировать некоторые рутины.
    |
    */

    'bread' => [
        // Когда BREAD добавляется, создайте элемент меню, используя свойства BREAD.
        'add_menu_item' => true,

        // в какое меню добавить элемент
        'default_menu' => 'admin',

        // Когда BREAD добавляется, создайте связанное разрешение.
        'add_permission' => true,

        // к какой роли добавить разрешения
        'default_role' => 'admin',
    ],

    /*
    |--------------------------------------------------------------------------
    | Общие настройки пользовательского интерфейса
    |--------------------------------------------------------------------------
    |
    | Здесь вы можете изменить некоторые настройки пользовательского интерфейса Voyager.
    |
    */

    'primary_color' => '#22A7F0',

    'show_dev_tips' => true, // Показывать советы по разработке "Как использовать:" в меню и настройках

// Здесь вы можете указать дополнительные ресурсы, которые вы хотели бы включить в master.blade
    'additional_css' => [
        //'css/custom.css',
    ],

    'additional_js' => [
        //'js/custom.js',
    ],

    'googlemaps' => [
        'key'    => env('GOOGLE_MAPS_KEY', ''),
        'center' => [
            'lat' => env('GOOGLE_MAPS_DEFAULT_CENTER_LAT', '32.715738'),
            'lng' => env('GOOGLE_MAPS_DEFAULT_CENTER_LNG', '-117.161084'),
        ],
        'zoom' => env('GOOGLE_MAPS_DEFAULT_ZOOM', 11),
    ],

    /*
    |--------------------------------------------------------------------------
    | Настройки для конкретной модели
    |--------------------------------------------------------------------------
    |
    | Здесь вы можете изменить некоторые настройки для конкретной модели
    |
    */

    'settings' => [
        // Включает метод кэширования Laravel для
        // хранения значений кэша между запросами
        'cache' => false,
    ],

// Активировать компас, когда среда НЕ локальная
    'compass_in_production' => false,

    'media' => [
        // Разрешенные MIME-типы для загрузки через менеджер медиафайлов.
        // 'allowed_mimetypes' => '*', // Все типы можно загружать
        'allowed_mimetypes' => [
            'image/jpeg',
            'image/png',
            'image/gif',
            'image/bmp',
            'video/mp4',
        ],
        // Путь для менеджера медиафайлов. Относительно файловой системы.
        'path'                => '/',
        'show_folders'        => true,
        'allow_upload'        => true,
        'allow_move'          => true,
        'allow_delete'        => true,
        'allow_create_folder' => true,
        'allow_rename'        => true,
        /*'watermark'           => [
            'source'         => 'watermark.png',
            'position'       => 'bottom-left',
            'x'              => 0,
            'y'              => 0,
            'size'           => 15,
       ],
       'thumbnails'          => [
           [
                'type'  => 'fit',
                'name'  => 'fit-500',
                'width' => 500,
                'height'=> 500
           ],
       ]*/
    ],

];