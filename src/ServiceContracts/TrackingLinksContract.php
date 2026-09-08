<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\TrackingLinks\TrackingLinkDeleteResponse;
use OnlyFansAPI\TrackingLinks\TrackingLinkGetCohortArpsParams\RevenueBasis;
use OnlyFansAPI\TrackingLinks\TrackingLinkGetResponse;
use OnlyFansAPI\TrackingLinks\TrackingLinkGetStatsResponse;
use OnlyFansAPI\TrackingLinks\TrackingLinkListParams\Pagination;
use OnlyFansAPI\TrackingLinks\TrackingLinkListParams\Sort;
use OnlyFansAPI\TrackingLinks\TrackingLinkListParams\Sortby;
use OnlyFansAPI\TrackingLinks\TrackingLinkListParams\WithDeleted;
use OnlyFansAPI\TrackingLinks\TrackingLinkListResponse;
use OnlyFansAPI\TrackingLinks\TrackingLinkListSpendersResponse;
use OnlyFansAPI\TrackingLinks\TrackingLinkListSubscribersResponse;
use OnlyFansAPI\TrackingLinks\TrackingLinkNewResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface TrackingLinksContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param string $name The name of the Tracking Link
     * @param list<string> $tags array of tag names to add to the tracking link
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $account,
        string $name,
        ?array $tags = null,
        RequestOptions|array|null $requestOptions = null,
    ): TrackingLinkNewResponse;

    /**
     * @api
     *
     * @param string $trackingLinkID the ID of the tracking link
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $trackingLinkID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): TrackingLinkGetResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param string|null $endDate The end date for tracking links. Keep empty to get all. Must not be greater than 255 characters.
     * @param int $limit The number of tracking links to return. Default `10`. Must be at least 1. Must not be greater than 100.
     * @param int $offset The offset used for pagination. Default `0`. Must be at least 0.
     * @param Pagination|value-of<Pagination> $pagination
     * @param Sort|value-of<Sort> $sort Sort direction. Default `desc`.
     * @param Sortby|value-of<Sortby> $sortby sort by subscriber count (`claims`) or creation date (`created_date`)
     * @param string|null $startDate The start date for tracking links. Keep empty to get all. Must not be greater than 255 characters.
     * @param bool $synchronous wait for revenue calculation instead of processing it in the background
     * @param WithDeleted|value-of<WithDeleted> $withDeleted Whether to include deleted tracking links. Default `true`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        ?string $endDate = null,
        ?int $limit = null,
        ?int $offset = null,
        Pagination|int|null $pagination = null,
        Sort|string|null $sort = null,
        Sortby|string|null $sortby = null,
        ?string $startDate = null,
        ?bool $synchronous = null,
        WithDeleted|int|null $withDeleted = null,
        RequestOptions|array|null $requestOptions = null,
    ): TrackingLinkListResponse;

    /**
     * @api
     *
     * @param string $trackingLinkID the ID of the tracking link
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $trackingLinkID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): TrackingLinkDeleteResponse;

    /**
     * @api
     *
     * @param string $trackingLinkID path param: The ID of the tracking link
     * @param string $account Path param: The Account ID
     * @param string $acquisitionEnd Query param: Optional acquisition range end date
     * @param string $acquisitionStart Query param: Optional acquisition range start date
     * @param RevenueBasis|value-of<RevenueBasis> $revenueBasis Query param: Revenue basis. Defaults to `net`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getCohortArps(
        string $trackingLinkID,
        string $account,
        ?string $acquisitionEnd = null,
        ?string $acquisitionStart = null,
        RevenueBasis|string|null $revenueBasis = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $trackingLinkID path param: The ID of the tracking link
     * @param string $account Path param: The Account ID
     * @param string $dateEnd Query param: Optional stats range end date
     * @param string $dateStart Query param: Optional stats range start date
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getStats(
        string $trackingLinkID,
        string $account,
        ?string $dateEnd = null,
        ?string $dateStart = null,
        RequestOptions|array|null $requestOptions = null,
    ): TrackingLinkGetStatsResponse;

    /**
     * @api
     *
     * @param string $trackingLinkID Path param: The ID of the Tracking Link. Can be retrieved from the above store and list endpoints.
     * @param string $account Path param: The Account ID
     * @param int $limit Query param: The number of spenders to return per page. Default `50`.
     * @param float $minSpend Query param: Minimal spend of a fan. Default `1`. Must be at least 1.
     * @param int $offset Query param: The offset used for pagination. Default `0`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listSpenders(
        string $trackingLinkID,
        string $account,
        ?int $limit = null,
        ?float $minSpend = null,
        ?int $offset = null,
        RequestOptions|array|null $requestOptions = null,
    ): TrackingLinkListSpendersResponse;

    /**
     * @api
     *
     * @param string $trackingLinkID Path param: The ID of the Tracking Link. Can be retrieved from the above store and list endpoints.
     * @param string $account Path param: The Account ID
     * @param int $limit Query param: The number of subscribers to return per page. Default `10`
     * @param int $offset Query param: The offset used for pagination. Default `0`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listSubscribers(
        string $trackingLinkID,
        string $account,
        int $limit,
        int $offset,
        RequestOptions|array|null $requestOptions = null,
    ): TrackingLinkListSubscribersResponse;
}
