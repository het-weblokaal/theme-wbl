<?php
/**
 * Footer template functions
 */

namespace WBL\Templating;


function display_language_switcher( $args = [] ) {

    $args = wp_parse_args( $args, [
        'extra_classes' => '',
    ]);


    // ‘dropdown’ => displays a list if set to 0, a dropdown list if set to 1 (default: 0)
    // ‘show_names’ => displays language names if set to 1 (default: 1)
    // ‘display_names_as’ => either ‘name’ or ‘slug’ (default: ‘name’)
    // ‘show_flags’ => displays flags if set to 1 (default: 0)
    // ‘hide_if_empty’ => hides languages with no posts (or pages) if set to 1 (default: 1)
    // ‘force_home’ => forces link to homepage if set to 1 (default: 0)
    // ‘echo’ => echoes if set to 1, returns a string if set to 0 (default: 1)
    // ‘hide_if_no_translation’ => hides the language if no translation exists if set to 1 (default: 0)
    // ‘hide_current’=> hides the current language if set to 1 (default: 0)
    // ‘post_id’ => if set, displays links to translations of the post (or page) defined by post_id (default: null)
    // ‘raw’ => use this to create your own custom language switcher (default:0)


    if (function_exists('pll_the_languages')) {
    ?> 
        <div class="language-switcher <?= $args['extra_classes'] ?>">
            <span class="language-switcher__label"><?= _x( 'Go to:', 'language-switcher', 'clc' ); ?></span>
            <ul class="language-switcher__list">
                <?php pll_the_languages( array( 'show_flags' => 1, 'hide_current' => 1 ) ); ?>
            </ul>
        </div>
    <?php
    }
}
            