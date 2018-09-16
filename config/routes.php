<?
return array(
//    'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2',
//    'news/([0-9]+)' => 'news/view/$1',
//    'news' => 'news/index',
//    'products' => 'products/list',
    'products/([0-9]+)' => 'products/view/$1',
    'catalog' => 'catalog/index',
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    'category/([0-9]+)' => 'catalog/category/$1',

    'user/logout' => 'user/logout',
    'user/login' => 'user/login',
    'user/register' => 'user/register',

    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',

    '' => 'site/Index'
);