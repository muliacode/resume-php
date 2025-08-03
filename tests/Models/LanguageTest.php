<?php

declare(strict_types=1);

namespace Muliacode\Resume\Tests\Models;

use Muliacode\Resume\Models\Language;

test('it creates a Language instance with null values', function (): void {
    $language = Language::create();

    expect($language)
        ->toBeInstanceOf(Language::class)
        ->getLanguage()->toBeNull()
        ->getFluency()->toBeNull();
});

test('it creates a Language instance with language and fluency values', function (): void {
    $language = Language::create('English', 'Native');

    expect($language)
        ->toBeInstanceOf(Language::class)
        ->getLanguage()->toBe('English')
        ->getFluency()->toBe('Native');
});

test('it creates a Language instance with language and fluency values using setters', function (): void {
    $language = Language::create()
        ->setLanguage('English')
        ->setFluency('Native');

    expect($language)
        ->toBeInstanceOf(Language::class)
        ->getLanguage()->toBe('English')
        ->getFluency()->toBe('Native');
});
