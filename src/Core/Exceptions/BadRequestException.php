<?php

namespace OnlyFansAPI\Core\Exceptions;

class BadRequestException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'OnlyFansAPI Bad Request Exception';
}
