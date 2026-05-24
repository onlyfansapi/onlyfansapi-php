<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\Stored\StoredListSharedTrackingLinksResponse;
use Onlyfansapi\Stored\StoredListSharedTrialLinksResponse;
use Onlyfansapi\Stored\StoredListTrackingLinksResponse;
use Onlyfansapi\Stored\StoredListTrialLinksResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface StoredContract
{
    /**
     * @api
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
    ): StoredListSharedTrackingLinksResponse;

    /**
     * @api
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
    ): StoredListSharedTrialLinksResponse;

    /**
     * @api
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
    ): StoredListTrackingLinksResponse;

    /**
     * @api
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
    ): StoredListTrialLinksResponse;
}
