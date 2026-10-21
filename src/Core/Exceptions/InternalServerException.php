<?php

namespace OnlyFansAPI\Core\Exceptions;

class InternalServerException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'OnlyFansAPI Internal Server Exception';
}
