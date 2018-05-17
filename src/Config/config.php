<?php

return [
    'name' => 'Navigation',
    'resources' => [
        'menus'    => [
            'entityType'    => '\IA\Laravel\Modules\Navigation\Entities\Menu',
            'viewNamespace' => 'admin.modules.navigation.menus',
            'routePath'     => '/admin/navigation/menus',
            'requestClass'  => '\IA\Laravel\Modules\Navigation\Http\Requests\MenusRequest'
        ]
    ]
];
