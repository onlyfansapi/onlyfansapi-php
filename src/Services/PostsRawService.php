<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\Posts\PostArchiveParams;
use Onlyfansapi\Posts\PostArchiveResponse;
use Onlyfansapi\Posts\PostCreateParams;
use Onlyfansapi\Posts\PostCreateParams\VotingType;
use Onlyfansapi\Posts\PostDeleteParams;
use Onlyfansapi\Posts\PostDeleteResponse;
use Onlyfansapi\Posts\PostGetResponse;
use Onlyfansapi\Posts\PostListParams;
use Onlyfansapi\Posts\PostListParams\Order;
use Onlyfansapi\Posts\PostListParams\Sort;
use Onlyfansapi\Posts\PostListResponse;
use Onlyfansapi\Posts\PostNewResponse;
use Onlyfansapi\Posts\PostPinParams;
use Onlyfansapi\Posts\PostPinResponse;
use Onlyfansapi\Posts\PostRetrieveParams;
use Onlyfansapi\Posts\PostStatsParams;
use Onlyfansapi\Posts\PostStatsResponse;
use Onlyfansapi\Posts\PostUnarchiveParams;
use Onlyfansapi\Posts\PostUnarchiveResponse;
use Onlyfansapi\Posts\PostUpdateParams;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\PostsRawContract;

/**
 * APIs for managing OnlyFans posts.
 *
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
     * Compose and send a new post to your OnlyFans account.
     *
     * @param string $account The Account ID
     * @param array{
     *   text: string,
     *   expireDays?: int,
     *   fundRaisingTargetAmount?: int,
     *   fundRaisingTipsPresets?: list<string>,
     *   labelIDs?: string,
     *   mediaFiles?: string,
     *   previews?: list<string>,
     *   rfTag?: string,
     *   saveForLater?: bool,
     *   scheduledDate?: string,
     *   votingCorrectIndex?: int,
     *   votingDue?: int,
     *   votingOptions?: list<string>,
     *   votingType?: VotingType|value-of<VotingType>,
     * }|PostCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PostNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $account,
        array|PostCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PostCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/posts', $account],
            body: (object) $parsed,
            options: $options,
            convert: PostNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve details of a post from your account.
     *
     * @param int $postID The ID of the post
     * @param array{account: string}|PostRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PostGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        int $postID,
        array|PostRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PostRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/posts/%2$s', $account, $postID],
            options: $options,
            convert: PostGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update a posted, queued, or "saved for later" post.
     *
     * @param int $postID Path param: The ID of the post
     * @param array{
     *   account: string,
     *   text: string,
     *   expireDays?: int,
     *   fundRaisingTargetAmount?: int,
     *   fundRaisingTipsPresets?: list<string>,
     *   labelIDs?: string,
     *   mediaFiles?: string,
     *   price?: int,
     *   rfTag?: string,
     *   saveForLater?: bool,
     *   scheduledDate?: string,
     *   votingCorrectIndex?: int,
     *   votingDue?: int,
     *   votingOptions?: list<string>,
     *   votingType?: PostUpdateParams\VotingType|value-of<PostUpdateParams\VotingType>,
     * }|PostUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function update(
        int $postID,
        array|PostUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PostUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['api/%1$s/posts/%2$s', $account, $postID],
            headers: ['Accept' => 'text/plain'],
            body: (object) array_diff_key($parsed, array_flip(['account'])),
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Get posts from your OnlyFans account.
     *
     * @param string $account The Account ID
     * @param array{
     *   counters?: bool,
     *   limit?: int,
     *   minimumPublishDate?: string,
     *   offset?: int,
     *   order?: Order|value-of<Order>,
     *   pinned?: bool,
     *   query?: string,
     *   sort?: Sort|value-of<Sort>,
     * }|PostListParams $params
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
            path: ['api/%1$s/posts', $account],
            query: $parsed,
            options: $options,
            convert: PostListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a post from your account.
     *
     * @param int $postID The ID of the post
     * @param array{account: string}|PostDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PostDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        int $postID,
        array|PostDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PostDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['api/%1$s/posts/%2$s', $account, $postID],
            options: $options,
            convert: PostDeleteResponse::class,
        );
    }

    /**
     * @api
     *
     * Archive a post from your account. Also can be used to move posts between the Regular and Private Archive.
     *
     * @param int $postID Path param: The ID of the post
     * @param array{account: string, privateArchive?: bool}|PostArchiveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PostArchiveResponse>
     *
     * @throws APIException
     */
    public function archive(
        int $postID,
        array|PostArchiveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PostArchiveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/posts/%2$s/archive', $account, $postID],
            query: Util::array_transform_keys(
                $parsed,
                ['privateArchive' => 'private_archive']
            ),
            options: $options,
            convert: PostArchiveResponse::class,
        );
    }

    /**
     * @api
     *
     * Pin or unpin a post to your account.
     *
     * @param int $postID The ID of the post
     * @param array{account: string}|PostPinParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PostPinResponse>
     *
     * @throws APIException
     */
    public function pin(
        int $postID,
        array|PostPinParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PostPinParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/posts/%2$s/pin', $account, $postID],
            options: $options,
            convert: PostPinResponse::class,
        );
    }

    /**
     * @api
     *
     * Show the statistics of a post like purchases, views, likes, tips and more.
     *
     * @param int $postID Path param: The ID of the post
     * @param array{account: string, withHistoricalData?: bool}|PostStatsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PostStatsResponse>
     *
     * @throws APIException
     */
    public function stats(
        int $postID,
        array|PostStatsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PostStatsParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/posts/%2$s/stats', $account, $postID],
            query: Util::array_transform_keys(
                $parsed,
                ['withHistoricalData' => 'with_historical_data']
            ),
            options: $options,
            convert: PostStatsResponse::class,
        );
    }

    /**
     * @api
     *
     * Unarchive a post from your account.
     *
     * @param int $postID Path param: The ID of the post
     * @param array{account: string, privateArchive?: bool}|PostUnarchiveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PostUnarchiveResponse>
     *
     * @throws APIException
     */
    public function unarchive(
        int $postID,
        array|PostUnarchiveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PostUnarchiveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/posts/%2$s/unarchive', $account, $postID],
            query: Util::array_transform_keys(
                $parsed,
                ['privateArchive' => 'private_archive']
            ),
            options: $options,
            convert: PostUnarchiveResponse::class,
        );
    }
}
