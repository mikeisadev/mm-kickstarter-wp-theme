<?php

namespace MM;

defined( 'ABSPATH' ) || exit;

use MM\Assets;
use MM\Admin\ { SettingsPage };

final class Init {

    private static ?self $instance = null;

    private function __construct() {}

    public static function get_instance(): ?self {
        if ( is_null( self::$instance ) ) {
            return new self();
        }

        return self::$instance;
    }

    public function init() {
        add_action( 'after_setup_theme', [$this, 'init_carbon_fields'] );
        
        $this->get_includes();
        $this->get_instances();

        $this->init_admin_setting_pages();
    }

    private function get_includes() {
        require_once MM_DIR . 'inc/class-mm-assets.php';
        require_once MM_DIR . 'inc/class-mm-theme-supports.php';
    }

    private function get_instances() {
        Assets::get_instance();
        ThemeSupports::get_instance();
    }

    private function init_admin_setting_pages() {
        require_once MM_DIR . 'inc/admin/class-mm-admin-settings-page.php';

        SettingsPage::get_instance();
    }
    
    public function init_carbon_fields() {
        require_once( MM_DIR . 'vendor/autoload.php' );
        \Carbon_Fields\Carbon_Fields::boot();
    }

}