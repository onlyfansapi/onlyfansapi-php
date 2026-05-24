<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\Following\FollowingListActiveParams\Filter;
use Onlyfansapi\Following\FollowingListActiveResponse;
use Onlyfansapi\Following\FollowingListAllResponse;
use Onlyfansapi\Following\FollowingListExpiredResponse;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\FollowingContract;

/**
 * APIs for managing OnlyFans followings (people you're subscribed to).
 *
 * @phpstan-import-type FilterShape from \Onlyfansapi\Following\FollowingListActiveParams\Filter
 * @phpstan-import-type FilterShape from \Onlyfansapi\Following\FollowingListAllParams\Filter as FilterShape1
 * @phpstan-import-type FilterShape from \Onlyfansapi\Following\FollowingListExpiredParams\Filter as FilterShape2
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class FollowingService implements FollowingContract
{
    /**
     * @api
     */
    public FollowingRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new FollowingRawService($client);
    }

    /**
     * @api
     *
     * Get a paginated list of followings for an Account. Newest followings are first.
     *
     * @param string $account The Account ID
     * @param Filter|FilterShape $filter
     * @param int $limit Number of followings to return (1-50). Must be at least 1. Must not be greater than 50.
     * @param int $offset Pagination offset. Must be at least 0.
     * @param string|null $query search within following name/username
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listActive(
        string $account,
        Filter|array|null $filter = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $query = null,
        RequestOptions|array|null $requestOptions = null,
    ): FollowingListActiveResponse {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'limit' => $limit,
                'offset' => $offset,
                'query' => $query,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listActive($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a paginated list of followings for an Account. Newest followings are first.
     *
     * @param string $account The Account ID
     * @param \Onlyfansapi\Following\FollowingListAllParams\Filter|FilterShape1 $filter
     * @param int $limit Number of followings to return (1-50). Must be at least 1. Must not be greater than 50.
     * @param int $offset Pagination offset. Must be at least 0.
     * @param string|null $query search within following name/username
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listAll(
        string $account,
        \Onlyfansapi\Following\FollowingListAllParams\Filter|array|null $filter = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $query = null,
        RequestOptions|array|null $requestOptions = null,
    ): FollowingListAllResponse {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'limit' => $limit,
                'offset' => $offset,
                'query' => $query,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listAll($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a paginated list of expired followings for an Account. Newest followings are first.
     *
     * @param string $account The Account ID
     * @param \Onlyfansapi\Following\FollowingListExpiredParams\Filter|FilterShape2 $filter
     * @param int $limit Number of followings to return (1-50). Must be at least 1. Must not be greater than 50.
     * @param int $offset Pagination offset. Must be at least 0.
     * @param string|null $query search within following name/username
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listExpired(
        string $account,
        \Onlyfansapi\Following\FollowingListExpiredParams\Filter|array|null $filter = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $query = null,
        RequestOptions|array|null $requestOptions = null,
    ): FollowingListExpiredResponse {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'limit' => $limit,
                'offset' => $offset,
                'query' => $query,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listExpired($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
