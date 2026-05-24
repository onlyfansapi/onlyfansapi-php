<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Posts;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Posts\Comments\CommentCreateParams;
use Onlyfansapi\Posts\Comments\CommentDeleteParams;
use Onlyfansapi\Posts\Comments\CommentDeleteResponse;
use Onlyfansapi\Posts\Comments\CommentLikeParams;
use Onlyfansapi\Posts\Comments\CommentLikeResponse;
use Onlyfansapi\Posts\Comments\CommentListParams;
use Onlyfansapi\Posts\Comments\CommentListResponse;
use Onlyfansapi\Posts\Comments\CommentNewResponse;
use Onlyfansapi\Posts\Comments\CommentPinParams;
use Onlyfansapi\Posts\Comments\CommentPinResponse;
use Onlyfansapi\Posts\Comments\CommentUnlikeParams;
use Onlyfansapi\Posts\Comments\CommentUnlikeResponse;
use Onlyfansapi\Posts\Comments\CommentUnpinParams;
use Onlyfansapi\Posts\Comments\CommentUnpinResponse;
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
