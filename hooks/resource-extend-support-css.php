<?php

function wpcs_get_style_tag ($tag, $handle, $src) {
    $basename = basename($src);
    $esc_url = esc_url($src);

    if (wpcs_string_contains($basename, '.critical.css')) {
        $style_path = str_replace(get_template_directory_uri(), get_template_directory(), $esc_url);
        $style_path = str_replace(get_stylesheet_directory_uri(), get_stylesheet_directory(), $style_path);

        $style_path = preg_replace('/\.css\?.*/', '.css', $style_path);

        $critical_css = wpcs_get_contents(function () use ($style_path) {
            include $style_path;
        });

        return '<style type="text/css" data-href="' . $esc_url . '">' . $critical_css . '</style>';
    }

    if (wpcs_string_contains($basename, '.lazy.css')) {
        return '<link rel="stylesheet" data-href="' . $esc_url . '" type="text/css" media="all" />';
    }

    return $tag;
};

add_filter('style_loader_tag', 'wpcs_get_style_tag', 10, 3);
