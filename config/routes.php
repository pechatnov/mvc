<?
return array(
    //'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2',
    'news/([0-9]+)' => 'news/view/$1', //actionVIew in NewsController
    'news' => 'news/index', //actionIndex in NewsController
    'products' => 'products/list', //actionList in ProductController
);