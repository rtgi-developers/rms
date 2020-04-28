<?php
/*
| -------------------------------------------------------------------
| System prefixes
| -------------------------------------------------------------------
| This file contains an array of prefixes to be used in 
| products, materials, sales orders, invoices, purchase orders
| Work orders etc.
|
| Access the array in $this->config->item('config_prefix)
| -------------------------------------------------------------------
*/
defined('BASEPATH') OR exit('No direct script access allowed');

// System prefixes array
$config = array(
    'MATERIALS'       => 'M', 
    'PRODUCTS'        => 'P', 
    'SALES_ORDER'    => 'OCX', 
    'PURCHASE_ORDERS' => 'PO', 
    'WORK_ORDER'      => 'WO', 
    'INVOICE'         => 'INV'
);