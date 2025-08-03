<?php

declare(strict_types=1);

namespace Muliacode\Resumify\Tests\Traits;

use Muliacode\Resumify\Exceptions\InvalidUrlException;
use Muliacode\Resumify\Traits\UrlValidationTrait;

test('it does nothing if URL is null', function (): void {
    $trait = new class {
        use UrlValidationTrait;

        public function testValidateUrl(?string $url): void
        {
            $this->validateUrl($url);
        }
    };

    $trait->testValidateUrl(null);
})->throwsNoExceptions();

test('it validates a valid URL', function (): void {
    $trait = new class {
        use UrlValidationTrait;

        public function testValidateUrl(?string $url): void
        {
            $this->validateUrl($url);
        }
    };

    $trait->testValidateUrl('https://example.com');
})->throwsNoExceptions();

test('it throws an exception for an invalid URL', function (): void {
    $trait = new class {
        use UrlValidationTrait;

        public function testValidateUrl(?string $url): void
        {
            $this->validateUrl($url);
        }
    };

    expect(fn () => $trait->testValidateUrl('invalid-url'))->toThrow(InvalidUrlException::class);
});
