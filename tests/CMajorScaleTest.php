<?php declare(strict_types=1);

namespace Phusic\Test;

use PHPUnit\Framework\TestCase;
use Phusic\Note;
use Phusic\Scale\Major;
use Phusic\Scale;

class CMajorScaleTest extends TestCase
{
    public function testCMajorScale()
    {
        $note = new Note\C;
        $scale = new Major;

        $expected = [new Note\C, new Note\D, new Note\E, new Note\F, new Note\G, new Note\A, new Note\B, new Note\C];
        $actual = array_reduce($scale(), new Scale\Reduce, [$note]);

        $this->assertEquals($expected, $actual);
    }
}