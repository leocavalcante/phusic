<?php declare(strict_types=1);

namespace Phusic;

interface Scale
{
    /**
     * @return Interval[]
     */
    public function __invoke(): array;
}