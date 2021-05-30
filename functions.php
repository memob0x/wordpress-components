<?php

require_once __DIR__ . '/constants.php';

require_once VWPT_PATH_PARENT_THEME . '/vendor/autoload.php';

foreach (array_merge(
    glob(VWPT_PATH_PARENT_THEME_UTILS . '/*.' . VWPT_FILE_EXTENSION_PHP),

    glob(VWPT_PATH_PARENT_THEME_HOOKS . '/*.' . VWPT_FILE_EXTENSION_PHP)
) as $filename) {
    require_once $filename;
}
