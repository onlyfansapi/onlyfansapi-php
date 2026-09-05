<?php

namespace OnlyFansAPI\Core\Exceptions;

class UnprocessableEntityException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'OnlyFansAPI Unprocessable Entity Exception';
}
