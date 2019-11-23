<?php declare(strict_types=1);

namespace Phusic\Degree;

use Phusic\Degree;

class Mediant implements Degree
{
    public function __toString(): string
    {
        return 'III';
    }
}