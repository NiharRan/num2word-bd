# About Num2word-BD
**[NUM2WORD-BD](https://github.com/NiharRan/num2word-bd)** is a library for connecting with Omise Payment Gateway services (see more https://docs.omise.co/).

All files in this directory will show you about the best pratices that you should do when implementing  **omise-php** into your project.

## Requirements
- PHP 8.0 and above.

## Installation
For running this example, you need to install `num2word-bd` library before. It can be done by two different methods:

### 1. Using Composer
You can install the library via [Composer](https://getcomposer.org/). If you don't already have Composer installed, first install it by following one of these instructions depends on your OS of choice:
* [Composer installation instruction for Windows](https://getcomposer.org/doc/00-intro.md#installation-windows)
* [Composer installation instruction for Mac OS X and Linux](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)

After composer is installed, Then run the following command to install the Num2word-BD library:

```
php composer.phar install
```

Please see configuration section below for configuring.

## Usage
To convert a number to words, follow these steps:
```php
use Nihar\Num2wordBd\Formatter;

// Instantiate the Formatter class
$formatter = new Formatter();

// Call the format method and pass the number you want to convert
$result = $formatter->format(1234.56);

echo $result; // Outputs: "One Thousand Two Hundred Thirty Four Taka And Fifty Six Paysha"
```

## Available Methods
* format($number): Converts the provided number into its word representation.

## Contributing
Contributions are welcome! Here's how you can contribute to this project:

1. Fork the repository
2. Create your feature branch (git checkout -b feature/YourFeature)
3. Commit your changes (git commit -m 'Add some feature')
4. Push to the branch (git push origin feature/YourFeature)
5. Open a pull request

## License
The MIT License (MIT): Please see the [License File](LICENSE)
