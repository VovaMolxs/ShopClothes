<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use App\Models\Categories;
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('index', function (BreadcrumbTrail $trail): void {
    $trail->push('Главная', route('index'));
});

Breadcrumbs::for('basket', function (BreadcrumbTrail $trail): void {
    $trail->parent('index');
    $trail->push('Корзина', route('basket'));
});

Breadcrumbs::for('catalog', function (BreadcrumbTrail $trail): void {
    $trail->parent('index');
    $trail->push('Каталог', route('catalog'));
});

Breadcrumbs::for('catalog.slug', function (BreadcrumbTrail $trail, Categories $categories) {
    $trail->parent('catalog');


    $trail->push($categories->title, route('catalog.slug', $categories));
});
