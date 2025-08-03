<?php

declare(strict_types=1);

namespace Muliacode\Resume\Traits;

use Muliacode\Resume\Exceptions\InvalidUrlException;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

trait UrlValidationTrait
{
    protected function validateUrl(?string $url): void
    {
        if ($url === null) {
            return;
        }

        try {
            Validator::url()->assert($url);
        } catch (ValidationException $e) {
            throw new InvalidUrlException($url, 0, $e);
        }
    }
}
