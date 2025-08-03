<?php

declare(strict_types=1);

namespace Muliacode\Resumify\Tests\Models;

use Muliacode\Resumify\Models\Project;

test('it can create a project with all parameters', function (): void {
    $project = Project::create(
        'Test Project',
        'This is a test project',
        ['Highlight 1', 'Highlight 2'],
        ['keyword1', 'keyword2'],
        '2025-01-01',
        '2025-12-31',
        'https://example.com',
        ['Role 1', 'Role 2'],
        'Test Entity',
        'Test Type'
    )->validate();

    expect($project->getName())->toBe('Test Project')
        ->and($project->getDescription())->toBe('This is a test project')
        ->and($project->getHighlights())->toBe(['Highlight 1', 'Highlight 2'])
        ->and($project->getKeywords())->toBe(['keyword1', 'keyword2'])
        ->and($project->getStartDate())->toBe('2025-01-01')
        ->and($project->getEndDate())->toBe('2025-12-31')
        ->and($project->getUrl())->toBe('https://example.com')
        ->and($project->getRoles())->toBe(['Role 1', 'Role 2'])
        ->and($project->getEntity())->toBe('Test Entity')
        ->and($project->getType())->toBe('Test Type');
});

test('it can create a project with all parameters using setters', function (): void {
    $project = Project::create()
        ->setName('Test Project')
        ->setDescription('This is a test project')
        ->setHighlights(['Highlight 1', 'Highlight 2'])
        ->setKeywords(['keyword1', 'keyword2'])
        ->setStartDate('2025-01-01')
        ->setEndDate('2025-12-31')
        ->setUrl('https://example.com')
        ->setRoles(['Role 1', 'Role 2'])
        ->setEntity('Test Entity')
        ->setType('Test Type');

    expect($project->getName())->toBe('Test Project')
        ->and($project->getDescription())->toBe('This is a test project')
        ->and($project->getHighlights())->toBe(['Highlight 1', 'Highlight 2'])
        ->and($project->getKeywords())->toBe(['keyword1', 'keyword2'])
        ->and($project->getStartDate())->toBe('2025-01-01')
        ->and($project->getEndDate())->toBe('2025-12-31')
        ->and($project->getUrl())->toBe('https://example.com')
        ->and($project->getRoles())->toBe(['Role 1', 'Role 2'])
        ->and($project->getEntity())->toBe('Test Entity')
        ->and($project->getType())->toBe('Test Type');
});

test('it can create a project with null parameters', function (): void {
    $project = Project::create();

    expect($project->getName())->toBeNull()
        ->and($project->getDescription())->toBeNull()
        ->and($project->getHighlights())->toBe([])
        ->and($project->getKeywords())->toBe([])
        ->and($project->getStartDate())->toBeNull()
        ->and($project->getEndDate())->toBeNull()
        ->and($project->getUrl())->toBeNull()
        ->and($project->getRoles())->toBe([])
        ->and($project->getEntity())->toBeNull()
        ->and($project->getType())->toBeNull();
});

test('it can create a project with partial parameters', function (): void {
    $project = Project::create('Test Project', null, null, null, '2025-01-01', null);

    expect($project->getName())->toBe('Test Project')
        ->and($project->getDescription())->toBeNull()
        ->and($project->getHighlights())->toBe([])
        ->and($project->getKeywords())->toBe([])
        ->and($project->getStartDate())->toBe('2025-01-01')
        ->and($project->getEndDate())->toBeNull()
        ->and($project->getUrl())->toBeNull()
        ->and($project->getRoles())->toBe([])
        ->and($project->getEntity())->toBeNull()
        ->and($project->getType())->toBeNull();
});
