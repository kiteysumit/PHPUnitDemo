<?php

namespace PHPUnitDemo;

include_once "Model/SalaryDate.php";
include_once "Services/CsvWriterService.php";
include_once "Services/SalaryDateService.php";

use PHPUnitDemo\Model\SalaryDate;
use PHPUnitDemo\Services\CsvWriterService;
use PHPUnitDemo\Services\SalaryDateService;

/**
 * Class SalaryDetails
 */
class SalaryDetails
{
    /**
     * @var SalaryDate
     */
    protected $salaryDate;

    /**
     * @var SalaryDateService
     */
    protected $salaryDateService;

    /**
     * @var CsvWriterService
     */
    protected $csvWriterService;

    /**
     * Prepare the Salary Details File
     *
     * @param string $filePath
     */
    public function prepareSalaryDetails($filePath)
    {
        $this->csvWriterService = new CsvWriterService($filePath);

        for ($i=1; $i <= 12; $i++) {
            $year = date("Y", strtotime("+$i month"));
            $month = date("m", strtotime("+$i month"));
            if (1 === $i) {
                $monthName = date("F", time());
            } else {
                $monthName = date("F", strtotime('+'.($i - 1).' month'));
            }
            $this->salaryDate = new SalaryDate($month, $year);
            $this->salaryDateService = new SalaryDateService($this->salaryDate);
            $salaryDate = $this->salaryDateService->getSalaryDate();
            $bonusDate = $this->salaryDateService->getBonusDate();
            $this->csvWriterService->writeToCsv([$monthName, $salaryDate, $bonusDate]);
        }
    }
}
