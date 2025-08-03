<?php

declare(strict_types=1);

namespace Muliacode\Resume\Tests\Models;

use Muliacode\Resume\Enums\LanguageFluencyLevel;
use Muliacode\Resume\Models\Language;

test('it creates a Language instance with null values', function (): void {
    $language = Language::create();

    expect($language)
        ->toBeInstanceOf(Language::class)
        ->getLanguage()->toBeNull()
        ->getFluency()->toBeNull();
});

test('it creates a Language instance with language and fluency values', function (): void {
    $language = Language::create('English', LanguageFluencyLevel::NATIVE);

    expect($language)
        ->toBeInstanceOf(Language::class)
        ->getLanguage()->toBe('English')
        ->getFluency()->toBe(LanguageFluencyLevel::NATIVE);
});

test('it creates a Language instance with language and fluency values using setters', function (): void {
    $language = Language::create()
        ->setLanguage('English')
        ->setFluency(LanguageFluencyLevel::C2);

    expect($language)
        ->toBeInstanceOf(Language::class)
        ->getLanguage()->toBe('English')
        ->getFluency()->toBe(LanguageFluencyLevel::C2);
});
