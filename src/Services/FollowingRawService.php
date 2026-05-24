<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Following\FollowingListActiveParams;
use Onlyfansapi\Following\FollowingListActiveParams\Filter;
use Onlyfansapi\Following\FollowingListAllParams;
use Onlyfansapi\Following\FollowingListExpiredParams;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\FollowingRawContract;

/**
 * APIs for managing OnlyFans followings (people you're subscribed to).
 *
 * @phpstan-import-type FilterShape from \Onlyfansapi\Following\FollowingListActiveParams\Filter
 * @phpstan-import-type FilterShape from \Onlyfansapi\Following\FollowingListAllParams\Filter as FilterShape1
 * @phpstan-import-type FilterShape from \Onlyfansapi\Following\FollowingListExpiredParams\Filter as FilterShape2
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
     *   filter?: Filter|FilterShape, limit?: int, offset?: int
     * }|FollowingListActiveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
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
            convert: null,
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
     * }|FollowingListAllParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
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
            convert: null,
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
     * }|FollowingListExpiredParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
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
            convert: null,
        );
    }
}
