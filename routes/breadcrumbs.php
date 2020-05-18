<?php

use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator as BC;

Breadcrumbs::for('admin', function (BC $trail){
    $trail->push('Home', route('admin'));
});

Breadcrumbs::for('admin.categories.index', function (BC $trail){
    $trail->parent('admin');
    $trail->push('Categories', route('admin.categories.index'));
});

Breadcrumbs::for('admin.categories.create', function (BC $trail){
    $trail->parent('admin.categories.index');
    $trail->push('Create', route('admin.categories.create'));
});

Breadcrumbs::for('admin.categories.edit', function (BC $trail, $category){
    $trail->parent('admin.categories.index');
    $trail->push('Edit: '.$category->title, route('admin.categories.edit', $category->id));
});

Breadcrumbs::for('admin.tags.index', function (BC $trail){
    $trail->parent('admin');
    $trail->push('Tags', route('admin.categories.index'));
});

Breadcrumbs::for('admin.tags.edit', function (BC $trail, $tag){
    $trail->parent('admin.tags.index');
    $trail->push('Edit: '.$tag->title, route('admin.categories.edit', $tag->id));
});

Breadcrumbs::for('admin.tags.create', function (BC $trail){
    $trail->parent('admin.tags.index');
    $trail->push('Create', route('admin.categories.create'));
});

Breadcrumbs::for('admin.users.index', function (BC $trail){
    $trail->parent('admin');
    $trail->push('Users', route('admin.users.index'));
});

Breadcrumbs::for('admin.users.create', function (BC $trail){
    $trail->parent('admin.users.index');
    $trail->push('Create', route('admin.users.create'));
});

Breadcrumbs::for('admin.users.edit', function (BC $trail, $user){
    $trail->parent('admin.users.index');
    $trail->push('Edit: '.$user->name, route('admin.users.create', $user->id));
});

Breadcrumbs::for('admin.posts.index', function (BC $trail){
    $trail->parent('admin');
    $trail->push('Posts', route('admin.posts.index'));
});

Breadcrumbs::for('admin.posts.create', function (BC $trail){
    $trail->parent('admin.posts.index');
    $trail->push('Create', route('admin.posts.create'));
});

Breadcrumbs::for('admin.posts.edit', function (BC $trail, $post){
    $trail->parent('admin.posts.index');
    $trail->push('Edit: '.$post->title, route('admin.posts.edit', $post->id));
});

Breadcrumbs::for('admin.comments.index', function (BC $trail){
    $trail->parent('admin');
    $trail->push('Comments', route('admin.comments.index'));
});

Breadcrumbs::for('admin.subscribers.index', function (BC $trail){
    $trail->parent('admin');
    $trail->push('Subscribers', route('admin.subscribers.index'));
});

Breadcrumbs::for('admin.subscribers.create', function (BC $trail){
    $trail->parent('admin.subscribers.index');
    $trail->push('Create', route('admin.subscribers.create'));
});
