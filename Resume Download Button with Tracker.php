<?php
register_activation_hook(__FILE__, function() {
    add_option('resume_download_count', 0);
});

add_action('admin_menu', function() {
    add_menu_page('Resume Downloads', 'Resume Stats', 'manage_options', 'resume-stats', function() {
        echo "<h2>Total Downloads: " . get_option('resume_download_count') . "</h2>";
    });
});

add_action('init', function() {
    if (isset($_GET['download_resume'])) {
        $count = get_option('resume_download_count');
        update_option('resume_download_count', ++$count);
        header("Content-Type: application/pdf");
        readfile(plugin_dir_path(__FILE__) . 'resume.pdf');
        exit;
    }
});

add_shortcode('resume_download', function() {
    return "<a href='?download_resume=true' class='button'>Download My Resume</a>";
});

?>