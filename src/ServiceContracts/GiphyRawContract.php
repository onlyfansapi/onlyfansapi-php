<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Giphy\GiphyListTrendingParams;
use Onlyfansapi\Giphy\GiphyListTrendingResponse;
use Onlyfansapi\Giphy\GiphySearchParams;
use Onlyfansapi\Giphy\GiphySearchResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
