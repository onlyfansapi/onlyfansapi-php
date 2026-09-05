<?php

declare(strict_types=1);

namespace OnlyFansAPI\Posts\PostListParams;

/**
 * Order the returned posts (default = publish_date).
 */
enum Order: string
{
    case PUBLISH_DATE = 'publish_date';

    case FAVORITES_COUNT = 'favorites_count';

    case TIPS_SUMM = 'tips_summ';
}
