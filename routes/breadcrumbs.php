<?php

use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Spatie\Permission\Models\Role;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('dashboard'));
});

// Home > Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Dashboard', route('dashboard'));
});

// Home > Dashboard > User Management
Breadcrumbs::for('user-management.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('User Management', route('user-management.users.index'));
});


// Home > Dashboard > User Management > Users
Breadcrumbs::for('user-management.users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('user-management.index');
    $trail->push('Users', route('user-management.users.index'));
});

// Home > Dashboard > User Management > Users > [User]
Breadcrumbs::for('user-management.users.show', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('user-management.users.index');
    $trail->push(ucwords($user->name), route('user-management.users.show', $user));
});

// Home > Dashboard > User Management > Roles
Breadcrumbs::for('user-management.roles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('user-management.index');
    $trail->push('Roles', route('user-management.roles.index'));
});

// Home > Dashboard > User Management > Roles > [Role]
Breadcrumbs::for('user-management.roles.show', function (BreadcrumbTrail $trail, Role $role) {
    $trail->parent('user-management.roles.index');
    $trail->push(ucwords($role->name), route('user-management.roles.show', $role));
});

// Home > Dashboard > User Management > Permission
Breadcrumbs::for('user-management.permissions.index', function (BreadcrumbTrail $trail) {
    $trail->parent('user-management.index');
    $trail->push('Permissions', route('user-management.permissions.index'));
});

// Home > Product Management
Breadcrumbs::for('product.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Products', route('product.index'));
});
Breadcrumbs::for('slider.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Sliders', route('slider.index'));
});
Breadcrumbs::for('tags.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Tags', route('tags.index'));
});
Breadcrumbs::for('category.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Categories', route('category.index'));
});
Breadcrumbs::for('area.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Area', route('area.index'));
});
Breadcrumbs::for('city.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('City', route('city.index'));
});
Breadcrumbs::for('state.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('State', route('state.index'));
});
Breadcrumbs::for('branch.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Branch', route('branch.index'));
});
Breadcrumbs::for('delivery-time.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Delivery Time', route('delivery-time.index'));
});
Breadcrumbs::for('pickup-time.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Pickup Time', route('pickup-time.index'));
});
Breadcrumbs::for('return-refund.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Return & Refund', route('return-refund.index'));
});
Breadcrumbs::for('privacy-policy.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Privacy & Policy', route('privacy-policy.index'));
});
Breadcrumbs::for('term-condition.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Term & Condition', route('term-condition.index'));
});
Breadcrumbs::for('order.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Order', route('order.index'));
});
