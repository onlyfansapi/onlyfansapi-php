<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\Giphy\GiphyListTrendingResponse;
use Onlyfansapi\Giphy\GiphySearchResponse;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\GiphyContract;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class GiphyService implements GiphyContract
{
    /**
     * @api
     */
    public GiphyRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new GiphyRawService($client);
    }

    /**
     * @api
     *
     * Get trending GIFs from the OnlyFans Giphy proxy. Use the returned `id` as the `giphyId` body param when sending a chat or mass message.
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
    ): GiphyListTrendingResponse {
        $params = Util::removeNulls(['limit' => $limit, 'offset' => $offset]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listTrending($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Search GIFs from the OnlyFans Giphy proxy. Use the returned `id` as the `giphyId` body param when sending a chat or mass message.
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
    ): GiphySearchResponse {
        $params = Util::removeNulls(
            ['q' => $q, 'limit' => $limit, 'offset' => $offset]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->search($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
