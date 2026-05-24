<?php

namespace Onlyfansapi\Core\Exceptions;

class AuthenticationException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Onlyfansapi Authentication Exception';
}
