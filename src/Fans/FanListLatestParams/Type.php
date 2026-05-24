<?php

declare(strict_types=1);

namespace Onlyfansapi\Fans\FanListLatestParams;

/**
 * Filter by type: total, renew, or new.
 */
enum Type: string
{
    case TOTAL = 'total';

    case RENEW = 'renew';

    case NEW = 'new';
}
