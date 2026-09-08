<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\Search\SearchProfilesParams;
use OnlyFansAPI\Search\SearchProfilesResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface SearchRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SearchProfilesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SearchProfilesResponse>
     *
     * @throws APIException
     */
    public function profiles(
        array|SearchProfilesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
