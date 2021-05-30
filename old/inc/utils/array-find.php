<?php

function wpcs_array_find($array, $predicate)
{
    if (!is_callable($predicate)) {
        return null;
    }

    foreach ($array as $item) {
        if ($predicate($item)) {
            return $item;
        }
    }

    return null;
}
