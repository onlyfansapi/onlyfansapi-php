<?php

declare(strict_types=1);

namespace Onlyfansapi\Subscribers\SubscriberRetrieveStatisticsParams;

/**
 * Filter the subscriber statistics (default = total).
 */
enum Type: string
{
    case TOTAL = 'total';

    case RENEW = 'renew';

    case NEW = 'new';
}
