<?php
/*
| -------------------------------------------------------------------
| UNIT OF MEASUREMENT CONFIGURATIONS
| -------------------------------------------------------------------
| This file contains an array of UOM to be used in 
| UNIT OF MEASUREMENT helper.
|
| Access the array in $this->config->item('config_uom)
| -------------------------------------------------------------------
*/
defined('BASEPATH') OR exit('No direct script access allowed');

// Unit of measurement arrsy
$config = array(
    'uom' => array(
        'Length' => array(
            array('Centimeter', 'cm'), 
            array('Meter', 'm'), 
            array('Millimeter', 'mm'), 
            array('Inches', 'in'), 
            array('Feet', 'ft') 
        ), 
        'Weight' => array(
            array('Gram', 'g'), 
            array('Kilogram', 'kg'), 
            array('Ounce', 'oz'), 
            array('Pound', 'lb')
        ), 
        'Count' => array(
            array('Pieces', 'pcs'), 
            array('Each', 'ea'), 
            array('Box', 'box'), 
            array('Dozen', 'dz'), 
            array('Sets', 'sets'), 
            array('Pack', 'pck')
        ), 
        'Volume' => array(
            array('Liter', 'l'), 
            array('Milliliter', 'ml') 
        ), 
        'Time' => array(
            array('Days', 'days'), 
            array('Weeks', 'wks'), 
            array('Years', 'yrs'), 
            array('Hours', 'hrs')
        )
    )
);