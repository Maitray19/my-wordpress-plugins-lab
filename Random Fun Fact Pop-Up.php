<?php
function inject_funfact_script() {
    $facts = [
        "Bananas are berries!",
        "A snail can sleep for 3 years!",
        "Octopuses have three hearts!",
    ];
    $random_fact = $facts[array_rand($facts)];
    echo "<script>
        window.addEventListener('scroll', function() {
            if (window.scrollY > window.innerHeight * 0.3 && !window.shown) {
                alert('Fun Fact: $random_fact');
                window.shown = true;
            }
        });
    </script>";
}
add_action('wp_footer', 'inject_funfact_script');

?>