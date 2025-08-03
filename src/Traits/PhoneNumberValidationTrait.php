<?php

declare(strict_types=1);

namespace Muliacode\Resume\Traits;

use Muliacode\Resume\Exceptions\InvalidPhoneNumberException;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

trait PhoneNumberValidationTrait
{
    protected function validatePhoneNumber(?string $phone): void
    {
        if ($phone === null) {
            return;
        }

        try {
            Validator::phone()->assert($phone);
        } catch (ValidationException $e) {
            throw new InvalidPhoneNumberException($phone, 0, $e);
        }
    }
}
