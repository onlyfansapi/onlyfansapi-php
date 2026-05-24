<?php

declare(strict_types=1);

namespace Onlyfansapi\Authenticate\AuthenticateStartParams;

/**
 * The country of the proxy server you want to use. Eg. "us" for United States.
 */
enum ProxyCountry: string
{
    case US = 'us';

    case UK = 'uk';

    case DE = 'de';

    case ES = 'es';

    case FR = 'fr';

    case IT = 'it';

    case UA = 'ua';

    case PL = 'pl';

    case RO = 'ro';

    case CZ = 'cz';

    case HU = 'hu';

    case SK = 'sk';
}
