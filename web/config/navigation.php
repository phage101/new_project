<?php

/**
 * Navigation Menu Configuration
 *
 * Defines the sidebar menu structure for the admin dashboard.
 * The menu is automatically rendered in the sidebar component.
 *
 * Menu Item Structure:
 * [
 *     'type' => 'item'|'group'|'title',  // Type of menu element
 *     'label' => 'Display Name',         // Shown in sidebar
 *     'route' => 'route.name',           // Route name (type: item, group)
 *     'icon' => 'cil-icon-name',         // CoreUI icon CSS class
 *     'badge' => ['color' => 'info', 'text' => 'NEW'],  // Optional badge
 *     'items' => [...]                   // Child items (type: group)
 * ]
 *
 * Types:
 * - 'item': Single link to a route
 * - 'group': Collapsible group with child items
 * - 'title': Section title (no click action)
 *
 * To customize:
 * 1. Add/remove items in this array
 * 2. Use existing route names from routes/web.php
 * 3. Replace icon class with any CoreUI icon (cil-*)
 * 4. Restart development server for changes to take effect
 *
 * CoreUI icons: https://coreui.io/icons/
 * Icon CSS classes format: cil-{icon-name}
 */

return [
    [
        'type' => 'item',
        'label' => 'Dashboard',
        'route' => 'dashboard',
        'icon' => 'cil-speedometer',
        'badge' => ['color' => 'info', 'text' => 'NEW'],
    ],
    [
        'type' => 'title',
        'label' => 'Theme',
    ],
    [
        'type' => 'item',
        'label' => 'Colors',
        'route' => 'theme.colors',
        'icon' => 'cil-drop',
    ],
    [
        'type' => 'item',
        'label' => 'Typography',
        'route' => 'theme.typography',
        'icon' => 'cil-pencil',
    ],
    [
        'type' => 'title',
        'label' => 'Components',
    ],
    [
        'type' => 'group',
        'label' => 'Base',
        'icon' => 'cil-puzzle',
        'items' => [
            ['label' => 'Accordion', 'route' => 'base.accordion'],
            ['label' => 'Breadcrumb', 'route' => 'base.breadcrumbs'],
            ['label' => 'Cards', 'route' => 'base.cards'],
            ['label' => 'Carousel', 'route' => 'base.carousels'],
            ['label' => 'Chip', 'route' => 'base.chip'],
            ['label' => 'Collapse', 'route' => 'base.collapses'],
            ['label' => 'List Group', 'route' => 'base.list-groups'],
            ['label' => 'Navs & Tabs', 'route' => 'base.navs'],
            ['label' => 'Pagination', 'route' => 'base.paginations'],
            ['label' => 'Placeholders', 'route' => 'base.placeholders'],
            ['label' => 'Popovers', 'route' => 'base.popovers'],
            ['label' => 'Progress', 'route' => 'base.progress'],
            ['label' => 'Spinners', 'route' => 'base.spinners'],
            ['label' => 'Tables', 'route' => 'base.tables'],
            ['label' => 'Tabs', 'route' => 'base.tabs'],
            ['label' => 'Tooltips', 'route' => 'base.tooltips'],
        ],
    ],
    [
        'type' => 'group',
        'label' => 'Buttons',
        'icon' => 'cil-cursor',
        'items' => [
            ['label' => 'Buttons', 'route' => 'buttons.buttons'],
            ['label' => 'Button Groups', 'route' => 'buttons.button-groups'],
            ['label' => 'Dropdowns', 'route' => 'buttons.dropdowns'],
        ],
    ],
    [
        'type' => 'group',
        'label' => 'Forms',
        'icon' => 'cil-notes',
        'items' => [
            ['label' => 'Checks & Radios', 'route' => 'forms.checks-radios'],
            ['label' => 'Chip Input', 'route' => 'forms.chip-input'],
            ['label' => 'Floating Labels', 'route' => 'forms.floating-labels'],
            ['label' => 'Form Control', 'route' => 'forms.form-control'],
            ['label' => 'Input Group', 'route' => 'forms.input-group'],
            ['label' => 'Range', 'route' => 'forms.range'],
            ['label' => 'Select', 'route' => 'forms.select'],
            ['label' => 'Layout', 'route' => 'forms.layout'],
            ['label' => 'Validation', 'route' => 'forms.validation'],
        ],
    ],
    [
        'type' => 'item',
        'label' => 'Charts',
        'route' => 'charts.index',
        'icon' => 'cil-chart-pie',
    ],
    [
        'type' => 'group',
        'label' => 'Icons',
        'icon' => 'cil-star',
        'items' => [
            ['label' => 'CoreUI Free', 'route' => 'icons.coreui-icons'],
            ['label' => 'CoreUI Flags', 'route' => 'icons.flags'],
            ['label' => 'CoreUI Brands', 'route' => 'icons.brands'],
        ],
    ],
    [
        'type' => 'group',
        'label' => 'Notifications',
        'icon' => 'cil-bell',
        'items' => [
            ['label' => 'Alerts', 'route' => 'notifications.alerts'],
            ['label' => 'Badges', 'route' => 'notifications.badges'],
            ['label' => 'Modals', 'route' => 'notifications.modals'],
            ['label' => 'Toasts', 'route' => 'notifications.toasts'],
        ],
    ],
    [
        'type' => 'item',
        'label' => 'Widgets',
        'route' => 'widgets.index',
        'icon' => 'cil-calculator',
        'badge' => ['color' => 'info', 'text' => 'NEW'],
    ],
    [
        'type' => 'title',
        'label' => 'Extras',
    ],
    [
        'type' => 'group',
        'label' => 'Pages',
        'icon' => 'cil-star',
        'items' => [
            ['label' => 'Login', 'route' => 'login'],
            ['label' => 'Register', 'route' => 'register'],
        ],
    ],
];
