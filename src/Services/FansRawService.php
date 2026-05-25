<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\Fans\FanGetSubscriptionHistoryParams;
use OnlyFansAPI\Fans\FanGetSubscriptionHistoryResponse;
use OnlyFansAPI\Fans\FanListActiveParams;
use OnlyFansAPI\Fans\FanListActiveParams\Filter;
use OnlyFansAPI\Fans\FanListActiveParams\Type;
use OnlyFansAPI\Fans\FanListActiveResponse;
use OnlyFansAPI\Fans\FanListAllParams;
use OnlyFansAPI\Fans\FanListAllResponse;
use OnlyFansAPI\Fans\FanListExpiredParams;
use OnlyFansAPI\Fans\FanListExpiredResponse;
use OnlyFansAPI\Fans\FanListLatestParams;
use OnlyFansAPI\Fans\FanListLatestResponse;
use OnlyFansAPI\Fans\FanListTopParams;
use OnlyFansAPI\Fans\FanListTopParams\By;
use OnlyFansAPI\Fans\FanListTopResponse;
use OnlyFansAPI\Fans\FanSetCustomNameParams;
use OnlyFansAPI\Fans\FanSetCustomNameResponse;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\FansRawContract;

/**
 * APIs for managing OnlyFans fans (subscribers).
 *
 * @phpstan-import-type FilterShape from \OnlyFansAPI\Fans\FanListActiveParams\Filter
 * @phpstan-import-type FilterShape from \OnlyFansAPI\Fans\FanListAllParams\Filter as FilterShape1
 * @phpstan-import-type FilterShape from \OnlyFansAPI\Fans\FanListExpiredParams\Filter as FilterShape2
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class FansRawService implements FansRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get Subscription History for a given OnlyFans User ID. This can be useful, for example, when the user's subscribed to your account for the first time.
     *
     * @param string $userID the OnlyFans ID of the User
     * @param array{account: string}|FanGetSubscriptionHistoryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FanGetSubscriptionHistoryResponse>
     *
     * @throws APIException
     */
    public function getSubscriptionHistory(
        string $userID,
        array|FanGetSubscriptionHistoryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FanGetSubscriptionHistoryParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/fans/%2$s/subscriptions-history', $account, $userID],
            options: $options,
            convert: FanGetSubscriptionHistoryResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a paginated list of fans for an Account. Newest fans are first.
     *
     * @param string $account The Account ID
     * @param array{
     *   filter?: Filter|FilterShape,
     *   limit?: int,
     *   offset?: int,
     *   query?: string|null,
     *   type?: Type|value-of<Type>,
     * }|FanListActiveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FanListActiveResponse>
     *
     * @throws APIException
     */
    public function listActive(
        string $account,
        array|FanListActiveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FanListActiveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/fans/active', $account],
            query: $parsed,
            options: $options,
            convert: FanListActiveResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a paginated list of fans for an Account. Newest fans are first.
     *
     * @param string $account The Account ID
     * @param array{
     *   filter?: FanListAllParams\Filter|FilterShape1,
     *   limit?: int,
     *   offset?: int,
     *   query?: string|null,
     *   type?: FanListAllParams\Type|value-of<FanListAllParams\Type>,
     * }|FanListAllParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FanListAllResponse>
     *
     * @throws APIException
     */
    public function listAll(
        string $account,
        array|FanListAllParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FanListAllParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/fans/all', $account],
            query: $parsed,
            options: $options,
            convert: FanListAllResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a paginated list of expired fans for an Account. Newest fans are first.
     *
     * @param string $account The Account ID
     * @param array{
     *   filter?: FanListExpiredParams\Filter|FilterShape2,
     *   limit?: int,
     *   offset?: int,
     *   query?: string|null,
     *   type?: FanListExpiredParams\Type|value-of<FanListExpiredParams\Type>,
     * }|FanListExpiredParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FanListExpiredResponse>
     *
     * @throws APIException
     */
    public function listExpired(
        string $account,
        array|FanListExpiredParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FanListExpiredParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/fans/expired', $account],
            query: $parsed,
            options: $options,
            convert: FanListExpiredResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a paginated list fans, filterable by total, only new subscribers, or only renewals. Newest fans are first.
     *
     * @param string $account The Account ID
     * @param array{
     *   endDate?: string|null,
     *   limit?: int,
     *   offset?: int,
     *   startDate?: string|null,
     *   type?: FanListLatestParams\Type|value-of<FanListLatestParams\Type>|null,
     * }|FanListLatestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FanListLatestResponse>
     *
     * @throws APIException
     */
    public function listLatest(
        string $account,
        array|FanListLatestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FanListLatestParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/fans/latest', $account],
            query: Util::array_transform_keys(
                $parsed,
                ['endDate' => 'end_date', 'startDate' => 'start_date']
            ),
            options: $options,
            convert: FanListLatestResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a list of top fans sorted by spending. Filterable by total, subscriptions, tips, messages, posts, or streams.
     *
     * @param string $account The Account ID
     * @param array{
     *   by?: By|value-of<By>|null, endDate?: string|null, startDate?: string|null
     * }|FanListTopParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FanListTopResponse>
     *
     * @throws APIException
     */
    public function listTop(
        string $account,
        array|FanListTopParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FanListTopParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/fans/top', $account],
            query: Util::array_transform_keys(
                $parsed,
                ['endDate' => 'end_date', 'startDate' => 'start_date']
            ),
            options: $options,
            convert: FanListTopResponse::class,
        );
    }

    /**
     * @api
     *
     * Change the Fan's Custom Name shown in OnlyFans
     *
     * @param string $fanID Path param: Fan's OnlyFans ID
     * @param array{account: string, customName: string}|FanSetCustomNameParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FanSetCustomNameResponse>
     *
     * @throws APIException
     */
    public function setCustomName(
        string $fanID,
        array|FanSetCustomNameParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FanSetCustomNameParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['api/%1$s/fans/%2$s/custom-name', $account, $fanID],
            body: (object) array_diff_key($parsed, array_flip(['account'])),
            options: $options,
            convert: FanSetCustomNameResponse::class,
        );
    }
}
