<?php

function wcpt_foreach_component($callable)
{
    if (!is_callable($callable)) {
        return;
    }

    $path_components = '/*/' . WCPT_NAME_COMPONENTS_TEMPLATE . '.' . WCPT_FILE_EXTENSION_COMPONENTS_TEMPLATE;

    $globs = array_merge(
        glob(WCPT_PATH_PARENT_THEME_SRC_COMPONENTS . $path_components),

        glob(WCPT_PATH_CURRENT_THEME_SRC_COMPONENTS . $path_components)
    );

    foreach ($globs as $template_file_path) {
        $component_name = basename(dirname($template_file_path));

        $component_path_src = dirname($template_file_path);

        $component_path_dist = wcpt_replace_src_with_dist($component_path_src);

        $supported_js = array();
        $supported_css = array();

        $component_js_system_file_path = $component_path_dist . '/' . WCPT_NAME_COMPONENTS_JAVASCRIPT . '.' . WCPT_TYPE_SYSTEMJS . '.' . WCPT_FILE_EXTENSION_JS;

        if (file_exists($component_js_system_file_path)) {
            $supported_js[] = array(
                'name' => $component_name . WCPT_TYPE_SYSTEMJS,
                'path' => $component_js_system_file_path,
                'url' => wcpt_replace_path_with_uri($component_js_system_file_path)
            );
        }

        $component_js_esm_file_path = $component_path_dist . '/' . WCPT_NAME_COMPONENTS_JAVASCRIPT . '.' . WCPT_TYPE_ESM . '.' . WCPT_FILE_EXTENSION_JS;

        if (file_exists($component_js_esm_file_path)) {
            $supported_js[] = array(
                'name' => $component_name . WCPT_TYPE_ESM,
                'path' => $component_js_esm_file_path,
                'url' => wcpt_replace_path_with_uri($component_js_esm_file_path)
            );
        }

        $component_css_file_path = $component_path_dist . '/' . WCPT_NAME_COMPONENTS_STYELSHEET . '.' . WCPT_FILE_EXTENSION_CSS;

        if (file_exists($component_css_file_path)) {
            $supported_css[] = array(
                'name' => $component_name,
                'path' => $component_css_file_path,
                'url' => wcpt_replace_path_with_uri($component_css_file_path)
            );
        }

        $component_css_critical_file_path = $component_path_dist . '/' . WCPT_NAME_COMPONENTS_STYLESHEET_CRITICAL . '.' . WCPT_FILE_EXTENSION_CSS;

        if (file_exists($component_css_critical_file_path)) {
            $supported_css[] = array(
                'name' => $component_name . WCPT_NAME_SUFFIX_CRITICAL,
                'path' => $component_css_critical_file_path,
                'url' => wcpt_replace_path_with_uri($component_css_critical_file_path)
            );
        }

        $template_file_contents = '';

        if (file_exists($template_file_path)) {
            $template_file_contents = wcpt_get_template_part_contents($template_file_path);
        }

        $callable(array(
            'name' => $component_name,

            'js' => $supported_js,

            'css' => $supported_css,

            'template' => $template_file_contents
        ));
    }
}
