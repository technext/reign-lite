<?php

function comment_says_text($translation, $text, $domain) {
    $new_says = ''; //whatever you want to have instead of 'says' in comments
    $translations = get_translations_for_domain( $domain );
    if ( $text == '<cite class="fn">%s</cite> <span class="says">says:</span>' ) {
        if($new_says) $new_says = ' '.$new_says; //compensate for the space character
        return $translations->translate( '<cite class="fn">%s</cite><span class="says">'.$new_says.':</span>' );
    } else {
        return $translation; // standard text
    }
}
add_filter('gettext', 'comment_says_text', 10, 3);

?>