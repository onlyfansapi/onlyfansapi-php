<?php

declare(strict_types=1);

namespace OnlyFansAPI\Promotions\PromotionCreateParams;

/**
 * Whether this promotion should apply to new subscribers, expired subscribers, or both. **IMPORTANT: when set to new_and_expired, the OF will create two separate promotions.**.
 */
enum Type: string
{
    case NEW = 'new';

    case EXPIRED = 'expired';

    case NEW_AND_EXPIRED = 'new_and_expired';
}
