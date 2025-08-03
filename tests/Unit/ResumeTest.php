<?php

declare(strict_types=1);

use Muliacode\Resume\Models\Basics;
use Muliacode\Resume\Resume;

beforeEach(function (): void {
    $this->resume = Resume::create();
});

it('can be instantiated', function (): void {
    expect($this->resume)->toBeInstanceOf(Resume::class);
});

it('can be created with the create method', function (): void {
    $resume = Resume::create();
    expect($resume)->toBeInstanceOf(Resume::class);
});

it('has default personal information', function (): void {
    expect($this->resume->basics())->toBeInstanceOf(Basics::class);
});

it('can set personal information via property', function (): void {
    $newPersonalInfo = Basics::create(name: 'Jane Doe');
    $this->resume->basics($newPersonalInfo);

    expect($this->resume->basics())->toBe($newPersonalInfo)
        ->and($this->resume->basics()->getName())->toBe('Jane Doe');
});

it('returns itself from done method', function (): void {
    $result = $this->resume->done();
    expect($result)->toBe($this->resume);
});

it('can convert to array', function (): void {
    $array = $this->resume->toArray();

    expect($array)->toBeArray()
        ->and($array)->toHaveKey('basics')
        ->and($array['basics'])->toBeArray();
});

it('can convert to JSON string', function (): void {
    $json = $this->resume->toJson();
    $array = json_decode((string) $json, true);

    expect($json)->toBeString()
        ->and($array)->toBeArray()
        ->and($array)->toHaveKey('basics');
});
