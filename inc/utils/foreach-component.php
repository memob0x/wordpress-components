<?php

function foreach_component($callable)
{
    if (!is_callable($callable)) {
        return;
    }

    $path_components = '/*/' . VWPT_NAME_COMPONENTS_TEMPLATE . '.' . VWPT_FILE_EXTENSION_COMPONENTS_TEMPLATE;

    $globs = array_merge(
        glob(VWPT_PATH_PARENT_THEME_SRC_COMPONENTS . $path_components),

        glob(VWPT_PATH_CURRENT_THEME_SRC_COMPONENTS . $path_components)
    );

    foreach ($globs as $template_file_path) {
        $component_name = basename(dirname($template_file_path));

        $component_path_src = dirname($template_file_path);

        $component_path_dist = vwpt_replace_src_with_dist($component_path_src);

        $supported_js = array();
        $supported_css = array();

        $component_js_system_file_path = $component_path_dist . '/' . VWPT_NAME_COMPONENTS_JAVASCRIPT . '.' . VWPT_TYPE_SYSTEMJS . '.' . VWPT_FILE_EXTENSION_JS;

        if (file_exists($component_js_system_file_path)) {
            $supported_js[] = array(
                'name' => $component_name . VWPT_TYPE_SYSTEMJS,
                'path' => $component_js_system_file_path,
                'url' => vwpt_replace_path_with_uri($component_js_system_file_path)
            );
        }

        $component_js_esm_file_path = $component_path_dist . '/' . VWPT_NAME_COMPONENTS_JAVASCRIPT . '.' . VWPT_TYPE_ESM . '.' . VWPT_FILE_EXTENSION_JS;

        if (file_exists($component_js_esm_file_path)) {
            $supported_js[] = array(
                'name' => $component_name . VWPT_TYPE_ESM,
                'path' => $component_js_esm_file_path,
                'url' => vwpt_replace_path_with_uri($component_js_esm_file_path)
            );
        }

        $component_css_file_path = $component_path_dist . '/' . VWPT_NAME_COMPONENTS_STYELSHEET . '.' . VWPT_FILE_EXTENSION_CSS;

        if (file_exists($component_css_file_path)) {
            $supported_css[] = array(
                'name' => $component_name,
                'path' => $component_css_file_path,
                'url' => vwpt_replace_path_with_uri($component_css_file_path)
            );
        }

        $component_css_critical_file_path = $component_path_dist . '/' . VWPT_NAME_COMPONENTS_STYLESHEET_CRITICAL . '.' . VWPT_FILE_EXTENSION_CSS;

        if (file_exists($component_css_critical_file_path)) {
            $supported_css[] = array(
                'name' => $component_name . VWPT_NAME_SUFFIX_CRITICAL,
                'path' => $component_css_critical_file_path,
                'url' => vwpt_replace_path_with_uri($component_css_critical_file_path)
            );
        }

        $template_file_contents = '';

        if (file_exists($template_file_path)) {
            $template_file_contents = vwpt_get_template_part_contents($template_file_path);
        }

        $callable(array(
            'name' => $component_name,

            'js' => $supported_js,

            'css' => $supported_css,

            'template' => $template_file_contents
        ));
    }
}
