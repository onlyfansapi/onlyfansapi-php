<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\Search\SearchProfilesParams;
use Onlyfansapi\Search\SearchProfilesParams\Filter;
use Onlyfansapi\Search\SearchProfilesParams\Sort;
use Onlyfansapi\Search\SearchProfilesParams\SortDirection;
use Onlyfansapi\Search\SearchProfilesResponse;
use Onlyfansapi\ServiceContracts\SearchRawContract;

/**
 * @phpstan-import-type FilterShape from \Onlyfansapi\Search\SearchProfilesParams\Filter
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
