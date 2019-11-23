<?php declare(strict_types=1);

namespace Phusic\Test;

use PHPUnit\Framework\TestCase;
use Phusic\{Note, Scale, Chord};

class CMajorTriadChordTest extends TestCase
{
    public function testCMajorTriadChord()
    {
        $tonic = new Note\C;
        $scale = new Scale\Major;
        $chord = new Chord\Triad;
        $reduce = new Chord\Reduce;

        $actual = $reduce($chord, $scale, $tonic);
        $expected = [new Note\C, new Note\E, new Note\G];

        $this->assertEquals($expected, $actual);
    }
}