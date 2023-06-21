<?php

namespace Felix\HumanIdGenerator;

use function _PHPStan_f6e65bd66\RingCentral\Psr7\str;

class HID
{
    public static array $easy = [
        'A',
        'U',
        'T',
    ];

    public static array $hard = [
        'B',
        'C',
        'D',
        'F',
        'G',
        'H',
        'M',
        'N',
        'P',
        'Q',
        'S',
        'V',
    ];

    public static function generate()
    {
        $id = '';
        $size = 12;

        while (strlen($id) < $size) {
            if (strlen($id) == 0) {
                $id .= self::$hard[Random::generator()->arrayRand(self::$hard)];
                continue;
            }

            if (strlen($id) == 1) {
                $id .= self::$easy[Random::generator()->arrayRand(self::$easy)];
                continue;
            }

            $vowelCount = 0;
            $consonantCount = 0;

            for ($i = 0; $i < strlen($id); $i++) {
                if (in_array($id[$i], self::$easy)) {
                    $vowelCount++;
                } else {
                    $consonantCount++;
                }
            }

            $weightedArray = [];

            foreach (self::$easy as $vowel) {
                $weightedArray[$vowel] = 1 - ($vowelCount / strlen($id));
            }

            foreach (self::$hard as $consonant) {
                $weightedArray[$consonant] = 1 - ($consonantCount / strlen($id));
            }

            if (strlen($id) > 8) {
                dd($id, $weightedArray);
            }

            $id .= Random::generator()->arrayWeightRand($weightedArray);
        }

    }
}
