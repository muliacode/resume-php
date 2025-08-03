<?php

declare(strict_types=1);

namespace Muliacode\Resumify\Exceptions;

use InvalidArgumentException;
use Throwable;

final class InvalidPhoneNumberException extends InvalidArgumentException
{
    public function __construct(
        string    $phone,
        int       $code = 0,
        ?Throwable $previous = null
    ) {
        $message = sprintf(
            'Phone number "%s" is not valid.',
            $phone,
        );
        parent::__construct($message, $code, $previous);
    }
}
