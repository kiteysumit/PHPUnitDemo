<?php

namespace PHPUnitDemo\Services;

use PHPUnitDemo\Model\SalaryDate;

include_once dirname(__FILE__) . "/../Model/SalaryDate.php";

/**
 * Class SalaryDateService
 */
class SalaryDateService
{
    /**
     * @var SalaryDate
     */
    protected $salaryDate;

    /**
     * SalaryDateService constructor.
     *
     * @param SalaryDate $salaryDate
     */
    public function __construct(SalaryDate $salaryDate)
    {
        $this->salaryDate = $salaryDate;
    }

    /**
     * Get Salary Date
     *
     * @return mixed
     */
    public function getSalaryDate()
    {
        $lastDateOfMonth = date('t', strtotime($this->getYearMonthCombination() . '15'));
        $expectedSalaryDate = $this->getYearMonthCombination() . $lastDateOfMonth;
        $lastDayOfMonth = date('D', strtotime($expectedSalaryDate));
        if (!in_array($lastDayOfMonth, SalaryDate::WEEKENDS)) return $this->getFormattedDate($expectedSalaryDate);
        $threshold = ($lastDayOfMonth == SalaryDate::WEEKEND_SAT) ? 0 : 1;
        $expectedSalaryDate = $this->getYearMonthCombination() . ($lastDateOfMonth - $threshold - 1);
        return $this->getFormattedDate($expectedSalaryDate);
    }

    /**
     * Get Bonus Date
     *
     * @return mixed
     */
    public function getBonusDate()
    {
        $expectedBonusDate = $this->getYearMonthCombination() . '15';
        $expectedBonusDay = date('D', strtotime($expectedBonusDate));
        if (!in_array($expectedBonusDay, SalaryDate::WEEKENDS)) return $this->getFormattedDate($expectedBonusDate);
        $threshold = ($expectedBonusDay == SalaryDate::WEEKEND_SAT) ? 1 : 0;
        $expectedBonusDate = $this->getYearMonthCombination() . (15 + $threshold + 3);
        return $this->getFormattedDate($expectedBonusDate);
    }

    /**
     * Get String of Year and Month
     *
     * @return string
     */
    protected function getYearMonthCombination()
    {
        return $this->salaryDate->getYear() . '-' . $this->salaryDate->getMonth() . '-';
    }

    /**
     * Get Formatted Date by using string Date
     *
     * @param string $date
     * @return mixed
     */
    protected function getFormattedDate(string $date)
    {
        return date('Y-m-d', strtotime($date));
    }
}
