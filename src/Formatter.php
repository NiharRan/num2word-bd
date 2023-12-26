<?php

namespace Nihar\Num2wordBd;

class Formatter
{
    /**
     * Initialize the number property
     *
     * @var int|float
     */
    private int|float $number = 0;

    /**
     * The fraction point of provided number
     *
     * @var int
     */
    private int $fraction = 0;

    /**
     * Unique words of english numbers
     *
     * @var array|string[]
     */
    private array $uniqueWords = [
        '',
        'One',
        'Two',
        'Three',
        'Four',
        'Five',
        'Six',
        'Seven',
        'Eight',
        'Nine',
        'Ten',
        'Eleven',
        'Twelve',
        'Thirteen',
        'Fourteen',
        'Fifteen',
        'Sixteen',
        'Seventeen',
        'Eighteen',
        'Nineteen',
    ];

    /**
     * Tenth words of english numbers
     *
     * @var array|string[]
     */
    private array $tenths = [
        '',
        '',
        'Twenty',
        'Thirty',
        'Forty',
        'Fifty',
        'Sixty',
        'Seventy',
        'Eighty',
        'Ninety',
    ];

    /**
     * List of divisors to number conversion
     *
     * @var array|int[]
     */
    private array $divisors = [
        'Kuti' => 10000000,
        'Lakh' => 100000,
        'Thousand' => 1000,
        'Hundred' => 100,
        'tenth' => 20,
        'unique' => 0,
    ];

    /**
     * List of final converted words
     *
     * @var array|string[]
     */
    private array $words = [];

    public function __construct()
    {
    }


    /**
     * Formats the provided number into its word representation.
     *
     * @param int|float $number - The number to be converted into words.
     * @return string - The word representation of the provided number.
     */
    public function format(int|float $number): string
    {
        $this->number = $number;

        /**
         * Separate whole number and fraction
         */
        $this->splitNumber();

        /**
         * Generate words for the whole number part
         */
        $this->generateWord($this->number);

        /**
         * Add currency for number part
         */
        $this->words[] = 'Taka';

        /**
         * If there is a non-zero fraction, add words for it
         */
        if ($this->fraction > 0) {
            $this->words[] = 'And';
            $this->generateWord($this->fraction);
            /**
             * Fractional currency
             */
            $this->words[] = 'Paysha';
        }

        /**
         * Combine words into a string
         */
        $words = implode(' ', $this->words);

        /**
         * Clean up extra spaces before commas and return the result
         */
        return str_replace(' ,', ',', $words);
    }

    /**
     * Generates word representation for a given number.
     *
     * @param int $number - The number to convert into words.
     *
     * This method converts the provided number into its word representation
     * based on predefined divisors and arrays of unique words and tens. It iterates
     * through the number, decomposes it into divisors, and constructs the words
     * accordingly, storing the resulting words in the internal $words array.
     */
    private function generateWord(int $number): void
    {
        while ($number > 0) {
            foreach ($this->divisors as $key => $divisor) {
                $rest = 0;
                if ($number > $divisor - 1) {
                    if ($divisor === 20) {
                        $divisor = 10;
                    }

                    if ($divisor > 0) {
                        $rest = $number % $divisor;
                        $number = floor($number / $divisor);
                    }

                    if ($divisor > 10) {
                        $this->generateWord($number);
                    }

                    if ($divisor === 10) {
                        $this->words[] = $this->tenths[$number];
                    } elseif ($divisor === 0) {
                        $this->words[] = $this->uniqueWords[$number];
                    } else {
                        $this->words[] = $key;
                        $this->words[] = ',';
                    }

                    if ($divisor === 0) {
                        $number = 0;
                    } else {
                        $number = $rest;
                    }
                }
            }
        }
    }

    /**
     * Splits the provided number into its whole number and fraction parts.
     *
     * This method checks if the provided number is a float. If it is a float,
     * it separates the whole number and fraction parts using the explode function
     * by splitting it at the decimal point. The whole number part is stored
     * in the $this->number property, and the fraction part is stored in the
     * $this->fraction property for further processing.
     */
    private function splitNumber(): void
    {
        if (is_float($this->number)) {
            list($n, $f) = explode('.', $this->number);

            $this->number = $n;
            $this->fraction = $f;
        }
    }
}