<?php

namespace OnlyFansAPI\Core\Exceptions;

class ConflictException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'OnlyFansAPI Conflict Exception';
}
