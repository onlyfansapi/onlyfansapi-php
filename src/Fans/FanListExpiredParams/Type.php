<?php

declare(strict_types=1);

namespace Onlyfansapi\Fans\FanListExpiredParams;

/**
 * Filter by fan type.
 */
enum Type: string
{
    case ACTIVE = 'active';

    case EXPIRED = 'expired';

    case ALL = 'all';
}
