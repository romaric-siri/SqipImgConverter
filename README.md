# Image to Placeholder Converter using Sqip

This project provides a PHP class for converting images to SVG placeholders using Sqip.

## Installation

Use composer to install the project:

```bash
composer require gevo/img-converter-sqip
```

[Packagist link](https://packagist.org/packages/gevo/sqip_img_converter)

Make sure to have sqip globally installed on your machine [following the official guide](https://github.com/axe312ger/sqip?tab=readme-ov-file#CLI)

## Usage

```php
use Gevo\ImgConverterSqip\Converter;

$converter = new Converter($inputPath, $outputPath);
$converter->convert();
```

In this example, `$inputPath` is the path to the input image and `$outputPath` is the path where the SVG placeholder should be saved.

## Exception Handling

The `convert` method may throw an `ImgConverterSqipException` if there's a problem during the conversion process. You should catch this exception in your code and handle it appropriately.

```php
use Gevo\ImgConverterSqip\Converter;
use Gevo\ImgConverterSqip\ImgConverterSqipException;

try {
    $converter = new Converter($inputPath, $outputPath);
    $converter->convert();
} catch (ImgConverterSqipException $e) {
    // Handle exception
}
```

## License

This project is licensed under the MIT License.