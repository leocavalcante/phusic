<?php declare(strict_types=1);

namespace Phusic\Note;

use Phusic\Note;

class A implements Note
{
    public function __toString(): string
    {
        return 'A';
    }
}