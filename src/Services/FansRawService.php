<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\Fans\FanListActiveParams;
use Onlyfansapi\Fans\FanListActiveParams\Filter;
use Onlyfansapi\Fans\FanListActiveResponse;
use Onlyfansapi\Fans\FanListAllParams;
use Onlyfansapi\Fans\FanListAllResponse;
use Onlyfansapi\Fans\FanListExpiredParams;
use Onlyfansapi\Fans\FanListExpiredResponse;
use Onlyfansapi\Fans\FanListLatestParams;
use Onlyfansapi\Fans\FanListLatestResponse;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\FansRawContract;

/**
 * APIs for managing OnlyFans fans (subscribers).
 *
 * @phpstan-import-type FilterShape from \Onlyfansapi\Fans\FanListActiveParams\Filter
 * @phpstan-import-type FilterShape from \Onlyfansapi\Fans\FanListAllParams\Filter as FilterShape1
 * @phpstan-import-type FilterShape from \Onlyfansapi\Fans\FanListExpiredParams\Filter as FilterShape2
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
     * Get a paginated list of fans for an Account. Newest fans are first.
     *
     * @param string $account The Account ID
     * @param array{
     *   filter?: Filter|FilterShape,
     *   limit?: string|null,
     *   offset?: string|null,
     *   type?: string|null,
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
     *   limit?: string|null,
     *   offset?: string|null,
     *   type?: string|null,
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
     *   limit?: string|null,
     *   offset?: string|null,
     *   type?: string|null,
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
     *   limit?: string|null,
     *   offset?: string|null,
     *   startDate?: string|null,
     *   type?: string|null,
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
}
