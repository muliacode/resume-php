<?php

declare(strict_types=1);

namespace Muliacode\Resumify\Tests\Models;

use Muliacode\Resumify\Models\Reference;

test('it creates a Reference with null values', function (): void {
    $reference = Reference::create();

    expect($reference->getName())->toBeNull();
    expect($reference->getReference())->toBeNull();
});

test('it creates a Reference with a name and reference', function (): void {
    $reference = Reference::create('John Doe', 'Professional Colleague');

    expect($reference->getName())->toBe('John Doe');
    expect($reference->getReference())->toBe('Professional Colleague');
});

test('it creates a Reference with a name and reference using setters', function (): void {
    $reference = Reference::create()
        ->setName('John Doe')
        ->setReference('Professional Colleague');

    expect($reference->getName())->toBe('John Doe');
    expect($reference->getReference())->toBe('Professional Colleague');
});
