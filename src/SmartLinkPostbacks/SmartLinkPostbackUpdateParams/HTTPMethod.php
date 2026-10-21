<?php

declare(strict_types=1);

namespace OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackUpdateParams;

/**
 * HTTP method used for the postback request. Existing value is kept when omitted.
 */
enum HTTPMethod: string
{
    case GET = 'GET';

    case POST = 'POST';
}
