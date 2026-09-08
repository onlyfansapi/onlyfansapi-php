<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Posts;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Posts\Comments\CommentCreateParams;
use OnlyFansAPI\Posts\Comments\CommentDeleteParams;
use OnlyFansAPI\Posts\Comments\CommentDeleteResponse;
use OnlyFansAPI\Posts\Comments\CommentLikeParams;
use OnlyFansAPI\Posts\Comments\CommentLikeResponse;
use OnlyFansAPI\Posts\Comments\CommentListParams;
use OnlyFansAPI\Posts\Comments\CommentListResponse;
use OnlyFansAPI\Posts\Comments\CommentNewResponse;
use OnlyFansAPI\Posts\Comments\CommentPinParams;
use OnlyFansAPI\Posts\Comments\CommentPinResponse;
use OnlyFansAPI\Posts\Comments\CommentUnlikeParams;
use OnlyFansAPI\Posts\Comments\CommentUnlikeResponse;
use OnlyFansAPI\Posts\Comments\CommentUnpinParams;
use OnlyFansAPI\Posts\Comments\CommentUnpinResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface CommentsRawContract
{
    /**
     * @api
     *
     * @param string $postID path param: The ID of the post
     * @param array<string,mixed>|CommentCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommentNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $postID,
        array|CommentCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $postID path param: The ID of the post
     * @param array<string,mixed>|CommentListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommentListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $postID,
        array|CommentListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $commentID the ID of the comment to delete
     * @param array<string,mixed>|CommentDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommentDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        int $commentID,
        array|CommentDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $commentID the ID of the comment to like
     * @param array<string,mixed>|CommentLikeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommentLikeResponse>
     *
     * @throws APIException
     */
    public function like(
        int $commentID,
        array|CommentLikeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $commentID the ID of the comment to pin
     * @param array<string,mixed>|CommentPinParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommentPinResponse>
     *
     * @throws APIException
     */
    public function pin(
        int $commentID,
        array|CommentPinParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $commentID the ID of the comment to like
     * @param array<string,mixed>|CommentUnlikeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommentUnlikeResponse>
     *
     * @throws APIException
     */
    public function unlike(
        int $commentID,
        array|CommentUnlikeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $commentID the ID of the comment to pin
     * @param array<string,mixed>|CommentUnpinParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommentUnpinResponse>
     *
     * @throws APIException
     */
    public function unpin(
        int $commentID,
        array|CommentUnpinParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
