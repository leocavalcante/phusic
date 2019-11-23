<?php declare(strict_types=1);

namespace Phusic;

use Phusic\Scale\Major;

require_once __DIR__ . '/../vendor/autoload.php';

$parse = new Parse();
$note = $parse($argv[1]);
$major = new Major();
$notes = array_reduce($major(), new Scale\Reduce, [$note]);
echo join(', ', $notes), PHP_EOL;