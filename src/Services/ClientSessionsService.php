<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\ClientSessions\ClientSessionCreateParams\ProxyCountry;
use Onlyfansapi\ClientSessions\ClientSessionNewResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\ClientSessionsContract;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
