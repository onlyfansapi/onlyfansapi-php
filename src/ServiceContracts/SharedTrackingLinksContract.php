<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\SharedTrackingLinks\SharedTrackingLinkListParams\Pagination;
use OnlyFansAPI\SharedTrackingLinks\SharedTrackingLinkListParams\SortingDeleted;
use OnlyFansAPI\SharedTrackingLinks\SharedTrackingLinkListParams\WithDeleted;
use OnlyFansAPI\SharedTrackingLinks\SharedTrackingLinkListResponse;
use OnlyFansAPI\SharedTrackingLinks\SharedTrackingLinkRevokeAccessResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface SharedTrackingLinksContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param int $limit The number of shared tracking links to return. Default `10`. Must be at least 1. Must not be greater than 100.
     * @param int $offset The offset used for pagination. Default `0`. Must be at least 0.
     * @param Pagination|value-of<Pagination> $pagination Whether pagination metadata is enabled. Default `1`.
     * @param SortingDeleted|value-of<SortingDeleted> $sortingDeleted Whether deleted links participate in sorting. Default `1`.
     * @param string $stats Whether statistics are included. Default `true`. Must not be greater than 10 characters.
     * @param bool $synchronous wait for the database sync instead of processing it in the background
     * @param WithDeleted|value-of<WithDeleted> $withDeleted Whether to include deleted shared tracking links. Default `1`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        ?int $limit = null,
        ?int $offset = null,
        Pagination|int|null $pagination = null,
        SortingDeleted|int|null $sortingDeleted = null,
        ?string $stats = null,
        ?bool $synchronous = null,
        WithDeleted|int|null $withDeleted = null,
        RequestOptions|array|null $requestOptions = null,
    ): SharedTrackingLinkListResponse;

    /**
     * @api
     *
     * @param int $sharedTrackingLinkID The OnlyFans-side ID of the shared tracking link
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function revokeAccess(
        int $sharedTrackingLinkID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): SharedTrackingLinkRevokeAccessResponse;
}
