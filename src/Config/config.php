<?php

return [
    'name' => 'Navigation',
    'resources' => [
        'menus'    => [
            'entityType'    => '\IA\LaravelNavigation\Entities\Menu',
            'viewNamespace' => 'admin.modules.navigation.menus',
            'routePath'     => '/admin/navigation/menus',
            'requestClass'  => '\IA\LaravelNavigation\Http\Requests\MenusRequest'
        ]
    ]
];
