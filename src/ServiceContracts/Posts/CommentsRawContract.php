<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Posts;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Posts\Comments\CommentCreateParams;
use Onlyfansapi\Posts\Comments\CommentDeleteParams;
use Onlyfansapi\Posts\Comments\CommentDeleteResponse;
use Onlyfansapi\Posts\Comments\CommentLikeCommentParams;
use Onlyfansapi\Posts\Comments\CommentLikeCommentResponse;
use Onlyfansapi\Posts\Comments\CommentListParams;
use Onlyfansapi\Posts\Comments\CommentListResponse;
use Onlyfansapi\Posts\Comments\CommentNewResponse;
use Onlyfansapi\Posts\Comments\CommentPinCommentParams;
use Onlyfansapi\Posts\Comments\CommentPinCommentResponse;
use Onlyfansapi\Posts\Comments\CommentUnlikeCommentParams;
use Onlyfansapi\Posts\Comments\CommentUnlikeCommentResponse;
use Onlyfansapi\Posts\Comments\CommentUnpinCommentParams;
use Onlyfansapi\Posts\Comments\CommentUnpinCommentResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
     * @param array<string,mixed>|CommentLikeCommentParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommentLikeCommentResponse>
     *
     * @throws APIException
     */
    public function likeComment(
        int $commentID,
        array|CommentLikeCommentParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $commentID the ID of the comment to pin
     * @param array<string,mixed>|CommentPinCommentParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommentPinCommentResponse>
     *
     * @throws APIException
     */
    public function pinComment(
        int $commentID,
        array|CommentPinCommentParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $commentID the ID of the comment to like
     * @param array<string,mixed>|CommentUnlikeCommentParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommentUnlikeCommentResponse>
     *
     * @throws APIException
     */
    public function unlikeComment(
        int $commentID,
        array|CommentUnlikeCommentParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $commentID the ID of the comment to pin
     * @param array<string,mixed>|CommentUnpinCommentParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommentUnpinCommentResponse>
     *
     * @throws APIException
     */
    public function unpinComment(
        int $commentID,
        array|CommentUnpinCommentParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
