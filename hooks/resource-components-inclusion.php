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

    $css_critical = array();
    $css_lazy = array();
    $css_rb = array();

    foreach ($components_rendered as $component_name) {
        foreach ($wp_styles->registered as $style) {
            $style_name = $style->handle;
            $style_src = $style->src;

            $is_critical = wpcs_string_contains($style_name, $component_name . '-critical');
            $is_lazy = wpcs_string_contains($style_name, $component_name . '-lazy');

            if ($is_critical) {
                $css_critical[] = $style_src;
            }

            if ($is_lazy) {
                $css_lazy[] = $style_src;
            }

            if (!$is_critical && !$is_lazy && wpcs_string_contains($style_name, $component_name)) {
                $css_rb[] = $style_src;
            }
        }

        foreach ($wp_scripts->registered as $script) {
            $script_name = $script->handle;

            if (wpcs_string_contains($script_name, $component_name)) {
                wp_enqueue_script($script_name);
            }
        }
    }

    foreach (array_merge($css_critical, $css_lazy, $css_rb) as $src) {
        // NOTE: too late to fire wp_enqueue_style, styles would be embedded inside body at this point
        $head_resources_contents .= wpcs_get_style_tag('', '', $src);
    }

    $output_before_tag_end = '</head>';

    $site_contents_stream = str_replace(
        $output_before_tag_end,

        $head_resources_contents . $output_before_tag_end,

        $site_contents_stream
    );

    echo $site_contents_stream;
});
