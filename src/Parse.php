<?php declare(strict_types=1);

namespace Phusic;

class Parse
{
    public function __invoke(string $note): Note
    {
        switch (true) {
            case preg_match('/^Ab|G#$/', $note):
                return new Note\Ab;
            case preg_match('/^A$/', $note):
                return new Note\A;
            case preg_match('/^Bb|A#$/', $note):
                return new Note\Bb;
            case preg_match('/^B$/', $note):
                return new Note\B;
            case preg_match('/^C$/', $note):
                return new Note\C;
            case preg_match('/^Db|C#$/', $note):
                return new Note\Db;
            case preg_match('/^D$/', $note):
                return new Note\D;
            case preg_match('/^Eb|D#$/', $note):
                return new Note\Eb;
            case preg_match('/^E$/', $note):
                return new Note\E;
            case preg_match('/^F$/', $note):
                return new Note\F;
            case preg_match('/^Gb|F#$/', $note):
                return new Note\Gb;
            case preg_match('/^G$/', $note):
                return new Note\G;
        }

        throw new \ParseError();
    }
}
