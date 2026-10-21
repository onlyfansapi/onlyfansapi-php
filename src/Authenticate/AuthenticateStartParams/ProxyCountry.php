<?php

declare(strict_types=1);

namespace OnlyFansAPI\Authenticate\AuthenticateStartParams;

/**
 * The country of the managed proxy server you want to use. Eg. "us" for United States. Cannot be used together with customProxy.
 */
enum ProxyCountry: string
{
    case US = 'us';

    case UK = 'uk';

    case GB = 'gb';
}
