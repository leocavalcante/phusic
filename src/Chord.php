<?php declare(strict_types=1);

namespace Phusic;

interface Chord
{
    /**
     * @return Degree[]
     */
    public function __invoke(): array;
}