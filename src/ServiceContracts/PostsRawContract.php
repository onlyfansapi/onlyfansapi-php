<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Posts\PostArchiveParams;
use OnlyFansAPI\Posts\PostArchiveResponse;
use OnlyFansAPI\Posts\PostCreateParams;
use OnlyFansAPI\Posts\PostDeleteParams;
use OnlyFansAPI\Posts\PostDeleteResponse;
use OnlyFansAPI\Posts\PostGetResponse;
use OnlyFansAPI\Posts\PostListParams;
use OnlyFansAPI\Posts\PostListResponse;
use OnlyFansAPI\Posts\PostNewResponse;
use OnlyFansAPI\Posts\PostPinParams;
use OnlyFansAPI\Posts\PostPinResponse;
use OnlyFansAPI\Posts\PostRetrieveParams;
use OnlyFansAPI\Posts\PostStatsParams;
use OnlyFansAPI\Posts\PostStatsResponse;
use OnlyFansAPI\Posts\PostUnarchiveParams;
use OnlyFansAPI\Posts\PostUnarchiveResponse;
use OnlyFansAPI\Posts\PostUpdateParams;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface PostsRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|PostCreateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $postID The ID of the post
     * @param array<string,mixed>|PostRetrieveParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $postID Path param: The ID of the post
     * @param array<string,mixed>|PostUpdateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|PostListParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $postID The ID of the post
     * @param array<string,mixed>|PostDeleteParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $postID Path param: The ID of the post
     * @param array<string,mixed>|PostArchiveParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $postID The ID of the post
     * @param array<string,mixed>|PostPinParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $postID Path param: The ID of the post
     * @param array<string,mixed>|PostStatsParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $postID Path param: The ID of the post
     * @param array<string,mixed>|PostUnarchiveParams $params
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
    ): BaseResponse;
}
