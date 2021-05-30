<?php

function vwpt_replace_path_with_uri($path)
{
    $uri = str_replace(VWPT_PATH_PARENT_THEME, VWPT_URI_PARENT_THEME, $path);
    $uri = str_replace(VWPT_PATH_CURRENT_THEME, VWPT_URI_CURRENT_THEME, $uri);

    return $uri;
}
