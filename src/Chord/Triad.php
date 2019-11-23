<?php declare(strict_types=1);

namespace Phusic\Chord;

use Phusic\Chord;
use Phusic\Degree;

class Triad implements Chord
{
    /**
     * @return Degree[]
     */
    public function __invoke(): array
    {
        return [
            new Degree\Tonic,
            new Degree\Mediant,
            new Degree\Dominant,
        ];
    }
}