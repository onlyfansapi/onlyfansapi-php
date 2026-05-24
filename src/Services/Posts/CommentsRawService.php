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
use Onlyfansapi\Posts\Comments\CommentLikeParams;
use Onlyfansapi\Posts\Comments\CommentLikeResponse;
use Onlyfansapi\Posts\Comments\CommentListParams;
use Onlyfansapi\Posts\Comments\CommentListParams\Sort;
use Onlyfansapi\Posts\Comments\CommentListResponse;
use Onlyfansapi\Posts\Comments\CommentNewResponse;
use Onlyfansapi\Posts\Comments\CommentPinParams;
use Onlyfansapi\Posts\Comments\CommentPinResponse;
use Onlyfansapi\Posts\Comments\CommentUnlikeParams;
use Onlyfansapi\Posts\Comments\CommentUnlikeResponse;
use Onlyfansapi\Posts\Comments\CommentUnpinParams;
use Onlyfansapi\Posts\Comments\CommentUnpinResponse;
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
     * @param array{account: string, postID: int}|CommentLikeParams $params
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
    ): BaseResponse {
        [$parsed, $options] = CommentLikeParams::parseRequest(
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
            convert: CommentLikeResponse::class,
        );
    }

    /**
     * @api
     *
     * Pin a comment on one of your posts.
     *
     * @param int $commentID the ID of the comment to pin
     * @param array{account: string, postID: int}|CommentPinParams $params
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
    ): BaseResponse {
        [$parsed, $options] = CommentPinParams::parseRequest(
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
            convert: CommentPinResponse::class,
        );
    }

    /**
     * @api
     *
     * Unlike a comment on one of your posts.
     *
     * @param int $commentID the ID of the comment to like
     * @param array{account: string, postID: int}|CommentUnlikeParams $params
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
    ): BaseResponse {
        [$parsed, $options] = CommentUnlikeParams::parseRequest(
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
            convert: CommentUnlikeResponse::class,
        );
    }

    /**
     * @api
     *
     * Unpin a comment from one of your posts.
     *
     * @param int $commentID the ID of the comment to pin
     * @param array{account: string, postID: int}|CommentUnpinParams $params
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
    ): BaseResponse {
        [$parsed, $options] = CommentUnpinParams::parseRequest(
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
            convert: CommentUnpinResponse::class,
        );
    }
}
