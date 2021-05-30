<?php

add_action('rest_api_init', function () {
    global $configuration_components;
    global $all_components_scripts;

    $configuration_components = array();
    $all_components_scripts = array();

    foreach_component(function ($component_data) {
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

    // TODO: use more constants to compose uri
    // TODO: maybe provide filters to allow child theme to customize responses?
    // eg. http://localhost/wp-json/vwpt/v1/components/app-foobar.js
    register_rest_route('vwpt/v1', '/components/(?P<name>(the|app|base)(-[a-z]+)+).(?P<type>(' . VWPT_TYPE_ESM . '|' . VWPT_TYPE_SYSTEMJS . ')).js', array(
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

            send_header_application_javascript();

            echo get_array_encoded_as_javascript_module($configuration, $data['type']);
        }
    ));

    register_rest_route('vwpt/v1', '/vue.(?P<type>(' . VWPT_TYPE_ESM . '|' . VWPT_TYPE_SYSTEMJS . ')).js', array(
        'methods' => 'GET',

        'callback' => function ($data) use ($all_components_scripts) {
            send_header_application_javascript();

            $data_type = $data['type'];

            $available_components_list = array();

            foreach ($all_components_scripts as $component_resources) {
                $component_scripts = $component_resources['scripts'];

                $component_scripts_by_requested_type = array(
                    VWPT_TYPE_ESM => vwpt_array_find($component_scripts, function ($item) {
                        return vwpt_string_contains($item['path'], '.' . VWPT_TYPE_ESM . '.' . VWPT_FILE_EXTENSION_JS);
                    }),

                    VWPT_TYPE_SYSTEMJS => vwpt_array_find($component_scripts, function ($item) {
                        return vwpt_string_contains($item['path'], '.' . VWPT_TYPE_SYSTEMJS . '.' . VWPT_FILE_EXTENSION_JS);
                    })
                );

                $selected_component_script = $component_scripts_by_requested_type[$data_type];
                $selected_component_script = $selected_component_script ? $selected_component_script : $component_scripts_by_requested_type[VWPT_TYPE_SYSTEMJS];

                if (!$selected_component_script) {
                    continue;
                }

                $available_components_list[] = array(
                    'name' => $component_resources['name'],
                    'url' => $selected_component_script['url']
                );
            }

            echo get_array_encoded_as_javascript_module(array(
                'selectorApp' => '#' . VWPT_ID_MAIN_COMPONENT,

                'selectorRouterOutlet' => '#' . VWPT_ID_MAIN_COMPONENT_ROUTER_OUTLET,

                'nameRouterOutlet' => VWPT_NAME_MEMBER_ROUTER_OUTLET_COMPONENT,

                'nameTagRouterOutlet' => 'div',

                'components' => $available_components_list
            ), $data_type);
        }
    ));

    register_rest_route('vwpt/v1', '/pjax.(?P<type>(' . VWPT_TYPE_ESM . '|' . VWPT_TYPE_SYSTEMJS . ')).js', array(
        'methods' => 'GET',

        'callback' => function ($data) {
            send_header_application_javascript();

            echo get_array_encoded_as_javascript_module(array(
                "options" => null
            ), $data['type']);
        }
    ));
});
