<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\ClientSessions\ClientSessionCreateParams;
use Onlyfansapi\ClientSessions\ClientSessionCreateParams\ProxyCountry;
use Onlyfansapi\ClientSessions\ClientSessionNewResponse;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\ClientSessionsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
