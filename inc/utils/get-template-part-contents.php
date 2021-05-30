<?php

function vwpt_get_template_part_contents($path)
{
    return vwpt_get_contents(function () use ($path) {
        get_template_part(vwpt_get_template_part_slug($path));
    });
};
