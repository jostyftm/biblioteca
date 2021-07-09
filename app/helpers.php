<?php

if(!function_exists('activeMenu')) {
    function activeMenu($prefixRoute) {

        $route = request()->route()->getName();
        $prefix = explode('.', $route)[0];

        return ($prefix == $prefixRoute) ? 'active' : '';
    }
}