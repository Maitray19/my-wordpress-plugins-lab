<?php
add_action('template_redirect', function() {
    if (is_404()) {
        $log = date('Y-m-d H:i:s') . " - " . $_SERVER['REQUEST_URI'] . "\n";
        file_put_contents(plugin_dir_path(__FILE__) . '404_log.txt', $log, FILE_APPEND);
    }
});

add_action('admin_menu', function() {
    add_submenu_page('tools.php', '404 Logs', '404 Logs', 'manage_options', '404-logs', function() {
        echo "<h2>404 Logs</h2>";
        echo "<a href='" . plugins_url('404_log.txt', __FILE__) . "' download>Download Log File</a>";
    });
});

?>