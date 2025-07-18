<?php
class Mood_Widget extends WP_Widget {
    function __construct() {
        parent::__construct('mood_widget', 'Mood of the Day');
    }

    function widget($args, $instance) {
        $moods = [
            ['emoji' => '😊', 'mood' => 'Happy', 'quote' => 'Keep smiling!'],
            ['emoji' => '😴', 'mood' => 'Sleepy', 'quote' => 'Take a nap!'],
            ['emoji' => '🔥', 'mood' => 'Motivated', 'quote' => 'Let\'s grind!'],
        ];
        $day = date('z') % count($moods);
        $today = $moods[$day];

        echo $args['before_widget'];
        echo "<div style='text-align:center;'>
                <h3>{$today['emoji']} {$today['mood']}</h3>
                <p>{$today['quote']}</p>
              </div>";
        echo $args['after_widget'];
    }
}

function register_mood_widget() {
    register_widget('Mood_Widget');
}
add_action('widgets_init', 'register_mood_widget');
?>
