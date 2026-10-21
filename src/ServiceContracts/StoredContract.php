<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\Stored\StoredListSharedTrackingLinksParams\Filter;
use OnlyFansAPI\Stored\StoredListSharedTrackingLinksResponse;
use OnlyFansAPI\Stored\StoredListSharedTrialLinksResponse;
use OnlyFansAPI\Stored\StoredListTrackingLinksResponse;
use OnlyFansAPI\Stored\StoredListTrialLinksResponse;

/**
 * @phpstan-import-type FilterShape from \OnlyFansAPI\Stored\StoredListSharedTrackingLinksParams\Filter
 * @phpstan-import-type FilterShape from \OnlyFansAPI\Stored\StoredListSharedTrialLinksParams\Filter as FilterShape1
 * @phpstan-import-type FilterShape from \OnlyFansAPI\Stored\StoredListTrackingLinksParams\Filter as FilterShape2
 * @phpstan-import-type FilterShape from \OnlyFansAPI\Stored\StoredListTrialLinksParams\Filter as FilterShape3
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface StoredContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param Filter|FilterShape $filter
     * @param int $limit The number of shared tracking links to return. Default `10`. Must be at least 1. Must not be greater than 1000.
     * @param int $offset The offset used for pagination. Default `0`. Must be at least 0.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listSharedTrackingLinks(
        string $account,
        Filter|array|null $filter = null,
        ?int $limit = null,
        ?int $offset = null,
        RequestOptions|array|null $requestOptions = null,
    ): StoredListSharedTrackingLinksResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param \OnlyFansAPI\Stored\StoredListSharedTrialLinksParams\Filter|FilterShape1 $filter
     * @param int $limit The number of shared trial links to return. Default `10`. Must be at least 1. Must not be greater than 1000.
     * @param int $offset The offset used for pagination. Default `0`. Must be at least 0.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listSharedTrialLinks(
        string $account,
        \OnlyFansAPI\Stored\StoredListSharedTrialLinksParams\Filter|array|null $filter = null,
        ?int $limit = null,
        ?int $offset = null,
        RequestOptions|array|null $requestOptions = null,
    ): StoredListSharedTrialLinksResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param \OnlyFansAPI\Stored\StoredListTrackingLinksParams\Filter|FilterShape2 $filter
     * @param int $limit The number of tracking links to return. Default `10`. Must be at least 1. Must not be greater than 1000.
     * @param int $offset The offset used for pagination. Default `0`. Must be at least 0.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listTrackingLinks(
        string $account,
        \OnlyFansAPI\Stored\StoredListTrackingLinksParams\Filter|array|null $filter = null,
        ?int $limit = null,
        ?int $offset = null,
        RequestOptions|array|null $requestOptions = null,
    ): StoredListTrackingLinksResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param \OnlyFansAPI\Stored\StoredListTrialLinksParams\Filter|FilterShape3 $filter
     * @param int $limit The number of trial links to return. Default `10`. Must be at least 1. Must not be greater than 1000.
     * @param int $offset The offset used for pagination. Default `0`. Must be at least 0.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listTrialLinks(
        string $account,
        \OnlyFansAPI\Stored\StoredListTrialLinksParams\Filter|array|null $filter = null,
        ?int $limit = null,
        ?int $offset = null,
        RequestOptions|array|null $requestOptions = null,
    ): StoredListTrialLinksResponse;
}
