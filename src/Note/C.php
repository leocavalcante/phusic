<?php declare(strict_types=1);

namespace Phusic\Note;

use Phusic\Note;

class C implements Note
{
    public function __toString(): string
    {
        return 'C';
    }
}