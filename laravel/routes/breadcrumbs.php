<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

// 基本情報
Breadcrumbs::for('info', function (BreadcrumbTrail $trail) {
    $trail->push('基本情報');
});

// 基本情報　> 店舗情報
Breadcrumbs::for('restaurant_information', function (BreadcrumbTrail $trail) {
    $trail->parent('info');
    $trail->push('店舗情報', route('restaurant_information'));
});
