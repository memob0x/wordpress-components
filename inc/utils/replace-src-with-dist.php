<?php

function vwpt_replace_src_with_dist($string)
{
    return str_replace('/' . VWPT_NAME_DIRECTORY_SRC, '/'.VWPT_NAME_DIRECTORY_DIST, $string);
}
