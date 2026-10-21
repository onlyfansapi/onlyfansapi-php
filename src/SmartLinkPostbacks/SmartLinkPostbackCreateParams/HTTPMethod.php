<?php

declare(strict_types=1);

namespace OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackCreateParams;

/**
 * HTTP method used for the postback request. Defaults to `GET` when omitted.
 */
enum HTTPMethod: string
{
    case GET = 'GET';

    case POST = 'POST';
}
