<?php

namespace Felix\HumanIdGenerator;

use Savvot\Random\MtRand;

class Random
{
    protected static ?MtRand $rnd = null;

    public static function between(int $min, int $max, ?string $seed = null): int
    {
        static::generator()->setSeed($seed);

        return static::generator()->random($min, $max);
    }

    public static function generator()
    {
        if (self::$rnd === null) {
            self::$rnd = new MtRand();
        }

        return self::$rnd;
    }

    public static function from(array $set)
    {
        return static::generator()->arrayRandValue($set);
    }

    public static function fromWeighted(array $weightedArray)
    {
        return static::generator()->arrayWeightRand($weightedArray);
    }
}
