<?php

declare(strict_types=1);

namespace Onlyfansapi\Fans\FanListAllParams\Filter;

/**
 * Filter by online status (`1` for online fans).
 */
enum Online: int
{
    case _1 = 1;

    case _0 = 0;
}
