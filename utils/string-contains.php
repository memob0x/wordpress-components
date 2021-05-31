<?php

function wpcs_string_contains($string, $needle)
{
    return strpos($string, $needle) !== false;
}
