<?php

declare(strict_types=1);

namespace OnlyFansAPI\Statistics\StatisticGetSubscriberMetricsParams;

/**
 * Use only with `detailed=true` - otherwise, it has no effect. Filter the subscriber statistics (default = total).
 */
enum DetailedType: string
{
    case TOTAL = 'total';

    case RENEW = 'renew';

    case NEW = 'new';
}
