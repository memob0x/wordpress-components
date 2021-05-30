<?php

add_filter('script_loader_tag', function ($tag, $handle, $src) {
    $basename = basename($src);

    if (
        // trying to match xyz.system.js files
        wcpt_string_contains($basename, '.' . WCPT_TYPE_SYSTEMJS . '.' . WCPT_FILE_EXTENSION_JS)

        ||

        // trying to match system.js library file
        wcpt_string_starts_with($basename, WCPT_TYPE_SYSTEMJS . '.' . WCPT_FILE_EXTENSION_JS)
    ) {
        return '<script type="text/javascript" nomodule src="' . esc_url($src) . '" ></script>';
    }

    // trying to match xyz.esm.js files
    if (wcpt_string_contains($basename, '.' . WCPT_TYPE_ESM . '.' . WCPT_FILE_EXTENSION_JS)) {
        return '<script type="module" src="' . esc_url($src) . '" ></script>';
    }

    return $tag;
}, 10, 3);
