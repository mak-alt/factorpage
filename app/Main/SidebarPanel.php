<?php

namespace App\Main;


class SidebarPanel
{
    public static function dashboard()
    {
        return [
            'title' => 'Dashboard',
        ];
    }

    public static function templates()
    {
        return [
            'title' => 'Templates',
            'items' => [
                [
                    'choose_template' => [
                        'title' => 'Choose Template',
                        'route_name' => 'template.choose'
                    ],
                ]
            ]
        ];
    }

    public static function case_studies()
    {
        return [
            'title' => 'Case Studies',
            'items' => [
                [
                    'create' => [
                        'title' => 'Create Case Study',
                        'route_name' => 'case-study.create'
                    ],
                    'manage' => [
                        'title' => 'Manage',
                        'route_name' => 'case-study.manage'
                    ]
                ],
            ]
        ];
    }

    public static function all(){
        return [self::dashboard(), self::templates(),self::case_studies()];
    }
}