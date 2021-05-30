<?php

function wcpt_enqueue_resources($paths)
{
    foreach ($paths as $path) {
        foreach (glob($path) as $resource) {
            $filename = basename($resource);

            $regex_extension_css = '/\.' . WCPT_FILE_EXTENSION_CSS . '$/';

            if (preg_match($regex_extension_css, $resource)) {
                wp_enqueue_style(
                    preg_replace($regex_extension_css, '', $filename),

                    wcpt_replace_path_with_uri($resource),

                    array(),

                    WCPT_VERSION
                );
            }

            $regex_extension_js = '/\.' . WCPT_FILE_EXTENSION_JS . '$/';

            if (preg_match($regex_extension_js, $resource)) {
                wp_enqueue_script(
                    preg_replace($regex_extension_js, '', $filename),

                    wcpt_replace_path_with_uri($resource),

                    array(),

                    WCPT_VERSION,

                    true
                );
            }
        }
    }
}
