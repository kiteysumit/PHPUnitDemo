<?php

namespace PHPUnitDemo\Services;


/**
 * Class CsvWriterService
 */
class CsvWriterService
{
    /**
     * @var bool|resource
     */
    protected $file;

    /**
     * CsvWriterService constructor.
     *
     * @param $filePath
     */
    public function __construct($filePath)
    {
        $this->file = fopen($filePath, 'w');
        $this->writeToCsv(['Month Name', 'Salary Date', 'Bonus Date']);
    }

    /**
     * Write Data to the file
     *
     * @param string $data
     */
    public function writeToCsv(array $data)
    {
        fputcsv($this->file, $data);
    }

    /**
     * Closes the opened file in Constructor
     */
    public function __destruct()
    {
        fclose($this->file);
    }
}
