<?php

declare(strict_types=1);

namespace Muliacode\Resumify\Tests\Traits;

use Muliacode\Resumify\Exceptions\InvalidCountryCodeException;
use Muliacode\Resumify\Traits\CountryCodeValidationTrait;

it('passes validation for a valid country code', function (): void {
    $trait = new class {
        use CountryCodeValidationTrait;

        public function testValidate(?string $code): void
        {
            $this->validateCountryCode($code);
        }
    };

    $trait->testValidate('US');
})->throwsNoExceptions();

it('throws an exception for an invalid country code', function (): void {
    $trait = new class {
        use CountryCodeValidationTrait;

        public function testValidate(?string $code): void
        {
            $this->validateCountryCode($code);
        }
    };

    expect(fn () => $trait->testValidate('XYZ'))->toThrow(InvalidCountryCodeException::class);
});

it('passes validation when country code is null', function (): void {
    $trait = new class {
        use CountryCodeValidationTrait;

        public function testValidate(?string $code): void
        {
            $this->validateCountryCode($code);
        }
    };

    $trait->testValidate(null);
})->throwsNoExceptions();
