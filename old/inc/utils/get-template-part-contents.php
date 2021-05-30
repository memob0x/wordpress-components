<?php

function wpcs_get_template_part_contents($path)
{
    return wpcs_get_contents(function () use ($path) {
        get_template_part(wpcs_get_template_part_slug($path));
    });
};
