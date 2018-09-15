<?
return array(
//    'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2',
//    'news/([0-9]+)' => 'news/view/$1',
//    'news' => 'news/index',
//    'products' => 'products/list',
    'products/([0-9]+)' => 'products/view/$1',
    'catalog' => 'catalog/index',
    'category/([0-9]+)' => 'catalog/category/$1',
    '' => 'site/Index'
);