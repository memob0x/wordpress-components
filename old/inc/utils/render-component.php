<?php

function wpcs_render_component($component_name, $component_contents, $attributes = array())
{
    $output = '<' . $component_name;

    $attributes['class'] = $component_name;

    foreach ($attributes as $name => $value) {
        $output .= ' ' . $name . '="' . (is_array($value) ? join(' ', $value) : $value) . '"';
    }

    $output .= '>';

    $output .= is_callable($component_contents) ? wpcs_get_contents($component_contents) : $component_contents;

    $output .= '</' . $component_name . '>';

    echo $output;
}
