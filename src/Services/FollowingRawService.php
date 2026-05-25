<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Following\FollowingListActiveParams;
use OnlyFansAPI\Following\FollowingListActiveParams\Filter;
use OnlyFansAPI\Following\FollowingListActiveResponse;
use OnlyFansAPI\Following\FollowingListAllParams;
use OnlyFansAPI\Following\FollowingListAllResponse;
use OnlyFansAPI\Following\FollowingListExpiredParams;
use OnlyFansAPI\Following\FollowingListExpiredResponse;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\FollowingRawContract;

/**
 * APIs for managing OnlyFans followings (people you're subscribed to).
 *
 * @phpstan-import-type FilterShape from \OnlyFansAPI\Following\FollowingListActiveParams\Filter
 * @phpstan-import-type FilterShape from \OnlyFansAPI\Following\FollowingListAllParams\Filter as FilterShape1
 * @phpstan-import-type FilterShape from \OnlyFansAPI\Following\FollowingListExpiredParams\Filter as FilterShape2
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class FollowingRawService implements FollowingRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get a paginated list of followings for an Account. Newest followings are first.
     *
     * @param string $account The Account ID
     * @param array{
     *   filter?: Filter|FilterShape, limit?: int, offset?: int, query?: string|null
     * }|FollowingListActiveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FollowingListActiveResponse>
     *
     * @throws APIException
     */
    public function listActive(
        string $account,
        array|FollowingListActiveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FollowingListActiveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/following/active', $account],
            query: $parsed,
            options: $options,
            convert: FollowingListActiveResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a paginated list of followings for an Account. Newest followings are first.
     *
     * @param string $account The Account ID
     * @param array{
     *   filter?: FollowingListAllParams\Filter|FilterShape1,
     *   limit?: int,
     *   offset?: int,
     *   query?: string|null,
     * }|FollowingListAllParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FollowingListAllResponse>
     *
     * @throws APIException
     */
    public function listAll(
        string $account,
        array|FollowingListAllParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FollowingListAllParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/following/all', $account],
            query: $parsed,
            options: $options,
            convert: FollowingListAllResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a paginated list of expired followings for an Account. Newest followings are first.
     *
     * @param string $account The Account ID
     * @param array{
     *   filter?: FollowingListExpiredParams\Filter|FilterShape2,
     *   limit?: int,
     *   offset?: int,
     *   query?: string|null,
     * }|FollowingListExpiredParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FollowingListExpiredResponse>
     *
     * @throws APIException
     */
    public function listExpired(
        string $account,
        array|FollowingListExpiredParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FollowingListExpiredParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/following/expired', $account],
            query: $parsed,
            options: $options,
            convert: FollowingListExpiredResponse::class,
        );
    }
}
