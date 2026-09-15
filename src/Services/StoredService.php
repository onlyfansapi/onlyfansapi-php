<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\StoredContract;
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
final class StoredService implements StoredContract
{
    /**
     * @api
     */
    public StoredRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new StoredRawService($client);
    }

    /**
     * @api
     *
     * List all shared Tracking Links from the OnlyFansAPI Cache. This is a free endpoint that does not call the OnlyFans API.
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
    ): StoredListSharedTrackingLinksResponse {
        $params = Util::removeNulls(
            ['filter' => $filter, 'limit' => $limit, 'offset' => $offset]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listSharedTrackingLinks($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all shared Free Trial Links from the OnlyFansAPI Cache. This is a free endpoint that does not call the OnlyFans API.
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
    ): StoredListSharedTrialLinksResponse {
        $params = Util::removeNulls(
            ['filter' => $filter, 'limit' => $limit, 'offset' => $offset]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listSharedTrialLinks($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all stored tracking links from the OnlyFansAPI Cache. This is a free endpoint that does not call the OnlyFans API.
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
    ): StoredListTrackingLinksResponse {
        $params = Util::removeNulls(
            ['filter' => $filter, 'limit' => $limit, 'offset' => $offset]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listTrackingLinks($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all stored free trial links from the OnlyFansAPI Cache. This is a free endpoint that does not call the OnlyFans API.
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
    ): StoredListTrialLinksResponse {
        $params = Util::removeNulls(
            ['filter' => $filter, 'limit' => $limit, 'offset' => $offset]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listTrialLinks($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
