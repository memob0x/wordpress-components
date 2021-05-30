<?php

function wcpt_replace_src_with_dist($string)
{
    return str_replace('/' . WCPT_NAME_DIRECTORY_SRC, '/'.WCPT_NAME_DIRECTORY_DIST, $string);
}
