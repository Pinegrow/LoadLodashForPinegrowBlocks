<?php
/**
 * Plugin Name:       Load Lodash for Pinegrow Blocks
 * Plugin URI:        https://github.com/Pinegrow/LoadLodashForPinegrowBlocks
 * Description:       A simple plugin that enables compatibility of older Pinegrow blocks with WordPress 6.4+ by loading lodash in the editor.
 * Version: 1.0.11
 * Requires at least: 5.5
 * Requires PHP:      5.3
 * Author:            Pinegrow Pte. Ltd.
 * Author URI:        https://pinegrow.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       pg_load_lodash
 * Domain Path:       /languages
*/

if(!function_exists('pinegrow_add_lodash_to_blocks_controls')) {

    function pinegrow_add_lodash_to_blocks_controls() {
        //Find pg-blocks-controls script and add lodash as a dependency
        $script = wp_scripts()->query( 'pg-blocks-controls', 'registered' );
        if(!empty($script)) {
            $script->deps[] = 'lodash';
        }
    }

    //Hook into init after all init functions where blocks are registered have been executes
    add_action( 'init', 'pinegrow_add_lodash_to_blocks_controls', 100);
}
