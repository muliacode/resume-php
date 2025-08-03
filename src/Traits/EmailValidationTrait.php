<?php

declare(strict_types=1);

namespace Muliacode\Resumify\Traits;

use Muliacode\Resumify\Exceptions\InvalidEmailException;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

trait EmailValidationTrait
{
    protected function validateEmail(?string $email): void
    {
        if ($email === null) {
            return;
        }

        try {
            Validator::email()->assert($email);
        } catch (ValidationException $e) {
            throw new InvalidEmailException($email, 0, $e);
        }
    }
}
