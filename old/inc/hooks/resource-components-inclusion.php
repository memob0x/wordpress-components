<?php

add_action('wp', function () {
    ob_start();
});

add_action('wp_footer', function () {
    global $wp_scripts;
    global $wp_styles;

    $site_contents_stream = ob_get_contents();

    ob_get_clean();

    ob_start();

    preg_match(
        '/<(the|app|base)\-(.*?)(>|\s)/im',

        $site_contents_stream,

        $components_rendered
    );

    $components_configuration = array();

    $head_resources_contents = '';

    foreach ($components_rendered as $component_rendered) {
        $rendered_components_name = preg_replace('/<|>|\s/', '', $component_rendered);

        foreach ($wp_styles->registered as $style) {
            $component_resource_name = $rendered_components_name . WCPT_NAME_SUFFIX_CRITICAL;

            if ($style->handle !== $component_resource_name) {
                continue;
            }

            $style_src = $style->src;

            $style_path = wpcs_replace_uri_with_path($style_src);

            $critical_css = wpcs_get_contents(function () use ($style_path) {
                include $style_path;
            });

            $head_resources_contents .= '<style'
                . ' id="' . $component_resource_name . '-css"'
                . ' data-href="' . $style_src . '">'
                . $critical_css
                . '</style>';
        }

        foreach ($wp_scripts->registered as $script) {
            if ($script->handle !== $rendered_components_name) {
                continue;
            }

            $components_configuration[] = array(
                "name" => $rendered_components_name,

                "url" => $script->src
            );
        }
    }

    $output_before_tag_end = '</head>';

    $site_contents_stream = str_replace(
        $output_before_tag_end,

        $head_resources_contents . $output_before_tag_end,

        $site_contents_stream
    );

    echo $site_contents_stream;
});

add_action('wp_print_footer_scripts', function () {
    $site_contents_stream = ob_get_contents();

    ob_get_clean();

    echo preg_replace(
        '/<!doctype(.*?)>/i',

        '${0}<!--v' . WCPT_VERSION . '-->',

        wpcs_get_html_string_minified($site_contents_stream)
    );
});
