<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\Search\SearchProfilesResponse;
use Onlyfansapi\ServiceContracts\SearchContract;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
     * @param string $query Query for full text search in username, display name, bio
     * @param string $limit The number of profiles to return. For each returned profile we charge your account 1 credit. Default: `10`
     * @param string $location Location
     * @param string $maxSubscribePrice Maximum subscribe price
     * @param string $minSubscribePrice Minimum subscribe price
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function profiles(
        string $query,
        ?string $limit = null,
        ?string $location = null,
        ?string $maxSubscribePrice = null,
        ?string $minSubscribePrice = null,
        RequestOptions|array|null $requestOptions = null,
    ): SearchProfilesResponse {
        $params = Util::removeNulls(
            [
                'query' => $query,
                'limit' => $limit,
                'location' => $location,
                'maxSubscribePrice' => $maxSubscribePrice,
                'minSubscribePrice' => $minSubscribePrice,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->profiles(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
