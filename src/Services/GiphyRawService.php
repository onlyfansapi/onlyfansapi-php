<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Giphy\GiphyListTrendingParams;
use OnlyFansAPI\Giphy\GiphyListTrendingResponse;
use OnlyFansAPI\Giphy\GiphySearchParams;
use OnlyFansAPI\Giphy\GiphySearchResponse;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\GiphyRawContract;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class GiphyRawService implements GiphyRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get trending GIFs from the OnlyFans Giphy proxy. Use the returned `id` as the `giphyId` body param when sending a chat or mass message.
     *
     * @param string $account The Account ID
     * @param array{limit?: int, offset?: int}|GiphyListTrendingParams $params
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
    ): BaseResponse {
        [$parsed, $options] = GiphyListTrendingParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/giphy/trending', $account],
            query: $parsed,
            options: $options,
            convert: GiphyListTrendingResponse::class,
        );
    }

    /**
     * @api
     *
     * Search GIFs from the OnlyFans Giphy proxy. Use the returned `id` as the `giphyId` body param when sending a chat or mass message.
     *
     * @param string $account The Account ID
     * @param array{q: string, limit?: int, offset?: int}|GiphySearchParams $params
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
    ): BaseResponse {
        [$parsed, $options] = GiphySearchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/giphy/search', $account],
            query: $parsed,
            options: $options,
            convert: GiphySearchResponse::class,
        );
    }
}
