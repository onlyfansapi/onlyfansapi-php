<?php

declare(strict_types=1);

namespace Onlyfansapi\Search\SearchProfilesParams;

/**
 * Field to sort by. ⭐️ Only available on the Pro and Enterprise plan.
 */
enum Sort: string
{
    case LIKES = 'likes';

    case PHOTOS = 'photos';

    case VIDEOS = 'videos';

    case SUBSCRIBERS = 'subscribers';

    case SUBSCRIBE_PRICE = 'subscribe_price';

    case MIN_SUBSCRIBE_PRICE = 'min_subscribe_price';

    case JOIN_DATE = 'join_date';

    case LAST_SEEN = 'last_seen';
}
