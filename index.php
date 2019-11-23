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

class Parse {
    public function __invoke(string $note): Note {
        switch (true) {
        case preg_match('/^Ab|G#$/', $note): return new Ab;
        case preg_match('/^A$/', $note): return new A;
        case preg_match('/^Bb|A#$/', $note): return new Bb;
        case preg_match('/^B$/', $note): return new B;
        case preg_match('/^C$/', $note): return new C;
        case preg_match('/^Db|C#$/', $note): return new Db;
        case preg_match('/^D$/', $note): return new D;
        case preg_match('/^Eb|D#$/', $note): return new Eb;
        case preg_match('/^E$/', $note): return new E;
        case preg_match('/^F$/', $note): return new F;
        case preg_match('/^G|F#$/', $note): return new Gb;
        case preg_match('/^G$/', $note): return new G; }

        throw new ParseError;
    }
}

$parse = new Parse();
$note = $parse($argv[1]);
$scale = array_reduce($major, new Scale, [$note]);
echo join(', ', $scale), PHP_EOL;