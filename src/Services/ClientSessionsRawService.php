<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\ClientSessions\ClientSessionCreateParams;
use OnlyFansAPI\ClientSessions\ClientSessionCreateParams\ProxyCountry;
use OnlyFansAPI\ClientSessions\ClientSessionNewResponse;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\ClientSessionsRawContract;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class ClientSessionsRawService implements ClientSessionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create Client Session Token for later use in embedded auth components - eg. via @onlyfansapi/auth npm package.
     *
     * @param array{
     *   displayName: string,
     *   clientReferenceID?: string,
     *   proxyCountry?: ProxyCountry|value-of<ProxyCountry>|null,
     * }|ClientSessionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ClientSessionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|ClientSessionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ClientSessionCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/client-sessions',
            body: (object) $parsed,
            options: $options,
            convert: ClientSessionNewResponse::class,
        );
    }
}
