<?php

add_action('rest_api_init', function () {
    global $components;

    $components = array();

    wpcs_foreach_component(function ($component) {
        global $components;

        $components[$component['name']] = $component;
    });

    // http://localhost/wp-json/wpcs/v1/components
    register_rest_route('wpcs/v1', '/components', array(
        'methods' => 'GET',

        'callback' => function () use ($components) {
            echo json_encode(array_keys($components));
        }
    ));

    // http://localhost/wp-json/wpcs/v1/components/component
    register_rest_route('wpcs/v1', '/components/(?P<name>([a-zA-Z-]+))', array(
        'methods' => 'GET',

        'callback' => function ($data) use ($components) {
            $configuration = $components[$data['name']];

            if (!$configuration) {
                return new WP_Error(
                    'rest_no_route',

                    __('No route was found matching the URL and request method.'),

                    array('status' => 404)
                );
            }

            echo json_encode($configuration);
        }
    ));
});
