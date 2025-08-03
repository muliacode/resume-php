<?php

declare(strict_types=1);

namespace Muliacode\Resumify\Tests\Models;

use Muliacode\Resumify\Models\Work;

test('it initializes with all properties set to null by default', function (): void {
    $work = new Work();

    expect($work->getName())->toBeNull()
        ->and($work->getLocation())->toBeNull()
        ->and($work->getDescription())->toBeNull()
        ->and($work->getPosition())->toBeNull()
        ->and($work->getUrl())->toBeNull()
        ->and($work->getStartDate())->toBeNull()
        ->and($work->getEndDate())->toBeNull()
        ->and($work->getSummary())->toBeNull()
        ->and($work->getHighlights())->toBeEmpty();
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
    )->validate();

    expect($work->getName())->toBe('Company Name')
        ->and($work->getLocation())->toBe('City, Country')
        ->and($work->getDescription())->toBe('Job description')
        ->and($work->getPosition())->toBe('Developer')
        ->and($work->getUrl())->toBe('https://example.com')
        ->and($work->getStartDate())->toBe('2023-01-01')
        ->and($work->getEndDate())->toBe('2025-01-01')
        ->and($work->getSummary())->toBe('Summary of the work')
        ->and($work->getHighlights())->toBe(['Highlight 1', 'Highlight 2']);
});

test('it creates an instance with given values using setters', function (): void {
    $work = Work::create()
        ->setName('Company Name')
        ->setLocation('City, Country')
        ->setDescription('Job description')
        ->setPosition('Developer')
        ->setUrl('https://example.com')
        ->setStartDate('2023-01-01')
        ->setEndDate('2025-01-01')
        ->setSummary('Summary of the work')
        ->setHighlights(['Highlight 1', 'Highlight 2']);

    expect($work->getName())->toBe('Company Name')
        ->and($work->getLocation())->toBe('City, Country')
        ->and($work->getDescription())->toBe('Job description')
        ->and($work->getPosition())->toBe('Developer')
        ->and($work->getUrl())->toBe('https://example.com')
        ->and($work->getStartDate())->toBe('2023-01-01')
        ->and($work->getEndDate())->toBe('2025-01-01')
        ->and($work->getSummary())->toBe('Summary of the work')
        ->and($work->getHighlights())->toBe(['Highlight 1', 'Highlight 2']);
});

test('it creates an instance with all default null values using the create method', function (): void {
    $work = Work::create();

    expect($work->getName())->toBeNull()
        ->and($work->getLocation())->toBeNull()
        ->and($work->getDescription())->toBeNull()
        ->and($work->getPosition())->toBeNull()
        ->and($work->getUrl())->toBeNull()
        ->and($work->getStartDate())->toBeNull()
        ->and($work->getEndDate())->toBeNull()
        ->and($work->getSummary())->toBeNull()
        ->and($work->getHighlights())->toBeEmpty();
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

    expect($work->getName())->toBe('Company Name')
        ->and($work->getLocation())->toBe('City, Country')
        ->and($work->getDescription())->toBe('Job description')
        ->and($work->getPosition())->toBe('Developer')
        ->and($work->getUrl())->toBe('https://example.com')
        ->and($work->getStartDate())->toBe('2023-01-01')
        ->and($work->getEndDate())->toBe('2025-01-01')
        ->and($work->getSummary())->toBe('Summary of the work')
        ->and($work->getHighlights())->toBe(['Highlight 1', 'Highlight 2']);
});
