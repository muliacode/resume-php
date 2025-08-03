<?php

declare(strict_types=1);

namespace Muliacode\Resumify\Tests\Traits;

use Muliacode\Resumify\Exceptions\InvalidDateFormatException;
use Muliacode\Resumify\Traits\DateValidationTrait;

it('validates a valid date in default format', function (): void {
    $trait = new class {
        use DateValidationTrait;

        public function testMethod(?string $date): void
        {
            $this->validateDate($date);
        }
    };

    $trait->testMethod('2025-08-03');
})->throwsNoExceptions();

it('throws an exception for invalid date format', function (): void {
    $trait = new class {
        use DateValidationTrait;

        public function testMethod(?string $date): void
        {
            $this->validateDate($date);
        }
    };

    expect(fn () => $trait->testMethod('03-08-2025'))->toThrow(InvalidDateFormatException::class);
});

it('validates a valid date in custom format', function (): void {
    $trait = new class {
        use DateValidationTrait;

        public function testMethod(?string $date, string $format): void
        {
            $this->validateDate($date, $format);
        }
    };

    $trait->testMethod('03-08-2025', 'd-m-Y');
})->throwsNoExceptions();

it('throws an exception for null date', function (): void {
    $trait = new class {
        use DateValidationTrait;

        public function testMethod(?string $date): void
        {
            $this->validateDate($date);
        }
    };

    $trait->testMethod(null);
})->throwsNoExceptions();
