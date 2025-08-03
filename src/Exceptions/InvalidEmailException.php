<?php

declare(strict_types=1);

namespace Muliacode\Resumify\Exceptions;

use InvalidArgumentException;
use Throwable;

final class InvalidEmailException extends InvalidArgumentException
{
    public function __construct(
        string    $email,
        int       $code = 0,
        ?Throwable $previous = null
    ) {
        $message = sprintf(
            '"%s" is not a valid email address.',
            $email,
        );
        parent::__construct($message, $code, $previous);
    }
}
