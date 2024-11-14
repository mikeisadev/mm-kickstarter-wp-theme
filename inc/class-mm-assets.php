<?php

namespace MM;

defined( 'ABSPATH' ) || exit;

class Assets {
    
    private static ?self $instance = null;

    public static function get_instance(): ?self {
        if ( is_null( self::$instance ) ) {
            return new self();
        }

        return self::$instance;
    }

    private function __construct() {
        add_action('wp_enqueue_scripts', [$this, 'set_frontend_assets']);
    }

    public function set_frontend_assets() {
        wp_enqueue_script('main', MM_URL . 'build/index.js', ['react-dom', 'react'], '1.0.0', [ 'in_footer' => true]);

        wp_enqueue_style( 'main', MM_URL . '/build/index.css', null, null);
    }
}