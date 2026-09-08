<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Giphy\GiphyListTrendingResponse;
use OnlyFansAPI\Giphy\GiphySearchResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface GiphyContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param int $limit Number of GIFs to return (default = 10, max = 50)
     * @param int $offset Number of GIFs to skip for pagination (default = 0)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listTrending(
        string $account,
        ?int $limit = null,
        ?int $offset = null,
        RequestOptions|array|null $requestOptions = null,
    ): GiphyListTrendingResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param string $q the search query
     * @param int $limit Number of GIFs to return (default = 10, max = 50)
     * @param int $offset Number of GIFs to skip for pagination (default = 0)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function search(
        string $account,
        string $q,
        ?int $limit = null,
        ?int $offset = null,
        RequestOptions|array|null $requestOptions = null,
    ): GiphySearchResponse;
}
