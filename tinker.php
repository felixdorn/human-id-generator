<?php

require __DIR__ . '/vendor/autoload.php';

use Felix\HumanIdGenerator\HID;

echo HID::generate() . PHP_EOL;
