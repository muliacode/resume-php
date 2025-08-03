<?php

declare(strict_types=1);

namespace Muliacode\Resume\Tests\Models;

use Muliacode\Resume\Models\Skill;

test('it can create a skill with all properties', function (): void {
    $skill = Skill::create('Programming', 'Expert', ['PHP', 'JavaScript']);

    expect($skill->getName())->toBe('Programming')
        ->and($skill->getLevel())->toBe('Expert')
        ->and($skill->getKeywords())->toBe(['PHP', 'JavaScript']);
});

test('it can create a skill with all properties using setters', function (): void {
    $skill = Skill::create()
        ->setName('Programming')
        ->setLevel('Expert')
        ->setKeywords(['PHP', 'JavaScript']);

    expect($skill->getName())->toBe('Programming')
        ->and($skill->getLevel())->toBe('Expert')
        ->and($skill->getKeywords())->toBe(['PHP', 'JavaScript']);
});

test('it can create a skill with empty properties', function (): void {
    $skill = Skill::create();

    expect($skill->getName())->toBeNull()
        ->and($skill->getLevel())->toBeNull()
        ->and($skill->getKeywords())->toBe([]);
});

test('it can create a skill with null keywords', function (): void {
    $skill = Skill::create('Programming', 'Expert', null);

    expect($skill->getName())->toBe('Programming')
        ->and($skill->getLevel())->toBe('Expert')
        ->and($skill->getKeywords())->toBe([]);
});
