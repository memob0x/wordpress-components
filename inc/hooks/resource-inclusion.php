<?php

add_action('wp_enqueue_scripts', function () {
    $js_path_resource = '/*.'.VWPT_FILE_EXTENSION_JS;
    $css_path_resource = '/*.'.VWPT_FILE_EXTENSION_CSS;

    vwpt_enqueue_resources(array(
        VWPT_PATH_PARENT_THEME_DIST_GLOBALS . $js_path_resource,
        VWPT_PATH_PARENT_THEME_DIST_GLOBALS . $css_path_resource,

        VWPT_PATH_CURRENT_THEME_DIST_GLOBALS . $js_path_resource,
        VWPT_PATH_CURRENT_THEME_DIST_GLOBALS . $css_path_resource,

        VWPT_PATH_PARENT_THEME_DIST . $js_path_resource,
        VWPT_PATH_PARENT_THEME_DIST . $css_path_resource,

        VWPT_PATH_CURRENT_THEME_DIST . $js_path_resource,
        VWPT_PATH_CURRENT_THEME_DIST . $css_path_resource
    ));
});
