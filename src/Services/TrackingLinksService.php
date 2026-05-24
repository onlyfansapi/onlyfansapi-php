<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\TrackingLinksContract;
use Onlyfansapi\Services\TrackingLinks\TagsService;
use Onlyfansapi\TrackingLinks\TrackingLinkDeleteResponse;
use Onlyfansapi\TrackingLinks\TrackingLinkGetCohortArpsParams\RevenueBasis;
use Onlyfansapi\TrackingLinks\TrackingLinkGetResponse;
use Onlyfansapi\TrackingLinks\TrackingLinkGetStatsResponse;
use Onlyfansapi\TrackingLinks\TrackingLinkListParams\Sort;
use Onlyfansapi\TrackingLinks\TrackingLinkListParams\Sortby;
use Onlyfansapi\TrackingLinks\TrackingLinkListResponse;
use Onlyfansapi\TrackingLinks\TrackingLinkListSpendersResponse;
use Onlyfansapi\TrackingLinks\TrackingLinkListSubscribersResponse;
use Onlyfansapi\TrackingLinks\TrackingLinkNewResponse;

/**
 * APIs for managing tracking links.
 *
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class TrackingLinksService implements TrackingLinksContract
{
    /**
     * @api
     */
    public TrackingLinksRawService $raw;

    /**
     * @api
     */
    public TagsService $tags;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TrackingLinksRawService($client);
        $this->tags = new TagsService($client);
    }

    /**
     * @api
     *
     * Create a new Tracking Link for the account
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
    ): TrackingLinkNewResponse {
        $params = Util::removeNulls(['name' => $name, 'tags' => $tags]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get individual Tracking Link details and it's revenue data
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
    ): TrackingLinkGetResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($trackingLinkID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all tracking links for the account and revenue data
     *
     * @param string $account The Account ID
     * @param string|null $endDate The end date for Tracking Links. Keep empty to get all.
     * @param int|null $limit The number of tracking links to return. Default `3`
     * @param int|null $offset The offset used for pagination. Default `0`
     * @param Sort|value-of<Sort>|null $sort Sort the results. Default `desc`
     * @param Sortby|value-of<Sortby>|null $sortby Sort by subscriber count (claims), or creation date
     * @param string|null $startDate The start date for Tracking Links. Keep empty to get all.
     * @param bool|null $synchronous Wait for the revenue data to finish processing, instead of processing in the background. **Will result in longer response times, use with caution**. Default `false`
     * @param bool|null $withDeleted Whether or not to include deleted tracking links in the response. Default `false`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        ?string $endDate = null,
        ?int $limit = null,
        ?int $offset = null,
        Sort|string|null $sort = null,
        Sortby|string|null $sortby = null,
        ?string $startDate = null,
        ?bool $synchronous = null,
        ?bool $withDeleted = null,
        RequestOptions|array|null $requestOptions = null,
    ): TrackingLinkListResponse {
        $params = Util::removeNulls(
            [
                'endDate' => $endDate,
                'limit' => $limit,
                'offset' => $offset,
                'sort' => $sort,
                'sortby' => $sortby,
                'startDate' => $startDate,
                'synchronous' => $synchronous,
                'withDeleted' => $withDeleted,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a Tracking Link
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
    ): TrackingLinkDeleteResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($trackingLinkID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get per-link time-to-profit cohort ARPS windows for a specific Tracking Link
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
    ): mixed {
        $params = Util::removeNulls(
            [
                'account' => $account,
                'acquisitionEnd' => $acquisitionEnd,
                'acquisitionStart' => $acquisitionStart,
                'revenueBasis' => $revenueBasis,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getCohortArps($trackingLinkID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): TrackingLinkGetStatsResponse {
        $params = Util::removeNulls(
            ['account' => $account, 'dateEnd' => $dateEnd, 'dateStart' => $dateStart]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getStats($trackingLinkID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get list of spenders who made purchases through a Tracking Link
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
    ): TrackingLinkListSpendersResponse {
        $params = Util::removeNulls(
            [
                'account' => $account,
                'limit' => $limit,
                'minSpend' => $minSpend,
                'offset' => $offset,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listSpenders($trackingLinkID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get list of subscribers who joined through a Tracking Link
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
    ): TrackingLinkListSubscribersResponse {
        $params = Util::removeNulls(
            ['account' => $account, 'limit' => $limit, 'offset' => $offset]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listSubscribers($trackingLinkID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
