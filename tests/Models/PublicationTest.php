<?php

declare(strict_types=1);

namespace Muliacode\Resumify\Tests\Models;

use Muliacode\Resumify\Models\Publication;

test('it creates a publication with all properties', function (): void {
    $publication = Publication::create(
        'Sample Name',
        'Sample Publisher',
        '2025-08-03',
        'https://example.com',
        'Sample Summary'
    )->validate();

    expect($publication->getName())->toBe('Sample Name')
        ->and($publication->getPublisher())->toBe('Sample Publisher')
        ->and($publication->getReleaseDate())->toBe('2025-08-03')
        ->and($publication->getUrl())->toBe('https://example.com')
        ->and($publication->getSummary())->toBe('Sample Summary');
});

test('it creates a publication with all properties using setters', function (): void {
    $publication = Publication::create()
        ->setName('Sample Name')
        ->setPublisher('Sample Publisher')
        ->setReleaseDate('2025-08-03')
        ->setUrl('https://example.com')
        ->setSummary('Sample Summary');

    expect($publication->getName())->toBe('Sample Name')
        ->and($publication->getPublisher())->toBe('Sample Publisher')
        ->and($publication->getReleaseDate())->toBe('2025-08-03')
        ->and($publication->getUrl())->toBe('https://example.com')
        ->and($publication->getSummary())->toBe('Sample Summary');
});

test('it creates a publication with null properties', function (): void {
    $publication = Publication::create();

    expect($publication->getName())->toBeNull()
        ->and($publication->getPublisher())->toBeNull()
        ->and($publication->getReleaseDate())->toBeNull()
        ->and($publication->getUrl())->toBeNull()
        ->and($publication->getSummary())->toBeNull();
});
