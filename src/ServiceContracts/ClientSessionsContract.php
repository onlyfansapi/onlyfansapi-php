<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\ClientSessions\ClientSessionCreateParams\ProxyCountry;
use OnlyFansAPI\ClientSessions\ClientSessionNewResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface ClientSessionsContract
{
    /**
     * @api
     *
     * @param string $displayName display Name of the account visible in your OnlyFansAPI Console Dashboard
     * @param string $clientReferenceID your Internal Reference ID for the connected account
     * @param ProxyCountry|value-of<ProxyCountry>|null $proxyCountry
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $displayName,
        ?string $clientReferenceID = null,
        ProxyCountry|string|null $proxyCountry = null,
        RequestOptions|array|null $requestOptions = null,
    ): ClientSessionNewResponse;
}
