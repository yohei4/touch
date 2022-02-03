<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('ホーム', route('home'));
});

// 品書き
Breadcrumbs::for('list', function (BreadcrumbTrail $trail) {
    $trail->push('品書き');
});

// 基本情報
Breadcrumbs::for('info', function (BreadcrumbTrail $trail) {
    $trail->push('基本情報');
});

// 品書き > 商品一覧
Breadcrumbs::for('food_list', function (BreadcrumbTrail $trail) {
    $trail->parent('list');
    $trail->push('商品一覧', route('food_list'));
});


// 基本情報　> 店舗情報
Breadcrumbs::for('restaurant_information', function (BreadcrumbTrail $trail) {
    $trail->parent('info');
    $trail->push('店舗情報', route('restaurant_information'));
});
