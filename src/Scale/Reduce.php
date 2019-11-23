<?php declare(strict_types=1);

namespace Phusic\Scale;

use Phusic\Interval;

class Reduce
{
    public function __invoke(array $notes, Interval $interval)
    {
        $last_note = array_key_last($notes);
        return array_merge($notes, [$interval($notes[$last_note])]);
    }
}