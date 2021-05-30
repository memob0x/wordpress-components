<?php

function wpcs_replace_path_with_uri($path)
{
    $uri = str_replace(WCPT_PATH_PARENT_THEME, WCPT_URI_PARENT_THEME, $path);
    $uri = str_replace(WCPT_PATH_CURRENT_THEME, WCPT_URI_CURRENT_THEME, $uri);

    return $uri;
}
