<?php

namespace App\Helpers;

use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Request;

class MenuHelper
{
    /**
     * Category
     * -----------------------------------------------------------------------------------------
     *  [
     *      'is_category' => true,      // required, boolean, default: true
     *      'label' => 'DASHBOARD',     // required, string
     *      'visible' => true,          // optional, boolean, default: true
     *  ]
     *
     * =========================================================================================
     *
     * Item
     * -----------------------------------------------------------------------------------------
     *  [
     *      'label' => 'Dashboard',                         // required, string
     *      'icon' => 'wb-dashboard',                       // required, string
     *      'url' => '',                                    // optional, string,            default: null
     *      'route' => '',                                  // optional, string,            default: null
     *      'action' => '',                                 // optional, string,            default: null
     *      'sub_route_names' => ['home', 'firm_feed'],     // optional, string|array|null, default: null
     *      'sub_route_actions' => ['home', 'firm_feed'],   // optional, string|array|null, default: null
     *      'sub_route_prefixes' => [],                     // optional, string|array|null, default: null
     *      'visible' => true,                              // optional, boolean,           default: true
     *      'info' => 'Info abou this menu',                // optional, string,            default: null
     *  ]
     *
     * Item with sub menu
     * -----------------------------------------------------------------------------------------
     *  [
     *      'label' => 'Dashboard',                         // required, string
     *      'icon' => 'wb-dashboard',                       // required, string
     *      'visible' => true,                              // optional, boolean,           default: true
     *      'sub_menus' => [Item: refer above Item],        // optional, string|array|null, default: null
     *  ]
     *
     */

    public static function getAdminMenu() {
        return [
            [
                'label' => 'Dashboard',
                'icon'  => 'wb-dashboard',
                'route' => 'admin.home',
                'visible' => function () {
                    return true;
                },
            ],
            [
                'label' => 'Invoices',
                'icon'  => 'wb-order',
            ],
            [
                'label' => 'Customers',
                'icon'  => 'wb-users',
                'visible' => false
            ],
            [
                'label' => 'Items',
                'icon'  => 'wb-list',
            ],
            [
                'label' => 'Settings',
                'icon'  => 'wb-settings',
                'sub_menus' => [
                    [
                        'label' => 'General',
                        'visible' => false,
                    ],
                    [
                        'label' => 'Admins',
                        'icon'  => 'fa-users',
                        'route' => 'admin.admins.index',
                    ],
                ]
            ]
        ];
    }

    public static function isActive(Route $route, $menu)
    {
        $route_url          = isset($menu['url']) ? $menu['url'] : null;
        $route_name         = isset($menu['route']) ? $menu['route'] : null;
        $route_action       = isset($menu['action']) ? $menu['action'] : null;
        $sub_route_names    = isset($menu['sub_route_names']) ? $menu['sub_route_names'] : null;
        $sub_route_actions  = isset($menu['sub_route_actions']) ? $menu['sub_route_actions'] : null;
        $sub_route_prefixes = isset($menu['sub_route_prefixes']) ? $menu['sub_route_prefixes'] : null;

//        $sub_route_names    = $sub_route_names      && is_string($sub_route_names)      ? [$sub_route_names]    : $sub_route_names;
//        $sub_route_actions  = $sub_route_actions    && is_string($sub_route_actions)    ? [$sub_route_actions]  : $sub_route_actions;
//        $sub_route_prefixes = $sub_route_prefixes   && is_string($sub_route_prefixes)   ? [$sub_route_prefixes] : $sub_route_prefixes;

        if ($route_url && url($route_url) == Request::url()) return true;

        if ($route_name && $route_name == $route->getName()) return true;

        if ($route_action && $route_action == $route->getAction()) return true;

        $name = $route->getName();
        if (!empty($sub_route_names) && !empty($name)) {
            $sub_route_names = is_array($sub_route_names) ? $sub_route_names : [$sub_route_names];
            if(in_array($name, $sub_route_names))  return true;
        }

        $action = $route->getAction();
        if (!empty($sub_route_actions) && !empty($action)) {
            $sub_route_actions = is_array($sub_route_actions) ? $sub_route_actions : [$sub_route_actions];
            if(in_array($action, $sub_route_actions))  return true;
        }

        $prefix = $route->getPrefix();
        if (!empty($sub_route_prefixes) && !empty($prefix)) {
            $sub_route_prefixes = is_array($sub_route_prefixes) ? $sub_route_prefixes : [$sub_route_prefixes];
            if(in_array($prefix, $sub_route_prefixes))  return true;
        }

        return false;
    }

    public static function setActive(Route $route, $menu, $output = 'active')
    {
        return self::isActive($route, $menu) ? $output : false;
    }

    /**
     * @param array $menu
     * @return string
     */
    public static function getHref($menu) {
        if(isset($menu['route']) && !empty($menu['route'])) {
            return route($menu['route']);
        }

        if(isset($menu['action']) && !empty($menu['action'])) {
            return action($menu['action']);
        }

        if(isset($menu['url']) && !empty($menu['url'])) {
            return url($menu['url']);
        }

        return '#';
    }

    public static function isVisible($menu) {
        return !isset($menu['visible']) || $menu['visible'] === TRUE || ($menu['visible'] instanceof \Closure && call_user_func($menu['visible']));
    }
}
