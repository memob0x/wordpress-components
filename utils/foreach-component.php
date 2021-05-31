<?php

function wpcs_foreach_component($callable)
{
    if (!is_callable($callable)) {
        return;
    }

    $globs = array_merge(
        glob(get_template_directory() . '/components/*'),

        glob(get_stylesheet_directory() . '/components/*')
    );

    foreach ($globs as $path) {
        $component_name = basename($path);

        $uri = str_replace(get_template_directory(), get_template_directory_uri(), $path);
        $uri = str_replace(get_stylesheet_directory(), get_stylesheet_directory_uri(), $uri);

        $callable(array(
            'name' => $component_name,

            'js' => file_exists($path . '/' . $component_name . '.js') ? $uri . '/' . $component_name . '.js' : null,

            'js-esm' => file_exists($path . '/' . $component_name . '.esm.js') ? $uri . '/' . $component_name . '.esm.js' : null,

            'js-nomodule' => file_exists($path . '/' . $component_name . '.nomodule.js') ? $uri . '/' . $component_name . '.nomodule.js' : null,

            'css' => file_exists($path . '/' . $component_name . '.css') ? $uri . '/' . $component_name . '.css' : null,

            'css-async' => file_exists($path . '/' . $component_name . '.async.css') ? $uri . '/' . $component_name . '.async.css' : null,

            'css-critical' => file_exists($path . '/' . $component_name . '.critical.css') ? $uri . '/' . $component_name . '.critical.css' : null
        ));
    }
}
