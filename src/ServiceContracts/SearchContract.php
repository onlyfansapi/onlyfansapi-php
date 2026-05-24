<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\Search\SearchProfilesResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface SearchContract
{
    /**
     * @api
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
    ): SearchProfilesResponse;
}
