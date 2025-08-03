<?php

declare(strict_types=1);

namespace Muliacode\Resume\Tests\Models;

use Muliacode\Resume\Models\Work;

test('it initializes with all properties set to null by default', function (): void {
    $work = new Work();

    expect($work->name)->toBeNull()
        ->and($work->location)->toBeNull()
        ->and($work->description)->toBeNull()
        ->and($work->position)->toBeNull()
        ->and($work->url)->toBeNull()
        ->and($work->startDate)->toBeNull()
        ->and($work->endDate)->toBeNull()
        ->and($work->summary)->toBeNull()
        ->and($work->highlights)->toBeNull();
});

test('it creates an instance with given values using the create method', function (): void {
    $work = Work::create(
        name: 'Company Name',
        location: 'City, Country',
        description: 'Job description',
        position: 'Developer',
        url: 'https://example.com',
        startDate: '2023-01-01',
        endDate: '2025-01-01',
        summary: 'Summary of the work',
        highlights: ['Highlight 1', 'Highlight 2']
    );

    expect($work->name)->toBe('Company Name')
        ->and($work->location)->toBe('City, Country')
        ->and($work->description)->toBe('Job description')
        ->and($work->position)->toBe('Developer')
        ->and($work->url)->toBe('https://example.com')
        ->and($work->startDate)->toBe('2023-01-01')
        ->and($work->endDate)->toBe('2025-01-01')
        ->and($work->summary)->toBe('Summary of the work')
        ->and($work->highlights)->toBe(['Highlight 1', 'Highlight 2']);
});

test('it creates an instance with all default null values using the create method', function (): void {
    $work = Work::create();

    expect($work->name)->toBeNull()
        ->and($work->location)->toBeNull()
        ->and($work->description)->toBeNull()
        ->and($work->position)->toBeNull()
        ->and($work->url)->toBeNull()
        ->and($work->startDate)->toBeNull()
        ->and($work->endDate)->toBeNull()
        ->and($work->summary)->toBeNull()
        ->and($work->highlights)->toBeNull();
});

test('it initializes with provided values', function (): void {
    $work = new Work(
        name: 'Company Name',
        location: 'City, Country',
        description: 'Job description',
        position: 'Developer',
        url: 'https://example.com',
        startDate: '2023-01-01',
        endDate: '2025-01-01',
        summary: 'Summary of the work',
        highlights: ['Highlight 1', 'Highlight 2']
    );

    expect($work->name)->toBe('Company Name')
        ->and($work->location)->toBe('City, Country')
        ->and($work->description)->toBe('Job description')
        ->and($work->position)->toBe('Developer')
        ->and($work->url)->toBe('https://example.com')
        ->and($work->startDate)->toBe('2023-01-01')
        ->and($work->endDate)->toBe('2025-01-01')
        ->and($work->summary)->toBe('Summary of the work')
        ->and($work->highlights)->toBe(['Highlight 1', 'Highlight 2']);
});
