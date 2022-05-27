<?php
return [
    'name' => 'Admin',
    'layout' => [
        'is_first_header' => true,
    ],

    'languages' => [
        'ar' => 'AR',
        'en' => 'EN',
    ],
    'sideBar' => [
        'main_logo' => asset('assets/media/logos/logo-1.svg'),
        'menu' => [
            'dashboard' => [
                'type' => 'single',
                'trans_key' => 'global.dashboard',
                'icon' => 'fas fa-tachometer-alt',
                'route' => 'admin.index'
            ],
            'locations' => [
                'type' => 'parent',
                'icon' => 'fas fa-map-marker',
                'roles' => [],
                'trans_key' => 'locations::menu.locations',
                'sub_menus' => [
                    'countries' => [
                        'type' => 'single',
                        'trans_key' => 'locations::menu.countries',
                        'route' => 'countries.index'
                    ],
                    'cities' => [
                        'type' => 'single',
                        'trans_key' => 'locations::menu.cities',
                        'route' => 'cities.index'
                    ],
                    'areas' => [
                        'type' => 'single',
                        'trans_key' => 'locations::menu.areas',
                        'route' => 'areas.index'
                    ],
                    'Clients Addresses' => [
                        'type' => 'single',
                        'trans_key' => 'client::menu.client-addresses',
                        'route' => 'addresses.index'
                    ]
                ]
            ],
            'coupons' => [
                'type' => 'single',
                'trans_key' => 'coupon::menu.coupons',
                'route' => 'coupons.index',
                'icon' => 'fas fa-tag'

            ],
            'products' => [
                'type' => 'parent',
                'icon' => 'fas fa-cheese',
                'trans_key' => 'product::menu.products',
                'sub_menus' => [
                    'Product Category' => [
                        'type' => 'single',
                        'trans_key' => 'product::menu.product_cat',
                        'route' => 'product-category.index'
                    ],
                    'Products' => [
                        'type' => 'single',
                        'trans_key' => 'product::menu.products',
                        'route' => 'products.index'
                    ],
                ]
            ],
            'Vendors and Branches' => [
                'type' => 'parent',
                'icon' => 'fas fa-list',
                'trans_key' => 'vendor::menu.vendors_and_branches',
                'sub_menus' => [
                    'Categories' => [
                        'type' => 'single',
                        'trans_key' => 'vendor::menu.categories',
                        'route' => 'category.index'
                    ],
                    'Vendors' => [
                        'type' => 'single',
                        'trans_key' => 'vendor::menu.vendors',
                        'route' => 'vendor.index'
                    ],
                    'Consultation' => [
                        'type' => 'single',
                        'trans_key' => 'vendor::menu.consultation',
                        'route' => 'consultation.index'
                    ],
                    'Consultation Package' => [
                        'type' => 'single',
                        'trans_key' => 'vendor::menu.consultation packages',
                        'route' => 'consultation-package.index'
                    ],
                    'Branches' => [
                        'type' => 'single',
                        'trans_key' => 'vendor::menu.branches',
                        'route' => 'branch.index'
                    ],
                    'cuisines' => [
                        'type' => 'single',
                        'trans_key' => 'vendor::menu.cuisines',
                        'route' => 'cuisine.index'
                    ]

                ]
            ],
            'orders' => [
                'type' => 'parent',
                'trans_key' => 'order::menu.orders',
                'icon' => 'fas fa-shopping-cart',
                'sub_menus' => [
                    'Statuses' => [
                        'route' => 'status.index',
                        'trans_key' => 'order::menu.order-status'
                    ],
                    'Orders' => [
                        'route' => 'order.index',
                        'trans_key' => 'order::menu.orders',
                    ]
                ]

            ],
            'vehicles' => [
                'type' => 'single',
                'trans_key' => 'drivers::menu.vehicles',
                'route' => 'vehicles.index',
                'icon' => 'fas fa-truck'
            ],
            'trainers' => [
                'type' => 'single',
                'trans_key' => 'trainers::menu.trainers',
                'route' => 'trainer.index',
                'icon' => 'fas fa-user'
            ],
            'user-management' => [
                'type' => 'parent',
                'icon' => 'fas fa-user-cog',
                'trans_key' => 'admin::menu.user-management',
                'sub_menus' => [
                    'roles-and-permissions' => [
                        'type' => 'single',
                        'trans_key' => 'admin::menu.roles-and-permissions',
                        'route' => 'roles-and-permissions.index'
                    ],
                    'users' => [
                        'type' => 'single',
                        'trans_key' => 'admin::menu.users',
                        'route' => 'users.index'
                    ],
                    'drivers' => [
                        'type' => 'single',
                        'trans_key' => 'drivers::menu.drivers',
                        'route' => 'drivers.index'
                    ],
                    'Clients' => [
                        'type' => 'single',
                        'trans_key' => 'client::menu.all-clients',
                        'route' => 'all-clients.index'
                    ]
                ]
            ],
            'ratings' => [
                'type' => 'single',
                'trans_key' => 'rating::menu.ratings',
                'route' => 'ratings.index',
                'icon' => 'fas fa-star'
            ],
            'settings' => [
                'type' => 'single',
                'trans_key' => 'settings::menu.settings',
                'route' => 'settings.index',
                'icon' => 'fas fa-cogs'

            ],
            'ads' => [
                'type' => 'single',
                'trans_key' => 'ads::menu.ads',
                'route' => 'ads.index',
                'icon' => 'fas fa-image'
            ],
            'slides' => [
                'type' => 'single',
                'trans_key' => 'slides::menu.slides',
                'route' => 'slides.index',
                'icon' => 'fas fa-image'

            ],

        ],

    ],
    'customAbilities' => [
        // 'Country' => [
        //     'as' => 'country.',
        //     'abilities' => ['create', 'read', 'update', 'delete']
        // ],
    ],
    'excludedAbilities' => [
        'OrderProductAttribute', 'VendorUser', 'Vendor'
    ],
    'additionalAbilities' => [
        'Product-category' => [
            'as' => 'product-category.',
            'abilities' => ['create', 'read', 'update', 'delete', 'export', 'print']
        ],
        'Roles-and-permissions' => [
            'as' => 'roles-and-permissions.',
            'abilities' => ['create', 'read', 'update', 'delete', 'export', 'print']
        ],
        'Users' => [
            'as' => 'users.',
            'abilities' => ['create', 'read', 'update', 'delete', 'export', 'print']
        ]
    ]
];
