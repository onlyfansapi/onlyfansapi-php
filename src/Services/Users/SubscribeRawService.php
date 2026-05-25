<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Users;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Users\SubscribeRawContract;
use OnlyFansAPI\Users\Subscribe\SubscribeCreateParams;
use OnlyFansAPI\Users\Subscribe\SubscribeDeleteParams;
use OnlyFansAPI\Users\Subscribe\SubscribeDeleteResponse;
use OnlyFansAPI\Users\Subscribe\SubscribeNewResponse;

/**
 * APIs for fetching OnlyFans users.
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class SubscribeRawService implements SubscribeRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Subscribe to a user's profile.
     *
     * @param string $userID the OnlyFans ID of the user to subscribe to
     * @param array{account: string}|SubscribeCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscribeNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $userID,
        array|SubscribeCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SubscribeCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/users/%2$s/subscribe', $account, $userID],
            options: $options,
            convert: SubscribeNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Unsubscribe from a user's profile.
     *
     * @param string $userID path param: The OnlyFans ID of the user to subscribe to
     * @param array{account: string, reason: string}|SubscribeDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscribeDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $userID,
        array|SubscribeDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SubscribeDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['api/%1$s/users/%2$s/subscribe', $account, $userID],
            body: (object) array_diff_key($parsed, array_flip(['account'])),
            options: $options,
            convert: SubscribeDeleteResponse::class,
        );
    }
}
