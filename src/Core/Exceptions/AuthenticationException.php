<?php

namespace OnlyFansAPI\Core\Exceptions;

class AuthenticationException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'OnlyFansAPI Authentication Exception';
}
