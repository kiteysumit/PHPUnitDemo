<?php

//namespace PHPUnitDemo;

//use PHPUnitDemo\SalaryDetails;
include_once "src/SalaryDetails.php";

use PHPUnitDemo\SalaryDetails;

if (!isset($argv[1])) {
    printf("Please provide filename to write Salary Details\n");
    exit;
}

$filePath = $argv[1];

$salaryDetails = new SalaryDetails();

$salaryDetails->prepareSalaryDetails($filePath);
