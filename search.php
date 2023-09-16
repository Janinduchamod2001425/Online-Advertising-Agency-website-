<?php

$query = $_GET['query'];

// Example search results
$results = array(
    array('title' => 'Home Page', 'url' => 'home.html'),
    array('title' => 'Services Page', 'url' => 'services1.html'),
    array('title' => 'Project Page', 'url' => 'projects.html'),
    array('title' => 'About Us Page', 'url' => 'aboutUs.html'),
    array('title' => 'Blog Page', 'url' => 'blog.html'),
    array('title' => 'Contact Us', 'url' => 'ContactUs.html'),
    array('title' => 'Payment Gateway Page', 'url' => 'paymentGateway.html'),
    array('title' => 'Package Page', 'url' => 'Package.html'),
    array('title' => 'Advertiser Support Page', 'url' => 'advertiserSupport.html'),
    array('title' => 'Portfolio Page', 'url' => 'portfolio.html'),
    array('title' => 'Registration Page', 'url' => 'join.html'),
    array('title' => 'login Page', 'url' => 'login.html'),
    array('title' => 'Terms and Conditions Page', 'url' => 'terms.html'),
    array('title' => 'Privacy Policy Page', 'url' => 'privacy.html')
);

// Display search results
if (!empty($results)) {
    echo '<h2>Search Results</h2>';

    // associative array
    foreach ($results as $result) {
        echo '<h3 style="text-decoration: none; "><a href="' . $result['url'] . '">' . $result['title'] . '</a></h3>';
    }
} else {
    echo '<p>No results found.</p>';
}
?>
