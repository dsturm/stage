<!doctype html>
<html <?php language_attributes(); ?> class="h-full overflow-x-hidden overflow-y-scroll scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?> data-loader="wrapper">
    <?php wp_body_open(); ?>
    <?php do_action('get_header'); ?>

    <?php echo \Roots\view(\Roots\app('sage.view'), \Roots\app('sage.data'))->render(); ?>

    <?php do_action('get_footer'); ?>
    <?php wp_footer(); ?>
    </body>
</html>
