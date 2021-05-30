<?php

function vwpt_replace_uri_with_path($path)
{
    $uri = str_replace(VWPT_URI_PARENT_THEME, VWPT_PATH_PARENT_THEME, $path);
    $uri = str_replace(VWPT_URI_CURRENT_THEME, VWPT_PATH_CURRENT_THEME, $uri);

    return $uri;
}
