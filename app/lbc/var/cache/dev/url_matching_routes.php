<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/v1/options' => [[['_route' => 'options_all', '_controller' => 'App\\Controller\\CategoryOptionController::optionsAll'], null, ['GET' => 0], null, true, false, null]],
        '/api/v1/category' => [[['_route' => 'category_all', '_controller' => 'App\\Controller\\ProductCategoryController::categoryAll'], null, ['GET' => 0], null, true, false, null]],
        '/api/v1/product' => [
            [['_route' => 'product_all', '_controller' => 'App\\Controller\\ProductController::productAll'], null, ['GET' => 0], null, true, false, null],
            [['_route' => 'product_create', '_controller' => 'App\\Controller\\ProductController::productCreate'], null, ['POST' => 0], null, true, false, null],
        ],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/api/v1/product/(?'
                    .'|search/([^/]++)(*:41)'
                    .'|([^/]++)(?'
                        .'|(*:59)'
                    .')'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:96)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        41 => [[['_route' => 'product_search', '_controller' => 'App\\Controller\\ProductController::productSearch'], ['search'], ['GET' => 0], null, false, true, null]],
        59 => [
            [['_route' => 'product_by_id', '_controller' => 'App\\Controller\\ProductController::productById'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'product_update', '_controller' => 'App\\Controller\\ProductController::productUpdate'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'product_delete', '_controller' => 'App\\Controller\\ProductController::productDelete'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        96 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
