<?php

add_filter('script_loader_tag', function ($tag, $handle, $src) {
    $basename = basename($src);

    if (
        // trying to match xyz.system.js files
        vwpt_string_contains($basename, '.' . VWPT_TYPE_SYSTEMJS . '.' . VWPT_FILE_EXTENSION_JS)

        ||

        // trying to match system.js library file
        vwpt_string_starts_with($basename, VWPT_TYPE_SYSTEMJS . '.' . VWPT_FILE_EXTENSION_JS)
    ) {
        return '<script type="text/javascript" nomodule src="' . esc_url($src) . '" ></script>';
    }

    // trying to match xyz.esm.js files
    if (vwpt_string_contains($basename, '.' . VWPT_TYPE_ESM . '.' . VWPT_FILE_EXTENSION_JS)) {
        return '<script type="module" src="' . esc_url($src) . '" ></script>';
    }

    return $tag;
}, 10, 3);
