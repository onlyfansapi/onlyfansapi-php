<?php

declare(strict_types=1);

namespace Onlyfansapi\SmartLinks\SmartLinkListFansParams;

/**
 * Optional sort field. Default `-revenue_net`.
 */
enum Sort: string
{
    case REVENUE_NET = 'revenue_net';

    case MINUSREVENUE_NET = '-revenue_net';

    case TIPS_NET = 'tips_net';

    case MINUSTIPS_NET = '-tips_net';

    case MESSAGES_SENT_BY_FAN = 'messages_sent_by_fan';

    case MINUSMESSAGES_SENT_BY_FAN = '-messages_sent_by_fan';

    case CONVERTED_AT = 'converted_at';

    case MINUSCONVERTED_AT = '-converted_at';
}
