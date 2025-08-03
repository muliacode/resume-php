<?php

declare(strict_types=1);

use Muliacode\Resume\Models\Basics;
use Muliacode\Resume\Resume;

beforeEach(function (): void {
    $this->resume = Resume::create();
});

it('integrates dynamic properties with personal information', function (): void {
    $this->resume->basics()
        ->setName('John Doe')
        ->setEmail('john@example.com')
        ->setPhone('123-456-7890');

    expect($this->resume->basics()->getName())->toBe('John Doe')
        ->and($this->resume->basics()->getEmail())->toBe('john@example.com')
        ->and($this->resume->basics()->getPhone())->toBe('123-456-7890');
});

it('maintains constructor values alongside dynamic properties', function (): void {
    $this->resume->basics(Basics::create(name: 'John Doe'));
    $this->resume->basics()->setEmail('john@example.com');

    expect($this->resume->basics()->getName())->toBe('John Doe')
    ->and($this->resume->basics()->getEmail())->toBe('john@example.com');
});
