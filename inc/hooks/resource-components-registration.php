<?php

add_action('wp', function () {
    wcpt_foreach_component(function ($component_data) {
        add_action('wp_enqueue_scripts', function ()
        use ($component_data) {
            foreach ($component_data['js'] as $javascript) {
                wp_register_script($javascript['name'], $javascript['url'], array(), WCPT_VERSION, true);
            }
        });

        add_action('wp_enqueue_scripts', function ()
        use ($component_data) {
            foreach ($component_data['css'] as $stylesheet) {
                wp_register_style($stylesheet['name'], $stylesheet['url'], array(), WCPT_VERSION);
            }
        });
    });
});
