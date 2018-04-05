<?php

return [
    'name' => 'Navigation',
    'resources' => [
        'menus'    => [
            'entityType'    => '\OrmBg\Modules\Navigation\Entities\Menu',
            'viewNamespace' => 'admin.modules.navigation.menus',
            'routePath'     => '/admin/navigation/menus',
            'requestClass'  => '\OrmBg\Modules\Navigation\Http\Requests\MenusRequest'
        ]
    ]
];
