<?php

// Include the basic configuration elements
require_once('C:/GenevaCode/CSC206/includes/config_example.php');

// Include the database connection and query class
require_once(FS_INCLUDES . 'Database.php');

// Connect to the database
$db = new Database();

// Initialize variables
$requestType = $_SERVER[ 'REQUEST_METHOD' ];

// Session Start
session_start();


