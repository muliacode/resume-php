<?php

declare(strict_types=1);

namespace Muliacode\Resume\Tests\Models;

use Muliacode\Resume\Models\Volunteer;

test('it constructs a volunteer with all properties', function (): void {
    $volunteer = new Volunteer(
        organization: 'Organization Name',
        position: 'Volunteer Position',
        url: 'https://example.com',
        startDate: '2025-01-01',
        endDate: '2025-06-01',
        summary: 'A short summary about the volunteer work.',
        highlights: ['highlight1', 'highlight2']
    );

    expect($volunteer->getOrganization())->toBe('Organization Name')
        ->and($volunteer->getPosition())->toBe('Volunteer Position')
        ->and($volunteer->getUrl())->toBe('https://example.com')
        ->and($volunteer->getStartDate())->toBe('2025-01-01')
        ->and($volunteer->getEndDate())->toBe('2025-06-01')
        ->and($volunteer->getSummary())->toBe('A short summary about the volunteer work.')
        ->and($volunteer->getHighlights())->toBe(['highlight1', 'highlight2']);
});

test('it creates a volunteer with all properties through create method', function (): void {
    $volunteer = Volunteer::create(
        organization: 'Organization Name',
        position: 'Volunteer Position',
        url: 'https://example.com',
        startDate: '2025-01-01',
        endDate: '2025-06-01',
        summary: 'A short summary about the volunteer work.',
        highlights: ['highlight1', 'highlight2']
    );

    expect($volunteer->getOrganization())->toBe('Organization Name')
        ->and($volunteer->getPosition())->toBe('Volunteer Position')
        ->and($volunteer->getUrl())->toBe('https://example.com')
        ->and($volunteer->getStartDate())->toBe('2025-01-01')
        ->and($volunteer->getEndDate())->toBe('2025-06-01')
        ->and($volunteer->getSummary())->toBe('A short summary about the volunteer work.')
        ->and($volunteer->getHighlights())->toBe(['highlight1', 'highlight2']);
});

test('it creates a volunteer with all properties through setters', function (): void {
    $volunteer = Volunteer::create()
        ->setOrganization('Organization Name')
        ->setPosition('Volunteer Position')
        ->setUrl('https://example.com')
        ->setStartDate('2025-01-01')
        ->setEndDate('2025-06-01')
        ->setSummary('A short summary about the volunteer work.')
        ->setHighlights(['highlight1', 'highlight2']);

    expect($volunteer->getOrganization())->toBe('Organization Name')
        ->and($volunteer->getPosition())->toBe('Volunteer Position')
        ->and($volunteer->getUrl())->toBe('https://example.com')
        ->and($volunteer->getStartDate())->toBe('2025-01-01')
        ->and($volunteer->getEndDate())->toBe('2025-06-01')
        ->and($volunteer->getSummary())->toBe('A short summary about the volunteer work.')
        ->and($volunteer->getHighlights())->toBe(['highlight1', 'highlight2']);
});

test('it creates a volunteer with default values through create method', function (): void {
    $volunteer = Volunteer::create();

    expect($volunteer->getOrganization())->toBeNull()
        ->and($volunteer->getPosition())->toBeNull()
        ->and($volunteer->getUrl())->toBeNull()
        ->and($volunteer->getStartDate())->toBeNull()
        ->and($volunteer->getEndDate())->toBeNull()
        ->and($volunteer->getSummary())->toBeNull()
        ->and($volunteer->getHighlights())->toBeEmpty();
});

test('it constructs a volunteer with default values', function (): void {
    $volunteer = new Volunteer();

    expect($volunteer->getOrganization())->toBeNull()
        ->and($volunteer->getPosition())->toBeNull()
        ->and($volunteer->getUrl())->toBeNull()
        ->and($volunteer->getStartDate())->toBeNull()
        ->and($volunteer->getEndDate())->toBeNull()
        ->and($volunteer->getSummary())->toBeNull()
        ->and($volunteer->getHighlights())->toBeEmpty();
});
