<?php

declare(strict_types=1);

namespace OnlyFansAPI\Statistics\StatisticGetOverviewParams;

/**
 * The type of statistics to retrieve (default = empty).
 */
enum Type: string
{
    case FANS = 'fans';

    case VISITORS = 'visitors';

    case POSTS = 'posts';

    case MESSAGES = 'messages';
}
