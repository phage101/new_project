<?php

/**
 * Navigation Menu Configuration
 *
 * Defines the sidebar menu structure for the admin dashboard.
 */

return [
    [
        'type'  => 'item',
        'label' => 'Dashboard',
        'route' => 'dashboard',
        'icon'  => 'cil-speedometer',
    ],
    [
        'type'  => 'item',
        'label' => 'Users',
        'route' => 'users.index',
        'icon'  => 'cil-people',
    ],
    [
        'type'  => 'item',
        'label' => 'Audit Trail',
        'route' => 'audit.index',
        'icon'  => 'cil-list',
    ],
];
