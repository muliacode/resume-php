<?php

declare(strict_types=1);

namespace Muliacode\Resumify\Tests\Models;

use Muliacode\Resumify\Models\Award;

test('create method initializes an Award instance with provided properties', function (): void {
    $title = 'Best Developer';
    $date = '2025-01-01';
    $awarder = 'Tech Community';
    $summary = 'Awarded for exceptional contributions to open-source projects.';

    $award = Award::create($title, $date, $awarder, $summary)->validate();

    expect($award)
        ->toBeInstanceOf(Award::class)
        ->getTitle()->toBe($title)
        ->getDate()->toBe($date)
        ->getAwarder()->toBe($awarder)
        ->getSummary()->toBe($summary);
});

test('create method initializes an Award instance with provided properties through setters', function (): void {
    $title = 'Best Developer';
    $date = '2025-01-01';
    $awarder = 'Tech Community';
    $summary = 'Awarded for exceptional contributions to open-source projects.';

    $award = Award::create()
        ->setTitle($title)
        ->setDate($date)
        ->setAwarder($awarder)
        ->setSummary($summary);

    expect($award)
        ->toBeInstanceOf(Award::class)
        ->getTitle()->toBe($title)
        ->getDate()->toBe($date)
        ->getAwarder()->toBe($awarder)
        ->getSummary()->toBe($summary);
});

test('create method initializes an Award instance with null properties when no arguments are provided', function (): void {
    $award = Award::create();

    expect($award)
        ->toBeInstanceOf(Award::class)
        ->getTitle()->toBeNull()
        ->getDate()->toBeNull()
        ->getAwarder()->toBeNull()
        ->getSummary()->toBeNull();
});
