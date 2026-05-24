<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\StoredContract;
use Onlyfansapi\Stored\StoredListSharedTrackingLinksResponse;
use Onlyfansapi\Stored\StoredListSharedTrialLinksResponse;
use Onlyfansapi\Stored\StoredListTrackingLinksResponse;
use Onlyfansapi\Stored\StoredListTrialLinksResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
     * @param string $filterSearch search campaign name, owner username, or a pasted OnlyFans tracking link URL
     * @param string $filterTags Filter by one or more tag names or slugs. Accepts CSV or repeated array values (`filter[tags][]=...`) and matches any tag. Tag namespace is shared with owned Tracking Links.
     * @param int $limit The number of shared tracking links to return. Default `10`
     * @param int $offset The offset used for pagination. Default `0`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listSharedTrackingLinks(
        string $account,
        ?string $filterSearch = null,
        ?string $filterTags = null,
        ?int $limit = null,
        ?int $offset = null,
        RequestOptions|array|null $requestOptions = null,
    ): StoredListSharedTrackingLinksResponse {
        $params = Util::removeNulls(
            [
                'filterSearch' => $filterSearch,
                'filterTags' => $filterTags,
                'limit' => $limit,
                'offset' => $offset,
            ],
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
     * @param string $filterSearch search shared trial link name, URL, or owner username
     * @param string $filterTags Filter by one or more tag names or slugs. Accepts CSV or repeated array values (`filter[tags][]=...`) and matches any tag. Tag namespace is shared with owned Free Trial Links.
     * @param int $limit The number of shared trial links to return. Default `10`
     * @param int $offset The offset used for pagination. Default `0`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listSharedTrialLinks(
        string $account,
        ?string $filterSearch = null,
        ?string $filterTags = null,
        ?int $limit = null,
        ?int $offset = null,
        RequestOptions|array|null $requestOptions = null,
    ): StoredListSharedTrialLinksResponse {
        $params = Util::removeNulls(
            [
                'filterSearch' => $filterSearch,
                'filterTags' => $filterTags,
                'limit' => $limit,
                'offset' => $offset,
            ],
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
     * @param bool $filterIncludeSmartLinks Include tracking links created by Smart Links. Default `false`
     * @param string $filterSearch search campaign name, creator username, or a pasted OnlyFans tracking link URL
     * @param string $filterTags Filter by one or more tag names or slugs. Accepts CSV or repeated array values (`filter[tags][]=...`) and matches any tag.
     * @param int $limit The number of tracking links to return. Default `10`
     * @param int $offset The offset used for pagination. Default `0`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listTrackingLinks(
        string $account,
        ?bool $filterIncludeSmartLinks = null,
        ?string $filterSearch = null,
        ?string $filterTags = null,
        ?int $limit = null,
        ?int $offset = null,
        RequestOptions|array|null $requestOptions = null,
    ): StoredListTrackingLinksResponse {
        $params = Util::removeNulls(
            [
                'filterIncludeSmartLinks' => $filterIncludeSmartLinks,
                'filterSearch' => $filterSearch,
                'filterTags' => $filterTags,
                'limit' => $limit,
                'offset' => $offset,
            ],
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
     * @param bool $filterIncludeSmartLinks Include trial links created by Smart Links. Default `false`
     * @param string $filterSearch search trial link name or URL
     * @param string $filterTags Filter by one or more tag names or slugs. Accepts CSV or repeated array values (`filter[tags][]=...`) and matches any tag.
     * @param int $limit The number of trial links to return. Default `10`
     * @param int $offset The offset used for pagination. Default `0`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listTrialLinks(
        string $account,
        ?bool $filterIncludeSmartLinks = null,
        ?string $filterSearch = null,
        ?string $filterTags = null,
        ?int $limit = null,
        ?int $offset = null,
        RequestOptions|array|null $requestOptions = null,
    ): StoredListTrialLinksResponse {
        $params = Util::removeNulls(
            [
                'filterIncludeSmartLinks' => $filterIncludeSmartLinks,
                'filterSearch' => $filterSearch,
                'filterTags' => $filterTags,
                'limit' => $limit,
                'offset' => $offset,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listTrialLinks($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
