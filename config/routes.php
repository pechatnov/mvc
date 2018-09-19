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

    'cart/checkout' => 'cart/checkout',
    'cart/del/([0-9]+)' => 'cart/delete/$1',
    'cart/delAjax/([0-9]+)' => 'cart/deleteAjax/$1',
    'cart/add/([0-9]+)' => 'cart/add/$1',
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',
    'cart' => 'cart/index',

    'user/logout' => 'user/logout',
    'user/login' => 'user/login',
    'user/register' => 'user/register',

    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',

    'contacts' => 'site/contacts',

    '' => 'site/Index'
);