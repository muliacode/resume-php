<?php

declare(strict_types=1);

namespace Muliacode\Resume\Traits;

use Muliacode\Resume\Exceptions\InvalidPostalCodeException;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

trait PostalCodeValidationTrait
{
    protected function validatePostalCode(?string $postalCode, string $countryCode): void
    {
        if ($postalCode === null) {
            return;
        }

        try {
            Validator::postalCode($countryCode)->assert($postalCode);
        } catch (ValidationException $e) {
            throw new InvalidPostalCodeException($postalCode, $countryCode, 0, $e);
        }
    }
}
