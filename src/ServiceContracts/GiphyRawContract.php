<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Giphy\GiphyListTrendingParams;
use OnlyFansAPI\Giphy\GiphyListTrendingResponse;
use OnlyFansAPI\Giphy\GiphySearchParams;
use OnlyFansAPI\Giphy\GiphySearchResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface GiphyRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|GiphyListTrendingParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<GiphyListTrendingResponse>
     *
     * @throws APIException
     */
    public function listTrending(
        string $account,
        array|GiphyListTrendingParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|GiphySearchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<GiphySearchResponse>
     *
     * @throws APIException
     */
    public function search(
        string $account,
        array|GiphySearchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
