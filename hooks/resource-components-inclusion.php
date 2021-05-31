<?php

add_action('wp', function () {
    ob_start();
});

add_action('wp_footer', function () {
    global $wp_scripts;
    global $wp_styles;

    $site_contents_stream = ob_get_contents();

    ob_get_clean();

    preg_match_all('/data-component="(.*?)"/m', $site_contents_stream, $components_rendered);

    $head_resources_contents = '';

    $components_rendered = $components_rendered[1];

    $css_critical = '';
    $css_async = '';
    $css_rb = '';

    foreach ($components_rendered as $component_name) {
        foreach ($wp_styles->registered as $style) {
            $style_name = $style->handle;
            $style_src = $style->src;

            $is_critical = wpcs_string_contains($style_name, $component_name . '-critical');
            $is_lazy = wpcs_string_contains($style_name, $component_name . '-lazy');

            if ($is_critical) {
                $style_path = str_replace(get_template_directory_uri(), get_template_directory(), $style_src);
                $style_path = str_replace(get_stylesheet_directory_uri(), get_stylesheet_directory(), $style_path);

                $critical_css = wpcs_get_contents(function () use ($style_path) {
                    include $style_path;
                });

                $css_critical .= '<style type="text/css" data-href="'.$style_src.'">' . $critical_css . '</style>';
            }

            if ($is_lazy) {
                $css_async .= '<link rel="stylesheet" data-href="' . $style_src . '" />';
            }

            if (!$is_critical && !$is_lazy && wpcs_string_contains($style_name, $component_name)) {
                $css_rb .= '<link rel="stylesheet" href="' . $style_src . '" />';
            }
        }

        foreach ($wp_scripts->registered as $script) {
            $script_name = $script->handle;

            if (wpcs_string_contains($script_name, $component_name)) {
                wp_enqueue_script($script_name);
            }
        }
    }

    $head_resources_contents .= $css_critical . $css_rb . $css_async;

    $output_before_tag_end = '</head>';

    $site_contents_stream = str_replace(
        $output_before_tag_end,

        $head_resources_contents . $output_before_tag_end,

        $site_contents_stream
    );

    echo $site_contents_stream;
});
