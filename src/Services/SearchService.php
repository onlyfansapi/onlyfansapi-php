<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\Search\SearchProfilesParams\Filter;
use OnlyFansAPI\Search\SearchProfilesParams\Sort;
use OnlyFansAPI\Search\SearchProfilesParams\SortDirection;
use OnlyFansAPI\Search\SearchProfilesResponse;
use OnlyFansAPI\ServiceContracts\SearchContract;

/**
 * @phpstan-import-type FilterShape from \OnlyFansAPI\Search\SearchProfilesParams\Filter
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class SearchService implements SearchContract
{
    /**
     * @api
     */
    public SearchRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SearchRawService($client);
    }

    /**
     * @api
     *
     * Full-text search for profiles with filters for pricing, free trials, location, media count and more.
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
    ): SearchProfilesResponse {
        $params = Util::removeNulls(
            [
                'cursor' => $cursor,
                'filter' => $filter,
                'instagram' => $instagram,
                'limit' => $limit,
                'location' => $location,
                'maxSubscribePrice' => $maxSubscribePrice,
                'minSubscribePrice' => $minSubscribePrice,
                'query' => $query,
                'sort' => $sort,
                'sortDirection' => $sortDirection,
                'tiktok' => $tiktok,
                'website' => $website,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->profiles(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
