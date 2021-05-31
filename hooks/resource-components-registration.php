<?php

add_action('wp', function () {
    wpcs_foreach_component(function ($component_data) {
        add_action('wp_enqueue_scripts', function ()
        use ($component_data) {
            $component_name = $component_data['name'];

            if ($js = $component_data['js']) {
                wp_register_script($component_name, $js, array(), false, true);
            }

            if ($js = $component_data['js-esm']) {
                wp_register_script($component_name . '-esm', $js, array(), false, true);
            }

            if ($js = $component_data['js-nomodule']) {
                wp_register_script($component_name . '-nomodule', $js, array(), false, true);
            }
        });

        add_action('wp_enqueue_scripts', function ()
        use ($component_data) {
            $component_name = $component_data['name'];

            if ($css = $component_data['css']) {
                wp_register_style($component_name, $css, array(), false);
            }

            if ($css = $component_data['css-async']) {
                wp_register_style($component_name . '-async', $css, array(), false);
            }

            if ($css = $component_data['css-critical']) {
                wp_register_style($component_name . '-critical', $css, array(), false);
            }
        });
    });
});
