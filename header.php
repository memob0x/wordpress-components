<!doctype html>
<html>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>
        <?php the_title(); ?>
    </title>

    <?php wp_head(); ?>
</head>

<body>
    <div id="<?php echo VWPT_ID_MAIN_COMPONENT; ?>">
        <component
            id="<?php echo VWPT_ID_MAIN_COMPONENT_ROUTER_OUTLET; ?>"

            :is="<?php echo VWPT_NAME_MEMBER_ROUTER_OUTLET_COMPONENT; ?>"
        >
