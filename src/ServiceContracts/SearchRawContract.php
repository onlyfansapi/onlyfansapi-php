<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\Search\SearchProfilesParams;
use Onlyfansapi\Search\SearchProfilesResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
