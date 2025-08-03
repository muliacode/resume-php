<?php

declare(strict_types=1);

namespace Muliacode\Resumify\Tests\Traits;

use Muliacode\Resumify\Exceptions\InvalidPostalCodeException;
use Muliacode\Resumify\Traits\PostalCodeValidationTrait;

test('validates postal code successfully', function (): void {
    $trait = new class {
        use PostalCodeValidationTrait;

        public function testValidation(?string $postalCode, string $countryCode): void
        {
            $this->validatePostalCode($postalCode, $countryCode);
        }
    };

    $trait->testValidation('1234PB', 'NL');
})->throwsNoExceptions();

test('throws exception for invalid postal code', function (): void {
    $trait = new class {
        use PostalCodeValidationTrait;

        public function testValidation(?string $postalCode, string $countryCode): void
        {
            $this->validatePostalCode($postalCode, $countryCode);
        }
    };

    $invalidPostalCode = '1234';
    $countryCode = 'NL';

    expect(fn () => $trait->testValidation($invalidPostalCode, $countryCode))->toThrow(InvalidPostalCodeException::class);
});

test('does nothing when postal code is null', function (): void {
    $trait = new class {
        use PostalCodeValidationTrait;

        public function testValidation(?string $postalCode, string $countryCode): void
        {
            $this->validatePostalCode($postalCode, $countryCode);
        }
    };

    $trait->testValidation(null, "NL");
})->throwsNoExceptions();
