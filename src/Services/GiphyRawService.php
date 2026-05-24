<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Giphy\GiphyListTrendingParams;
use Onlyfansapi\Giphy\GiphyListTrendingResponse;
use Onlyfansapi\Giphy\GiphySearchParams;
use Onlyfansapi\Giphy\GiphySearchResponse;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\GiphyRawContract;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
