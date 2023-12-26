# About Num2word-BD
**[NUM2WORD-BD](https://github.com/NiharRan/num2word-bd)** is a library for number conversion from number to word according to Bangladeshi numeric system 

## Requirements
- PHP 8.0 and above.

## Installation
For running this example, you need to install `num2word-bd` library before. It can be done by two different methods:

### 1. Using Composer
You can install the library via [Composer](https://getcomposer.org/).
```
composer require nihar/num2word-bd
```

Please see configuration section below for configuring.

## Usage
To convert a number to words, follow these steps:
```php
use Nihar\Num2wordBd\Formatter;

// Instantiate the Formatter class
$formatter = new Formatter();

// Call the format method and pass the number you want to convert
$result = $formatter
    ->currency('TK')
    ->fractionCurrency('Paysa')
    ->joinSign('&')
    ->format(1234.56);

echo $result; // Outputs: "One Thousand Two Hundred Thirty Four TK & Fifty Six Paysa"
```

## Available Methods
* format($number): Converts the provided number into its word representation.
* currency($sign): Set the currency sign for the whole number part.
* fractionCurrency($sign): Set the currency sign for the fractional part.
* joinSign($sign): Set the sign to join the whole and fractional parts.

## Contributing
Contributions are welcome! Here's how you can contribute to this project:

1. Fork the repository
2. Create your feature branch (git checkout -b feature/YourFeature)
3. Commit your changes (git commit -m 'Add some feature')
4. Push to the branch (git push origin feature/YourFeature)
5. Open a pull request

## License
The MIT License (MIT): Please see the [License File](LICENSE)
