<?php declare(strict_types=1);

namespace Phusic\Interval;

use Phusic\Interval;
use Phusic\Note;

class Semitone implements Interval
{
    public function __invoke(Note $note): Note
    {
        switch (true) {
            case $note instanceof Note\Ab:
                return new Note\A;
            case $note instanceof Note\A:
                return new Note\Bb;
            case $note instanceof Note\Bb:
                return new Note\B;
            case $note instanceof Note\B:
                return new Note\C;
            case $note instanceof Note\C:
                return new Note\Db;
            case $note instanceof Note\Db:
                return new Note\D;
            case $note instanceof Note\D:
                return new Note\Eb;
            case $note instanceof Note\Eb:
                return new Note\E;
            case $note instanceof Note\E:
                return new Note\F;
            case $note instanceof Note\F:
                return new Note\Gb;
            case $note instanceof Note\Gb:
                return new Note\G;
            case $note instanceof Note\G:
                return new Note\Ab;
        }

        throw new \UnexpectedValueException();
    }
}