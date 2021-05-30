<?php

function vwpt_get_contents($predicate)
{
    ob_start();

    $predicate();

    $contents = ob_get_contents();

    ob_get_clean();

    return $contents;
};
