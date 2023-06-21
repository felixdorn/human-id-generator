<?php

require __DIR__.'/vendor/autoload.php';

use Felix\HumanIdGenerator\HID;

$hid = new HID();
echo PHP_EOL;
for ($i = 0; $i < 1_000_000; $i++) {
    $h = $hid->generate();
}
