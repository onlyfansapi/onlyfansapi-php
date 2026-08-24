<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Following\FollowingListActiveParams\Filter;
use OnlyFansAPI\Following\FollowingListActiveParams\Sort;
use OnlyFansAPI\Following\FollowingListActiveParams\SortDirection;
use OnlyFansAPI\Following\FollowingListActiveResponse;
use OnlyFansAPI\Following\FollowingListAllResponse;
use OnlyFansAPI\Following\FollowingListExpiredResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \OnlyFansAPI\Following\FollowingListActiveParams\Filter
 * @phpstan-import-type FilterShape from \OnlyFansAPI\Following\FollowingListAllParams\Filter as FilterShape1
 * @phpstan-import-type FilterShape from \OnlyFansAPI\Following\FollowingListExpiredParams\Filter as FilterShape2
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface FollowingContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param Filter|FilterShape $filter
     * @param int $limit Number of followings to return (1-50). Must be at least 1. Must not be greater than 50.
     * @param int $offset Pagination offset. Must be at least 0.
     * @param string|null $query search within following name/username
     * @param Sort|value-of<Sort>|null $sort Order the list by `last_activity` (the followed creator's last activity), `expire_date` (subscription expiry), `subscribe_date` (subscription start) or `is_expired` (expired first — OnlyFans only offers this one on the expired list). Omit it to keep whichever order is currently stored for the account. **Note:** OnlyFans persists this order account-wide, so it also applies to later requests that omit `sort` and to the creator's own onlyfans.com UI, until it is changed again. This field is required when <code>sortDirection</code> is present.
     * @param SortDirection|value-of<SortDirection>|null $sortDirection Direction for `sort`: `desc` (default) or `asc`. Requires `sort` to be set.
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
        Sort|string|null $sort = null,
        SortDirection|string|null $sortDirection = null,
        RequestOptions|array|null $requestOptions = null,
    ): FollowingListActiveResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param \OnlyFansAPI\Following\FollowingListAllParams\Filter|FilterShape1 $filter
     * @param int $limit Number of followings to return (1-50). Must be at least 1. Must not be greater than 50.
     * @param int $offset Pagination offset. Must be at least 0.
     * @param string|null $query search within following name/username
     * @param \OnlyFansAPI\Following\FollowingListAllParams\Sort|value-of<\OnlyFansAPI\Following\FollowingListAllParams\Sort>|null $sort Order the list by `last_activity` (the followed creator's last activity), `expire_date` (subscription expiry), `subscribe_date` (subscription start) or `is_expired` (expired first — OnlyFans only offers this one on the expired list). Omit it to keep whichever order is currently stored for the account. **Note:** OnlyFans persists this order account-wide, so it also applies to later requests that omit `sort` and to the creator's own onlyfans.com UI, until it is changed again. This field is required when <code>sortDirection</code> is present.
     * @param \OnlyFansAPI\Following\FollowingListAllParams\SortDirection|value-of<\OnlyFansAPI\Following\FollowingListAllParams\SortDirection>|null $sortDirection Direction for `sort`: `desc` (default) or `asc`. Requires `sort` to be set.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listAll(
        string $account,
        \OnlyFansAPI\Following\FollowingListAllParams\Filter|array|null $filter = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $query = null,
        \OnlyFansAPI\Following\FollowingListAllParams\Sort|string|null $sort = null,
        \OnlyFansAPI\Following\FollowingListAllParams\SortDirection|string|null $sortDirection = null,
        RequestOptions|array|null $requestOptions = null,
    ): FollowingListAllResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param \OnlyFansAPI\Following\FollowingListExpiredParams\Filter|FilterShape2 $filter
     * @param int $limit Number of followings to return (1-50). Must be at least 1. Must not be greater than 50.
     * @param int $offset Pagination offset. Must be at least 0.
     * @param string|null $query search within following name/username
     * @param \OnlyFansAPI\Following\FollowingListExpiredParams\Sort|value-of<\OnlyFansAPI\Following\FollowingListExpiredParams\Sort>|null $sort Order the list by `last_activity` (the followed creator's last activity), `expire_date` (subscription expiry), `subscribe_date` (subscription start) or `is_expired` (expired first — OnlyFans only offers this one on the expired list). Omit it to keep whichever order is currently stored for the account. **Note:** OnlyFans persists this order account-wide, so it also applies to later requests that omit `sort` and to the creator's own onlyfans.com UI, until it is changed again. This field is required when <code>sortDirection</code> is present.
     * @param \OnlyFansAPI\Following\FollowingListExpiredParams\SortDirection|value-of<\OnlyFansAPI\Following\FollowingListExpiredParams\SortDirection>|null $sortDirection Direction for `sort`: `desc` (default) or `asc`. Requires `sort` to be set.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listExpired(
        string $account,
        \OnlyFansAPI\Following\FollowingListExpiredParams\Filter|array|null $filter = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $query = null,
        \OnlyFansAPI\Following\FollowingListExpiredParams\Sort|string|null $sort = null,
        \OnlyFansAPI\Following\FollowingListExpiredParams\SortDirection|string|null $sortDirection = null,
        RequestOptions|array|null $requestOptions = null,
    ): FollowingListExpiredResponse;
}
