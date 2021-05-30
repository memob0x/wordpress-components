<?php

function send_header($header)
{
    if (headers_sent()) {
        return;
    }

    header($header);
}
