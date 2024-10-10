<?php

namespace App\Admin;

use function Webmozart\Assert\Tests\StaticAnalysis\true;

class MenuProvider
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

    public static function getMenu() {
        return [
            [
                'label' => 'Dashboard',
                'icon'  => 'wb-dashboard',
                'route' => 'admin.home',
                'visible' => function () {
                    return true;
                }
            ],
            [
                'label' => 'Orders',
                'icon'  => 'fa fa-shopping-cart',
                'route' => 'admin.orders.index',
                'sub_route_names' => ['admin.orders.create', 'admin.orders.edit'],
                'visible' => function () {
                    return true;
                }
            ],



        ];
    }
}

