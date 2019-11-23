<?php declare(strict_types=1);

namespace Phusic\Scale;

use Phusic\Interval;
use Phusic\Interval\Semitone;
use Phusic\Interval\Tone;
use Phusic\Scale;

class Major implements Scale
{
    /**
     * @return Interval[]
     */
    public function __invoke(): array
    {
        return [new Tone, new Tone, new Semitone, new Tone, new Tone, new Tone, new Semitone];
    }
}