<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\SavedForLater;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\SavedForLater\Posts\PostListParams;
use Onlyfansapi\SavedForLater\Posts\PostListResponse;
use Onlyfansapi\ServiceContracts\SavedForLater\PostsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class PostsRawService implements PostsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List all posts that are marked as "Save For Later".
     *
     * @param string $account The Account ID
     * @param array{limit: int, offset: int}|PostListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PostListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        array|PostListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PostListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/saved-for-later/posts', $account],
            query: $parsed,
            options: $options,
            convert: PostListResponse::class,
        );
    }
}
