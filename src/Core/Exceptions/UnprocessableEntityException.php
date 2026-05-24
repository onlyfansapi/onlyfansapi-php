<?php

namespace Onlyfansapi\Core\Exceptions;

class UnprocessableEntityException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Onlyfansapi Unprocessable Entity Exception';
}
