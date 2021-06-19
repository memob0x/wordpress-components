<?php

add_action('wp', function () {
    wpcs_foreach_component(function ($component_data) {
        add_action('wp_enqueue_scripts', function ()
        use ($component_data) {
            foreach ( $component_data['js'] as $js) {
                wp_register_script(preg_replace('/.js$/', '', basename($js)), $js, array(), false, true);
            }
        });

        add_action('wp_enqueue_scripts', function ()
        use ($component_data) {
            foreach ($component_data['css'] as $css) {
                wp_register_style(preg_replace('/.css$/', '', basename($css)), $css, array(), false);
            }
        });
    });
});
