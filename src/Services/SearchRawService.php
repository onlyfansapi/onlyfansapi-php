<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\Search\SearchProfilesParams;
use OnlyFansAPI\Search\SearchProfilesParams\Filter;
use OnlyFansAPI\Search\SearchProfilesParams\Sort;
use OnlyFansAPI\Search\SearchProfilesParams\SortDirection;
use OnlyFansAPI\Search\SearchProfilesResponse;
use OnlyFansAPI\ServiceContracts\SearchRawContract;

/**
 * @phpstan-import-type FilterShape from \OnlyFansAPI\Search\SearchProfilesParams\Filter
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class SearchRawService implements SearchRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Full-text search for profiles with filters for pricing, free trials, location, media count and more.
     *
     * @param array{
     *   cursor?: string|null,
     *   filter?: Filter|FilterShape,
     *   instagram?: string,
     *   limit?: int,
     *   location?: string,
     *   maxSubscribePrice?: float,
     *   minSubscribePrice?: float,
     *   query?: string,
     *   sort?: value-of<Sort>,
     *   sortDirection?: SortDirection|value-of<SortDirection>,
     *   tiktok?: string,
     *   website?: string,
     * }|SearchProfilesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SearchProfilesResponse>
     *
     * @throws APIException
     */
    public function profiles(
        array|SearchProfilesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SearchProfilesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'api/search',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'maxSubscribePrice' => 'max_subscribe_price',
                    'minSubscribePrice' => 'min_subscribe_price',
                ],
            ),
            options: $options,
            convert: SearchProfilesResponse::class,
        );
    }
}
