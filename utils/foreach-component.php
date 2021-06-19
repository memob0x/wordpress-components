<?php

function wpcs_foreach_component($callable)
{
    if (!is_callable($callable)) {
        return;
    }

    $paths = array_merge(
        glob(get_template_directory() . '/components/*'),

        glob(get_stylesheet_directory() . '/components/*')
    );

    foreach ($paths as $path) {
        $component_name = basename($path);

        $js = $css = array();

        $uri = str_replace(get_template_directory(), get_template_directory_uri(), $path);
        $uri = str_replace(get_stylesheet_directory(), get_stylesheet_directory_uri(), $uri);

        $files_css = array_merge(
            glob($path.'/'.$component_name.'.css'),
            glob($path.'/'.$component_name.'.*.css')
        );

        $files_js = array_merge(
            glob($path.'/'.$component_name.'.js'),
            glob($path.'/'.$component_name.'.*.js')
        );

        foreach ( $files_css as $file) {
            $css[] = str_replace($path, $uri, $file);
        }

        foreach ($files_js as $file) {
            $js[] = str_replace($path, $uri, $file);
        }

        $callable(array(
            'name' => $component_name,

            'uri' => $uri,

            'js' => $js,

            'css' => $css
        ));
    }
}
