<?php


Event::listen('slide',function(){
    global $c;
    include_once('src/featured_products/featured-products.php');
});
