<?php

function wcpt_replace_uri_with_path($path)
{
    $uri = str_replace(WCPT_URI_PARENT_THEME, WCPT_PATH_PARENT_THEME, $path);
    $uri = str_replace(WCPT_URI_CURRENT_THEME, WCPT_PATH_CURRENT_THEME, $uri);

    return $uri;
}
