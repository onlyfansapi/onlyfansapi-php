<?php

declare(strict_types=1);

namespace OnlyFansAPI\Fans\FanListTopParams;

/**
 * Sort by: total (default), subscribes, tips, messages, post, streams.
 */
enum By: string
{
    case TOTAL = 'total';

    case SUBSCRIBES = 'subscribes';

    case TIPS = 'tips';

    case MESSAGES = 'messages';

    case POST = 'post';

    case STREAMS = 'streams';
}
