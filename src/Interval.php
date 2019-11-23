<?php declare(strict_types=1);

namespace Phusic;

interface Interval
{
    public function __invoke(Note $note): Note;
}