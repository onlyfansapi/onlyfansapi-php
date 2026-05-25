<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\ClientSessions\ClientSessionCreateParams\ProxyCountry;
use OnlyFansAPI\ClientSessions\ClientSessionNewResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\ClientSessionsContract;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class ClientSessionsService implements ClientSessionsContract
{
    /**
     * @api
     */
    public ClientSessionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ClientSessionsRawService($client);
    }

    /**
     * @api
     *
     * Create Client Session Token for later use in embedded auth components - eg. via @onlyfansapi/auth npm package.
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
    ): ClientSessionNewResponse {
        $params = Util::removeNulls(
            [
                'displayName' => $displayName,
                'clientReferenceID' => $clientReferenceID,
                'proxyCountry' => $proxyCountry,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
