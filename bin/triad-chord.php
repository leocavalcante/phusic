<?php declare(strict_types=1);

namespace Phusic;

use Phusic\Chord\Reduce;
use Phusic\Chord\Triad;
use Phusic\Scale\Major;

require_once __DIR__ . '/../vendor/autoload.php';

$parse = new Parse();
$tonic = $parse($argv[1]);
$scale = new Major();
$chord = new Triad();
$reduce = new Reduce();
$notes = $reduce($chord, $scale, $tonic);
echo join(', ', $notes);