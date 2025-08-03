<?php

declare(strict_types=1);

namespace Muliacode\Resume\Tests\Models;

use Muliacode\Resume\Models\Interest;

test('create method initializes Interest with name and keywords', function (): void {
    $interest = Interest::create('Design', ['Graphics', 'UI/UX']);

    expect($interest->getName())->toBe('Design');
    expect($interest->getKeywords())->toBe(['Graphics', 'UI/UX']);
});

test('create method initializes Interest with name and keywords using setters', function (): void {
    $interest = Interest::create()
        ->setName('Design')
        ->setKeywords(['Graphics', 'UI/UX']);

    expect($interest->getName())->toBe('Design');
    expect($interest->getKeywords())->toBe(['Graphics', 'UI/UX']);
});

test('create method initializes Interest with null name and keywords', function (): void {
    $interest = Interest::create();

    expect($interest->getName())->toBeNull();
    expect($interest->getKeywords())->toBe([]);
});

test('create method initializes Interest with null name and empty keywords', function (): void {
    $interest = Interest::create(null, []);

    expect($interest->getName())->toBeNull();
    expect($interest->getKeywords())->toBe([]);
});

test('create method initializes Interest with name and null keywords', function (): void {
    $interest = Interest::create('Programming', null);

    expect($interest->getName())->toBe('Programming');
    expect($interest->getKeywords())->toBe([]);
});
