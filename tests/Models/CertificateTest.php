<?php

declare(strict_types=1);

namespace Muliacode\Resumify\Tests\Models;

use Muliacode\Resumify\Models\Certificate;

test('create method returns an instance of Certificate', function (): void {
    $certificate = Certificate::create();
    expect($certificate)->toBeInstanceOf(Certificate::class);
});

test('create method sets name correctly', function (): void {
    $certificate = Certificate::create(name: 'PHP Certification');
    expect($certificate->getName())->toBe('PHP Certification');
});

test('create method sets date correctly', function (): void {
    $certificate = Certificate::create(date: '2025-08-03');
    expect($certificate->getDate())->toBe('2025-08-03');
});

test('create method sets url correctly', function (): void {
    $certificate = Certificate::create(url: 'https://example.com');
    expect($certificate->getUrl())->toBe('https://example.com');
});

test('create method sets issuer correctly', function (): void {
    $certificate = Certificate::create(issuer: 'Certification Authority');
    expect($certificate->getIssuer())->toBe('Certification Authority');
});

test('create method sets all properties correctly', function (): void {
    $certificate = Certificate::create(
        name: 'PHP Certification',
        date: '2025-08-03',
        url: 'https://example.com',
        issuer: 'Certification Authority'
    )->validate();

    expect($certificate->getName())->toBe('PHP Certification')
        ->and($certificate->getDate())->toBe('2025-08-03')
        ->and($certificate->getUrl())->toBe('https://example.com')
        ->and($certificate->getIssuer())->toBe('Certification Authority');
});

test('create method sets all properties correctly with setters', function (): void {
    $certificate = Certificate::create()
        ->setName('PHP Certification')
        ->setDate('2025-08-03')
        ->setUrl('https://example.com')
        ->setIssuer('Certification Authority')
        ->validate();

    expect($certificate->getName())->toBe('PHP Certification')
        ->and($certificate->getDate())->toBe('2025-08-03')
        ->and($certificate->getUrl())->toBe('https://example.com')
        ->and($certificate->getIssuer())->toBe('Certification Authority');
});
