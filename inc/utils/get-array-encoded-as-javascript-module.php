<?php

function get_array_encoded_as_javascript_module($array, $type)
{
    switch ($type) {
        case VWPT_TYPE_SYSTEMJS:
            return 'System.register([], function($__export, $__moduleContext) {
                $__export(' . json_encode($array) . ');

                return {
                    execute: function(){}
                };
            });';

        default:
            $output = '';

            foreach ($array as $name => $value) {
                $output .= 'export const ' . $name . ' = ' . json_encode($value) . ';';
            }

            return $output;
    }
};
