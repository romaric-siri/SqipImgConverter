<?php

namespace Gevo\SqipImgConverter\Tests;

use Gevo\SqipImgConverter\Converter;
use PHPUnit\Framework\TestCase;

class ConverterTest extends TestCase
{
    public function testConvert()
    {
        $inputPath = 'src/images/sample.png';
        $outputDir = 'src/images/';
        $expected_outputPath = 'src/images/sample_converted.svg';

        $converter = new Converter($inputPath, $outputDir);
        $filepath = $converter->convert();

        $this->assertFileExists($expected_outputPath);
        $this->assertEquals($expected_outputPath, $filepath);

        // Clean up after the test
        unlink($expected_outputPath);
    }
}