<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Posts;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Posts\Comments\CommentDeleteResponse;
use Onlyfansapi\Posts\Comments\CommentLikeCommentResponse;
use Onlyfansapi\Posts\Comments\CommentListParams\Sort;
use Onlyfansapi\Posts\Comments\CommentListResponse;
use Onlyfansapi\Posts\Comments\CommentNewResponse;
use Onlyfansapi\Posts\Comments\CommentPinCommentResponse;
use Onlyfansapi\Posts\Comments\CommentUnlikeCommentResponse;
use Onlyfansapi\Posts\Comments\CommentUnpinCommentResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
    public function likeComment(
        int $commentID,
        string $account,
        int $postID,
        RequestOptions|array|null $requestOptions = null,
    ): CommentLikeCommentResponse;

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
    public function pinComment(
        int $commentID,
        string $account,
        int $postID,
        RequestOptions|array|null $requestOptions = null,
    ): CommentPinCommentResponse;

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
    public function unlikeComment(
        int $commentID,
        string $account,
        int $postID,
        RequestOptions|array|null $requestOptions = null,
    ): CommentUnlikeCommentResponse;

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
    public function unpinComment(
        int $commentID,
        string $account,
        int $postID,
        RequestOptions|array|null $requestOptions = null,
    ): CommentUnpinCommentResponse;
}
