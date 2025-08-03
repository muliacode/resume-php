<?php

declare(strict_types=1);

namespace Muliacode\Resumify\Tests\Traits;

use Muliacode\Resumify\Exceptions\InvalidPhoneNumberException;
use Muliacode\Resumify\Traits\PhoneNumberValidationTrait;

test('validatePhoneNumber accepts a valid phone number', function (): void {
    $trait = new class {
        use PhoneNumberValidationTrait;

        public function testValidatePhoneNumber(?string $phone): void
        {
            $this->validatePhoneNumber($phone);
        }
    };

    $validPhoneNumber = '+1234567890';
    $trait->testValidatePhoneNumber($validPhoneNumber);
})->throwsNoExceptions();

test('validatePhoneNumber throws InvalidPhoneNumberException for invalid phone number', function (): void {
    $trait = new class {
        use PhoneNumberValidationTrait;

        public function testValidatePhoneNumber(?string $phone): void
        {
            $this->validatePhoneNumber($phone);
        }
    };

    $invalidPhoneNumber = 'invalid-phone';
    expect(fn () => $trait->testValidatePhoneNumber($invalidPhoneNumber))->toThrow(InvalidPhoneNumberException::class);
});

test('validatePhoneNumber allows null phone number', function (): void {
    $trait = new class {
        use PhoneNumberValidationTrait;

        public function testValidatePhoneNumber(?string $phone): void
        {
            $this->validatePhoneNumber($phone);
        }
    };

    $trait->testValidatePhoneNumber(null);
})->throwsNoExceptions();
