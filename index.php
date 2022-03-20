<?php

/* Require composer autoloader */
require __DIR__ . '/vendor/autoload.php';

/* Get model.php */
include 'model.php';

/* Connect to DB */
$db = connect_db('localhost', 'ddwt_resit', 'ddwt21','ddwt21');

/* Create Router instance */
$router = new \Bramus\Router\Router();

/* Navigation template */
$navigation_template = Array(
    1 => Array(
        'name' => 'Home',
        'url' => '/fp_resit/'
    ),
    2 => Array(
        'name' => 'Overview',
        'url' => '/fp_resit/overview/'
    ),
    3 => Array(
        'name' => 'Register',
        'url'   => '/fp_resit/register/'
    )
);

/* Landing page */
$router->get('/', function() use($navigation_template){
    /* Page info */
    $page_title = 'Home';
    $breadcrumbs = get_breadcrumbs([
        'Home' => nav('/fp_resit/', True)
    ]);
    $navigation = get_navigation($navigation_template, 1);

    /* Page content */
    $page_subtitle = 'Subtitle';
    $page_content = 'Content.';

    /* Get error msg from POST route */
    if ( isset($_GET['error_msg']) ) { $error_msg = get_error($_GET['error_msg']); }

    /* Include Template */
    include use_template('main');
});

/* Run the router */
$router->run();