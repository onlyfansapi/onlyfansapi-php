<?php

declare(strict_types=1);

namespace Onlyfansapi\Analytics\Summary\SummaryGetPeriodComparisonParams;

/**
 * The statistic type to compare.
 */
enum StatType: string
{
    case TOTAL_EARNINGS = 'totalEarnings';

    case SUBSCRIPTIONS = 'subscriptions';

    case POSTS = 'posts';

    case MESSAGES = 'messages';

    case TIPS = 'tips';

    case STREAMS = 'streams';
}
