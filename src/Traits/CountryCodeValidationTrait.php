<?php

declare(strict_types=1);

namespace Muliacode\Resumify\Traits;

use Muliacode\Resumify\Exceptions\InvalidCountryCodeException;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Rules\CountryCode;
use Respect\Validation\Validator;

trait CountryCodeValidationTrait
{
    protected function validateCountryCode(?string $countryCode): void
    {
        if ($countryCode === null) {
            return;
        }

        try {
            Validator::countryCode(CountryCode::ALPHA2)->assert($countryCode);
        } catch (ValidationException $e) {
            throw new InvalidCountryCodeException($countryCode, 0, $e);
        }
    }
}
