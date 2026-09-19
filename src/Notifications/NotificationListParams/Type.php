<?php

declare(strict_types=1);

namespace OnlyFansAPI\Notifications\NotificationListParams;

/**
 * Filter notifications by a specific type.
 */
enum Type: string
{
    case ALL = 'all';

    case SUBSCRIPTIONS = 'subscriptions';

    case ONLYFANS = 'onlyfans';

    case PURCHASES = 'purchases';

    case TIPS = 'tips';

    case TAGS = 'tags';

    case COMMENTS = 'comments';

    case MENTIONS = 'mentions';

    case LIKES = 'likes';

    case PROMOTIONS = 'promotions';
}
