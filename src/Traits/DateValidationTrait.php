<?php

declare(strict_types=1);

namespace Muliacode\Resume\Traits;

use Muliacode\Resume\Exceptions\InvalidDateFormatException;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

trait DateValidationTrait
{
    /**
     * Validates a date string against a specified format. Throws an exception if the date is invalid.
     *
     * @param string|null $date The date string to validate. If null, the validation is skipped.
     * @param string $format The expected date format, defaults to iso8601 (date-only)
     * @throws InvalidDateFormatException If the date does not match the expected format.
     */
    protected function validateDate(
        ?string $date = null,
        string $format = "Y-m-d"
    ): void {
        if ($date === null) {
            return;
        }

        try {
            Validator::date($format)->assert($date);
        } catch (ValidationException $e) {
            throw new InvalidDateFormatException($date, $format, 0, $e);
        }
    }
}
