<?php

namespace Felix\HumanIdGenerator;


use Savvot\Random\MtRand;

/**
 * - 10 characters long (without hyphens / spaces)
 * - The hyphens/spaces based on their position represent the month
 * - The first character is a letter
 *
 */
class HID
{
    protected const ALPHABET = [
        'A',
        'E',
        'I',
        'C',
        'D',
        'G',
        'H',
        'M',
        'U',
        'T',
        'P',
        'Q',
        'T',
        'U',
        '2',
        '4',
        '5',
        '7',
    ];
    private MtRand $random;
    private array $alphabet;
    private int $alphabetSize;
    private $intMaxDiv = 1 / PHP_INT_MAX;

    public function __construct()
    {
        $this->random = new MtRand();
        $this->defaultAlphabet = array_combine(
            array_values(self::ALPHABET),
            array_fill(0, count(self::ALPHABET), 1000)
        );
        $this->alphabetSize = count($this->defaultAlphabet);
    }

    public function generate(): string
    {
        $id = static::ALPHABET[$this->random->random(0, $this->alphabetSize - 1)];
        $size = 9;
        $alphabet = $this->defaultAlphabet;
        $sum = 1000 * $this->alphabetSize;

        while ($size !== 0) {
            $lastLetter = $id[-1];
            $previous = $alphabet[$lastLetter];
            $this->alphabet[$lastLetter] = (int) ($previous - $previous / $this->alphabetSize);
            $sum += $this->alphabet[$lastLetter] - $previous;
            $id .= $this->arrayWeightRand($alphabet, $sum);
            $size--;
        }

        return $id;
    }

    public function arrayWeightRand(array $array, float $sum)
    {
        $targetWeight = $this->random->random(1, $sum);
        foreach ($array as $key => $weight) {
            $targetWeight -= $weight;
            if ($targetWeight <= 0) {
                return $key;
            }
        }
    }
}
