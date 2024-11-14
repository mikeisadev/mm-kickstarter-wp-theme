<?php

namespace MM\Admin;

defined( 'ABSPATH' ) || exit;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class SettingsPage {
    
    private static ?self $instance = null;

    public static function get_instance(): ?self {
        if ( is_null( self::$instance ) ) {
            return new self();
        }

        return self::$instance;
    }

    private function __construct() {
        add_action('carbon_fields_register_fields', [$this, 'add_settings_page']);
    }

    public function add_settings_page() {
        Container::make( 'theme_options', __( 'Opzioni del Tema' ) )
        ->add_fields( [
            Field::make( 'text', 'mm_text', 'Titolo del sito' ),
        ] );
    }
}