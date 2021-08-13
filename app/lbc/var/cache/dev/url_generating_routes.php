<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    'options_all' => [[], ['_controller' => 'App\\Controller\\CategoryOptionController::optionsAll'], [], [['text', '/api/v1/options/']], [], []],
    'category_all' => [[], ['_controller' => 'App\\Controller\\ProductCategoryController::categoryAll'], [], [['text', '/api/v1/category/']], [], []],
    'product_all' => [[], ['_controller' => 'App\\Controller\\ProductController::productAll'], [], [['text', '/api/v1/product/']], [], []],
    'product_search' => [['search'], ['_controller' => 'App\\Controller\\ProductController::productSearch'], [], [['variable', '/', '[^/]++', 'search', true], ['text', '/api/v1/product/search']], [], []],
    'product_by_id' => [['id'], ['_controller' => 'App\\Controller\\ProductController::productById'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/v1/product']], [], []],
    'product_create' => [[], ['_controller' => 'App\\Controller\\ProductController::productCreate'], [], [['text', '/api/v1/product/']], [], []],
    'product_update' => [['id'], ['_controller' => 'App\\Controller\\ProductController::productUpdate'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/v1/product']], [], []],
    'product_delete' => [['id'], ['_controller' => 'App\\Controller\\ProductController::productDelete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/v1/product']], [], []],
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], []],
];