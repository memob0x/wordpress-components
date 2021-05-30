<?php

function vwpt_enqueue_resources($paths)
{
    foreach ($paths as $path) {
        foreach (glob($path) as $resource) {
            $filename = basename($resource);

            $regex_extension_css = '/\.' . VWPT_FILE_EXTENSION_CSS . '$/';

            if (preg_match($regex_extension_css, $resource)) {
                wp_enqueue_style(
                    preg_replace($regex_extension_css, '', $filename),

                    vwpt_replace_path_with_uri($resource),

                    array(),

                    VWPT_VERSION
                );
            }

            $regex_extension_js = '/\.' . VWPT_FILE_EXTENSION_JS . '$/';

            if (preg_match($regex_extension_js, $resource)) {
                wp_enqueue_script(
                    preg_replace($regex_extension_js, '', $filename),

                    vwpt_replace_path_with_uri($resource),

                    array(),

                    VWPT_VERSION,

                    true
                );
            }
        }
    }
}
