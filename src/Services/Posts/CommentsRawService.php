<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Posts;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\Posts\Comments\CommentCreateParams;
use Onlyfansapi\Posts\Comments\CommentDeleteParams;
use Onlyfansapi\Posts\Comments\CommentDeleteResponse;
use Onlyfansapi\Posts\Comments\CommentLikeCommentParams;
use Onlyfansapi\Posts\Comments\CommentLikeCommentResponse;
use Onlyfansapi\Posts\Comments\CommentListParams;
use Onlyfansapi\Posts\Comments\CommentListParams\Sort;
use Onlyfansapi\Posts\Comments\CommentListResponse;
use Onlyfansapi\Posts\Comments\CommentNewResponse;
use Onlyfansapi\Posts\Comments\CommentPinCommentParams;
use Onlyfansapi\Posts\Comments\CommentPinCommentResponse;
use Onlyfansapi\Posts\Comments\CommentUnlikeCommentParams;
use Onlyfansapi\Posts\Comments\CommentUnlikeCommentResponse;
use Onlyfansapi\Posts\Comments\CommentUnpinCommentParams;
use Onlyfansapi\Posts\Comments\CommentUnpinCommentResponse;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\Posts\CommentsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class CommentsRawService implements CommentsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a comment on one of your posts.
     *
     * @param string $postID path param: The ID of the post
     * @param array{
     *   account: string, text: string, answerTo?: int, giphyID?: string
     * }|CommentCreateParams $params
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
    ): BaseResponse {
        [$parsed, $options] = CommentCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/posts/%2$s/comments', $account, $postID],
            query: Util::array_transform_keys($parsed, ['giphyID' => 'giphyId']),
            options: $options,
            convert: CommentNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get comments from one of your posts.
     *
     * @param string $postID path param: The ID of the post
     * @param array{
     *   account: string, limit?: int, offset?: int, sort?: Sort|value-of<Sort>
     * }|CommentListParams $params
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
    ): BaseResponse {
        [$parsed, $options] = CommentListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/posts/%2$s/comments', $account, $postID],
            query: $parsed,
            options: $options,
            convert: CommentListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a comment on one of your posts.
     *
     * @param int $commentID the ID of the comment to delete
     * @param array{account: string, postID: int}|CommentDeleteParams $params
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
    ): BaseResponse {
        [$parsed, $options] = CommentDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);
        $postID = $parsed['postID'];
        unset($parsed['postID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'api/%1$s/posts/%2$s/comments/%3$s', $account, $postID, $commentID,
            ],
            options: $options,
            convert: CommentDeleteResponse::class,
        );
    }

    /**
     * @api
     *
     * Like a comment on one of your posts.
     *
     * @param int $commentID the ID of the comment to like
     * @param array{account: string, postID: int}|CommentLikeCommentParams $params
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
    ): BaseResponse {
        [$parsed, $options] = CommentLikeCommentParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);
        $postID = $parsed['postID'];
        unset($parsed['postID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'api/%1$s/posts/%2$s/comments/%3$s/like', $account, $postID, $commentID,
            ],
            options: $options,
            convert: CommentLikeCommentResponse::class,
        );
    }

    /**
     * @api
     *
     * Pin a comment on one of your posts.
     *
     * @param int $commentID the ID of the comment to pin
     * @param array{account: string, postID: int}|CommentPinCommentParams $params
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
    ): BaseResponse {
        [$parsed, $options] = CommentPinCommentParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);
        $postID = $parsed['postID'];
        unset($parsed['postID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'api/%1$s/posts/%2$s/comments/%3$s/pin', $account, $postID, $commentID,
            ],
            options: $options,
            convert: CommentPinCommentResponse::class,
        );
    }

    /**
     * @api
     *
     * Unlike a comment on one of your posts.
     *
     * @param int $commentID the ID of the comment to like
     * @param array{account: string, postID: int}|CommentUnlikeCommentParams $params
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
    ): BaseResponse {
        [$parsed, $options] = CommentUnlikeCommentParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);
        $postID = $parsed['postID'];
        unset($parsed['postID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'api/%1$s/posts/%2$s/comments/%3$s/like', $account, $postID, $commentID,
            ],
            options: $options,
            convert: CommentUnlikeCommentResponse::class,
        );
    }

    /**
     * @api
     *
     * Unpin a comment from one of your posts.
     *
     * @param int $commentID the ID of the comment to pin
     * @param array{account: string, postID: int}|CommentUnpinCommentParams $params
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
    ): BaseResponse {
        [$parsed, $options] = CommentUnpinCommentParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);
        $postID = $parsed['postID'];
        unset($parsed['postID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'api/%1$s/posts/%2$s/comments/%3$s/pin', $account, $postID, $commentID,
            ],
            options: $options,
            convert: CommentUnpinCommentResponse::class,
        );
    }
}
