<?php

function wpcs_get_script_tag ($tag, $handle, $src) {
    $basename = basename($src);
    $esc_url = esc_url($src);

    if (wpcs_string_contains($basename, '.esm.js')) {
        return '<script type="module" src="' . $esc_url . '" ></script>';
    }

    if (wpcs_string_contains($basename, '.nomodule.js')) {
        return '<script type="text/javascript" nomodule src="' . $esc_url . '" ></script>';
    }

    return $tag;
};

add_filter('script_loader_tag', 'wpcs_get_script_tag', 10, 3);
