<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Posts;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Posts\Comments\CommentDeleteResponse;
use OnlyFansAPI\Posts\Comments\CommentLikeResponse;
use OnlyFansAPI\Posts\Comments\CommentListParams\Sort;
use OnlyFansAPI\Posts\Comments\CommentListResponse;
use OnlyFansAPI\Posts\Comments\CommentNewResponse;
use OnlyFansAPI\Posts\Comments\CommentPinResponse;
use OnlyFansAPI\Posts\Comments\CommentUnlikeResponse;
use OnlyFansAPI\Posts\Comments\CommentUnpinResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface CommentsContract
{
    /**
     * @api
     *
     * @param string $postID path param: The ID of the post
     * @param string $account Path param: The Account ID
     * @param string $text query param: The text of the comment
     * @param int $answerTo query param: The ID of the comment to which this comment is a reply
     * @param string $giphyID query param: The ID of the Giphy to include in the comment
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $postID,
        string $account,
        string $text,
        ?int $answerTo = null,
        ?string $giphyID = null,
        RequestOptions|array|null $requestOptions = null,
    ): CommentNewResponse;

    /**
     * @api
     *
     * @param string $postID path param: The ID of the post
     * @param string $account Path param: The Account ID
     * @param int $limit Query param: Number of comments to return (default = 10)
     * @param int $offset Query param: Number of comments to skip for pagination
     * @param Sort|value-of<Sort> $sort Query param: Sort the returned comments (default = desc)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $postID,
        string $account,
        ?int $limit = null,
        ?int $offset = null,
        Sort|string|null $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): CommentListResponse;

    /**
     * @api
     *
     * @param int $commentID the ID of the comment to delete
     * @param string $account The Account ID
     * @param int $postID the ID of the post to which the comment belongs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $commentID,
        string $account,
        int $postID,
        RequestOptions|array|null $requestOptions = null,
    ): CommentDeleteResponse;

    /**
     * @api
     *
     * @param int $commentID the ID of the comment to like
     * @param string $account The Account ID
     * @param int $postID the ID of the post to which the comment belongs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function like(
        int $commentID,
        string $account,
        int $postID,
        RequestOptions|array|null $requestOptions = null,
    ): CommentLikeResponse;

    /**
     * @api
     *
     * @param int $commentID the ID of the comment to pin
     * @param string $account The Account ID
     * @param int $postID the ID of the post to which the comment belongs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function pin(
        int $commentID,
        string $account,
        int $postID,
        RequestOptions|array|null $requestOptions = null,
    ): CommentPinResponse;

    /**
     * @api
     *
     * @param int $commentID the ID of the comment to like
     * @param string $account The Account ID
     * @param int $postID the ID of the post to which the comment belongs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function unlike(
        int $commentID,
        string $account,
        int $postID,
        RequestOptions|array|null $requestOptions = null,
    ): CommentUnlikeResponse;

    /**
     * @api
     *
     * @param int $commentID the ID of the comment to pin
     * @param string $account The Account ID
     * @param int $postID the ID of the post to which the comment belongs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function unpin(
        int $commentID,
        string $account,
        int $postID,
        RequestOptions|array|null $requestOptions = null,
    ): CommentUnpinResponse;
}
