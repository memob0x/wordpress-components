<?php

add_action('rest_api_init', function () {
    global $configuration_components;
    global $all_components_scripts;

    $configuration_components = array();
    $all_components_scripts = array();

    wpcs_foreach_component(function ($component_data) {
        global $configuration_components;
        global $all_components_scripts;

        $component_name = $component_data['name'];

        $all_components_scripts[] = array(
            "name" => $component_name,

            "scripts" => $component_data['js']
        );

        $configuration_components[$component_name] = array(
            'template' => $component_data['template'],

            'stylesheets' => $component_data['css']
        );
    });

    // eg. http://localhost/wp-json/wpcs/v1/components/app-foobar
    register_rest_route('wpcs/v1', '/components/(?P<name>(the|app|base)(-[a-z]+)+).(?P<type>(' . WCPT_TYPE_ESM . '|' . WCPT_TYPE_SYSTEMJS . ')).js', array(
        'methods' => 'GET',

        'callback' => function ($data) use ($configuration_components) {
            $configuration = $configuration_components[$data['name']];

            if (!$configuration) {
                return new WP_Error(
                    'rest_no_route',
                    __('No route was found matching the URL and request method.'),
                    array('status' => 404)
                );
            }

            echo json_encode(array());
        }
    ));
});
