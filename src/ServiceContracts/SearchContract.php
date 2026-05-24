<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\Search\SearchProfilesParams\Filter;
use Onlyfansapi\Search\SearchProfilesParams\Sort;
use Onlyfansapi\Search\SearchProfilesParams\SortDirection;
use Onlyfansapi\Search\SearchProfilesResponse;

/**
 * @phpstan-import-type FilterShape from \Onlyfansapi\Search\SearchProfilesParams\Filter
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface SearchContract
{
    /**
     * @api
     *
     * @param string|null $cursor Cursor for pagination. Use the `next_cursor` from the previous response to get the next page of results.
     * @param Filter|FilterShape $filter
     * @param string $instagram filter by Instagram username
     * @param int $limit The number of profiles to return. For each returned profile we charge your account 1 credit. Default: `10`. Must be at least 1. Must not be greater than 100.
     * @param string $location filter by location
     * @param float $maxSubscribePrice Filter by maximum subscribe price. Must be at least 0.00.
     * @param float $minSubscribePrice Filter by minimum subscribe price. Must be at least 0.00.
     * @param string $query Query for full text search in username, display name, bio. Must be at least 3 characters.
     * @param Sort|value-of<Sort> $sort Field to sort by. ⭐️ Only available on the Pro and Enterprise plan.
     * @param SortDirection|value-of<SortDirection> $sortDirection Direction for sorting. `desc` - highest value first. `asc` - lowest value first.
     * @param string $tiktok filter by TikTok username
     * @param string $website filter by website
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function profiles(
        ?string $cursor = null,
        Filter|array|null $filter = null,
        ?string $instagram = null,
        ?int $limit = null,
        ?string $location = null,
        ?float $maxSubscribePrice = null,
        ?float $minSubscribePrice = null,
        ?string $query = null,
        Sort|string|null $sort = null,
        SortDirection|string|null $sortDirection = null,
        ?string $tiktok = null,
        ?string $website = null,
        RequestOptions|array|null $requestOptions = null,
    ): SearchProfilesResponse;
}
