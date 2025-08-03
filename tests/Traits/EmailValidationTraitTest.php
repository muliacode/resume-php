<?php

declare(strict_types=1);

namespace Muliacode\Resumify\Tests\Traits;

use Muliacode\Resumify\Exceptions\InvalidEmailException;
use Muliacode\Resumify\Traits\EmailValidationTrait;

it('validates a valid email successfully', function (): void {
    $trait = new class {
        use EmailValidationTrait;

        public function testValidateEmail(?string $email): void
        {
            $this->validateEmail($email);
        }
    };

    $trait->testValidateEmail('example@test.com');
})->throwsNoExceptions();

it('throws exception for an invalid email', function (): void {
    $trait = new class {
        use EmailValidationTrait;

        public function testValidateEmail(?string $email): void
        {
            $this->validateEmail($email);
        }
    };

    expect(fn () => $trait->testValidateEmail('invalid-email'))->toThrow(InvalidEmailException::class);
});

it('does not throw exception for null email', function (): void {
    $trait = new class {
        use EmailValidationTrait;

        public function testValidateEmail(?string $email): void
        {
            $this->validateEmail($email);
        }
    };

    $trait->testValidateEmail(null);
})->throwsNoExceptions();
