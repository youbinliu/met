<?php
require_once '../include/common.inc.php';
$mdname = 'product';
$showname = 'showproduct';
$dbname = $met_product;
$listnum = $met_product_list;
$imgproduct = 'product';
require_once '../include/global/showmod.php';
$product = $news;
$product_list_new  = $md_list_new;
$product_class_new = $md_class_new;
$product_list_com  = $md_list_com;
$product_class_com = $md_class_com;
$product_class     = $md_class;
$product_list      = $md_list;
require_once '../public/php/producthtml.inc.php';
include template('showproduct');
footer();
?>