<?php

declare(strict_types=1);

namespace Muliacode\Resume\Enums;

enum LanguageFluencyLevel: string
{
    case A1     = 'A1';
    case A2     = 'A2';
    case B1     = 'B1';
    case B2     = 'B2';
    case C1     = 'C1';
    case C2     = 'C2';
    case NATIVE = 'Native';

    /**
     * Returns a human-readable description for the fluency level.
     */
    public function description(): string
    {
        return match ($this) {
            self::A1     => 'Beginner',
            self::A2     => 'Elementary',
            self::B1     => 'Intermediate',
            self::B2     => 'Upper-Intermediate',
            self::C1     => 'Advanced',
            self::C2     => 'Proficient (Mastery)',
            self::NATIVE => 'Native',
        };
    }
}
