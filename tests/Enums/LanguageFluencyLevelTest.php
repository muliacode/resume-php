<?php

declare(strict_types=1);

namespace Muliacode\Resumify\Tests\Enums;

use Muliacode\Resumify\Enums\LanguageFluencyLevel;

test('A1 description is Beginner', function (): void {
    $level = LanguageFluencyLevel::A1;
    expect($level->description())->toBe('Beginner');
});

test('A2 description is Elementary', function (): void {
    $level = LanguageFluencyLevel::A2;
    expect($level->description())->toBe('Elementary');
});

test('B1 description is Intermediate', function (): void {
    $level = LanguageFluencyLevel::B1;
    expect($level->description())->toBe('Intermediate');
});

test('B2 description is Upper-Intermediate', function (): void {
    $level = LanguageFluencyLevel::B2;
    expect($level->description())->toBe('Upper-Intermediate');
});

test('C1 description is Advanced', function (): void {
    $level = LanguageFluencyLevel::C1;
    expect($level->description())->toBe('Advanced');
});

test('C2 description is Proficient (Mastery)', function (): void {
    $level = LanguageFluencyLevel::C2;
    expect($level->description())->toBe('Proficient (Mastery)');
});

test('Native description is Native', function (): void {
    $level = LanguageFluencyLevel::NATIVE;
    expect($level->description())->toBe('Native');
});
