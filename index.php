<?php declare(strict_types=1);

interface Note {
    public function __toString(): string;
}

class Ab implements Note { public function __toString(): string { return 'G#'; } }
class A implements Note { public function __toString(): string { return 'A'; } }
class Bb implements Note { public function __toString(): string { return 'A#'; } }
class B implements Note { public function __toString(): string { return 'B'; } }
class C implements Note { public function __toString(): string { return 'C'; } }
class Db implements Note { public function __toString(): string { return 'C#'; } }
class D implements Note { public function __toString(): string { return 'D'; } }
class Eb implements Note { public function __toString(): string { return 'D#'; } }
class E implements Note { public function __toString(): string { return 'E'; } }
class F implements Note { public function __toString(): string { return 'F'; } }
class Gb implements Note { public function __toString(): string { return 'F#'; } }
class G implements Note { public function __toString(): string { return 'G'; } }

interface Interval {
    public function __invoke(Note $note): Note;
}

class Semitone implements Interval {
    public function __invoke(Note $note): Note {
        switch (true) {
        case $note instanceof Ab: return new A;
        case $note instanceof A: return new Bb;
        case $note instanceof Bb: return new B;
        case $note instanceof B: return new C;
        case $note instanceof C: return new Db;
        case $note instanceof Db: return new D;
        case $note instanceof D: return new Eb;
        case $note instanceof Eb: return new E;
        case $note instanceof E: return new F;
        case $note instanceof F: return new Gb;
        case $note instanceof Gb: return new G;
        case $note instanceof G: return new Ab; }

        throw new UnexpectedValueException;
    }
}

class Tone implements Interval {
    public function __invoke(Note $note): Note {
        switch (true) {
        case $note instanceof Ab: return new Bb;
        case $note instanceof A: return new B;
        case $note instanceof Bb: return new C;
        case $note instanceof B: return new Db;
        case $note instanceof C: return new D;
        case $note instanceof Db: return new Eb;
        case $note instanceof D: return new E;
        case $note instanceof Eb: return new F;
        case $note instanceof E: return new Gb;
        case $note instanceof F: return new G;
        case $note instanceof Gb: return new Ab;
        case $note instanceof G: return new A; }

        throw new UnexpectedValueException;
    }
}

/** Interval[] */
$major = [new Tone, new Tone, new Semitone, new Tone, new Tone, new Tone, new Semitone];

class Scale {
    public function __invoke(array $notes, Interval $pitch): array {
        $last_note = array_key_last($notes);
        return array_merge($notes, [$pitch($notes[$last_note])]);
    }
}

$c_major = array_reduce($major, new Scale, [new C]);
echo join(', ', $c_major), PHP_EOL;

$f_sharp_major = array_reduce($major, new Scale, [new Gb]);
echo join(', ', $f_sharp_major);