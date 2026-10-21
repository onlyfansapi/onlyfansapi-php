<?php

namespace OnlyFansAPI\Core\Exceptions;

class NotFoundException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'OnlyFansAPI Not Found Exception';
}
