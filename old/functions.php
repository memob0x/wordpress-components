<?php

require_once __DIR__ . '/constants.php';

require_once WCPT_PATH_PARENT_THEME . '/vendor/autoload.php';

foreach (array_merge(
    glob(WCPT_PATH_PARENT_THEME_UTILS . '/*.' . WCPT_FILE_EXTENSION_PHP),

    glob(WCPT_PATH_PARENT_THEME_HOOKS . '/*.' . WCPT_FILE_EXTENSION_PHP)
) as $filename) {
    require_once $filename;
}
