<?php declare(strict_types=1);

namespace Phusic\Chord;

use Phusic\Chord;
use Phusic\Degree;
use Phusic\Note;
use Phusic\Scale;

class Reduce
{
    public function __invoke(Chord $chord, Scale $scale, Note $tonic): array
    {
        $notes = array_reduce($scale(), new Scale\Reduce, [$tonic]);
        $chord_notes = array_map(function (Degree $degree) use ($notes): ?Note {
            switch (true) {
                case $degree instanceof Degree\Tonic:
                    return $notes[0];
                case $degree instanceof Degree\Supertonic:
                    return $notes[1];
                case $degree instanceof Degree\Mediant:
                    return $notes[2];
                case $degree instanceof Degree\Subdominant:
                    return $notes[3];
                case $degree instanceof Degree\Dominant:
                    return $notes[4];
                case $degree instanceof Degree\Submediant:
                    return $notes[5];
                case $degree instanceof Degree\Subtonic:
                    return $notes[6];
            }

            return null;
        }, $chord());

        return array_filter($chord_notes, function (?Note $note): bool {
            return $note !== null;
        });
    }
}





