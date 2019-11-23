<?php declare(strict_types=1);

namespace Phusic\Interval;

use Phusic\Interval;
use Phusic\Note;

class Tone implements Interval
{
    public function __invoke(Note $note): Note
    {
        switch (true) {
            case $note instanceof Note\Ab:
                return new Note\Bb;
            case $note instanceof Note\A:
                return new Note\B;
            case $note instanceof Note\Bb:
                return new Note\C;
            case $note instanceof Note\B:
                return new Note\Db;
            case $note instanceof Note\C:
                return new Note\D;
            case $note instanceof Note\Db:
                return new Note\Eb;
            case $note instanceof Note\D:
                return new Note\E;
            case $note instanceof Note\Eb:
                return new Note\F;
            case $note instanceof Note\E:
                return new Note\Gb;
            case $note instanceof Note\F:
                return new Note\G;
            case $note instanceof Note\Gb:
                return new Note\Ab;
            case $note instanceof Note\G:
                return new Note\A;
        }

        throw new \UnexpectedValueException();
    }
}