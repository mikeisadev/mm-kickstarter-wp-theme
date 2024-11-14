<?php

namespace MM;

defined( 'ABSPATH' ) || exit;

class ThemeSupports {
    
    private static ?self $instance = null;

    public static function get_instance(): ?self {
        if ( is_null( self::$instance ) ) {
            return new self();
        }

        return self::$instance;
    }

    private function __construct() {
        add_action('after_setup_theme', [$this, 'add_theme_supports']);
    }

    public function add_theme_supports() {
        add_theme_support('menus');
        add_theme_support('title-tag');
        add_theme_support('woocommerce');
    }
}