<?php

namespace PHPUnitDemo;

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
            $monthName = date("F", strtotime("+$i month"));
            $this->salaryDate = new SalaryDate($year, $month);
            $this->salaryDateService = new SalaryDateService($this->salaryDate);
            $salaryDate = $this->salaryDateService->getSalaryDate();
            $bonusDate = $this->salaryDateService->getBonusDate();
            $this->csvWriterService->writeToCsv($monthName . ',' . $salaryDate . ',' . $bonusDate);
        }
    }
}
