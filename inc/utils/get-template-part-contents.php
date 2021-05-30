<?php

function wcpt_get_template_part_contents($path)
{
    return wcpt_get_contents(function () use ($path) {
        get_template_part(wcpt_get_template_part_slug($path));
    });
};
