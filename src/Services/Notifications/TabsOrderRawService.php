<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Notifications;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Notifications\TabsOrder\TabsOrderGetResponse;
use OnlyFansAPI\Notifications\TabsOrder\TabsOrderUpdateParams;
use OnlyFansAPI\Notifications\TabsOrder\TabsOrderUpdateResponse;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Notifications\TabsOrderRawContract;

/**
 * Endpoints for managingr account notifications.
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class TabsOrderRawService implements TabsOrderRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Update the order of an account's notification tabs as displayed on the OnlyFans notifications page
     *
     * @param string $account The Account ID
     * @param array{tabs: list<string>}|TabsOrderUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TabsOrderUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $account,
        array|TabsOrderUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TabsOrderUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['api/%1$s/notifications/tabs-order', $account],
            body: (object) $parsed,
            options: $options,
            convert: TabsOrderUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Get the order of an account's notification tabs as displayed on the OnlyFans notifications page
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TabsOrderGetResponse>
     *
     * @throws APIException
     */
    public function get(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/notifications/tabs-order', $account],
            options: $requestOptions,
            convert: TabsOrderGetResponse::class,
        );
    }
}
