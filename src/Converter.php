<?php

namespace Gevo\SqipImgConverter;

use Gevo\SqipImgConverter\Exception\ConverterException;

/**
 * Converts an image to a SVG placeholder using the sqip library.
 * 
 * @see https://github.com/technopagan/sqip
 */
class Converter
{

    const CONVERTED_FILE_SUFFIX = '_converted';

    private $inputPath;
    private $outputDir;

    public function __construct(string $inputPath, string $outputDir)
    {
        $this->inputPath = $inputPath;
        $this->outputDir = $outputDir;
    }

    /**
     * Converts the image to a SVG placeholder.
     *
     * @return string
     *  The path to the generated SVG.
     */
    public function convert(): string
    {
        $realInputPath = realpath($this->inputPath);
        $outputDir = realpath($this->outputDir);

        if ($realInputPath === false) {
            throw new ConverterException("Invalid input path");
        }

        if ($outputDir === false) {
            throw new ConverterException("Invalid output directory");
        }

        $filename = \pathinfo($realInputPath, PATHINFO_FILENAME);
        $outputPath = "$outputDir/$filename" . self::CONVERTED_FILE_SUFFIX . ".svg";

        $command = "sqip --input $realInputPath -w 0 -o $outputPath";
        $output = [];
        $return_var = null;
        \exec($command, $output, $return_var);

        $relativePath = \str_replace(\getcwd() . '/', '', $outputPath);
    
        if ($return_var !== 0) {
            throw new ConverterException("Sqip command failed with status code: $return_var. Output: " . implode("\n", $output));
        }

        return $relativePath;
    }
}
