<?php

/**
 * Class SalaryDate
 */
class SalaryDate
{
    /**
     * @var null
     */
    protected $month = null;

    /**
     * @var null
     */
    protected $year = null;

    /**
     * list of weekends
     */
    const WEEKENDS = [
        'Sat',
        'Sun',
    ];

    /**
     * Weekend Sat
     */
    const WEEKEND_SAT = 'Sat';

    /**
     * SalaryDate constructor.
     *
     * @param null $month
     * @param null $year
     */
    public function __construct($month, $year)
    {
        $this->month = $month;
        $this->year = $year;
    }

    /**
     * @return null
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * Set Month
     *
     * @param null $month
     * @return SalaryDate
     */
    public function setMonth($month)
    {
        $this->month = $month;
        return $this;
    }

    /**
     * Get Year
     *
     * @return null
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set Year
     *
     * @param null $year
     * @return SalaryDate
     */
    public function setYear($year)
    {
        $this->year = $year;
        return $this;
    }
}
