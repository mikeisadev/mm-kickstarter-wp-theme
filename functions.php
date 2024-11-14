<?php

use MM\Init;

define( 'MM_DIR', trailingslashit( get_template_directory() ) );
define( 'MM_URL', trailingslashit( esc_url( get_template_directory_uri() ) ) );

// Require classes
require_once MM_DIR . 'inc/class-mm-init.php';

$Init = Init::get_instance();
$Init->init();