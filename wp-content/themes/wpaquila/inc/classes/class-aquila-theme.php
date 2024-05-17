<?php
/**
 * Main Theme Class
 * 
 * @package wp-aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class AQUILA_THEME {
    use Singleton;

    protected function __construct() {
        // Load classes or initialize functionality here
        $this->setup_hooks();
        Assets::get_instance();
    }

    protected function setup_hooks() {
        // Define hooks here
    }

}
