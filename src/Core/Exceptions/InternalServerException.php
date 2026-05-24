<?php

namespace Onlyfansapi\Core\Exceptions;

class InternalServerException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Onlyfansapi Internal Server Exception';
}
