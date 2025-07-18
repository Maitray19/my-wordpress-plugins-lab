<?php
function auto_copyright_shortcode() {
    return "&copy; " . date('Y') . " " . get_bloginfo('name');
}
add_shortcode('auto_copyright', 'auto_copyright_shortcode');

?>