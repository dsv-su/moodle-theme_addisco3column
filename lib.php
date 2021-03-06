<?php

/**
 * Makes our changes to the CSS
 *
 * @param string $css
 * @param theme_config $theme
 * @return string 
 */
function addisco3column_process_css($css, $theme) {

    // Set the link color
    if (!empty($theme->settings->linkcolor)) {
        $linkcolor = $theme->settings->linkcolor;
    } else {
        $linkcolor = null;
    }
    $css = addisco3column_set_linkcolor($css, $linkcolor);

	// Set the link hover color
    if (!empty($theme->settings->linkhover)) {
        $linkhover = $theme->settings->linkhover;
    } else {
        $linkhover = null;
    }
    $css = addisco3column_set_linkhover($css, $linkhover);
        

    // Return the CSS
    return $css;
}

/**
 * Sets the link color variable in CSS
 *
 */
function addisco3column_set_linkcolor($css, $linkcolor) {
    $tag = '[[setting:linkcolor]]';
    $replacement = $linkcolor;
    if (is_null($replacement)) {
        $replacement = '#053154';
    }
    $css = str_replace($tag, $replacement, $css);
    return $css;
}

function addisco3column_set_linkhover($css, $linkhover) {
    $tag = '[[setting:linkhover]]';
    $replacement = $linkhover;
    if (is_null($replacement)) {
        $replacement = '#053154';
    }
    $css = str_replace($tag, $replacement, $css);
    return $css;
}

