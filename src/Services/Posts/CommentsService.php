<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Posts;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\Posts\Comments\CommentDeleteResponse;
use Onlyfansapi\Posts\Comments\CommentLikeResponse;
use Onlyfansapi\Posts\Comments\CommentListParams\Sort;
use Onlyfansapi\Posts\Comments\CommentListResponse;
use Onlyfansapi\Posts\Comments\CommentNewResponse;
use Onlyfansapi\Posts\Comments\CommentPinResponse;
use Onlyfansapi\Posts\Comments\CommentUnlikeResponse;
use Onlyfansapi\Posts\Comments\CommentUnpinResponse;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\Posts\CommentsContract;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class CommentsService implements CommentsContract
{
    /**
     * @api
     */
    public CommentsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CommentsRawService($client);
    }

    /**
     * @api
     *
     * Create a comment on one of your posts.
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
    ): CommentNewResponse {
        $params = Util::removeNulls(
            [
                'account' => $account,
                'text' => $text,
                'answerTo' => $answerTo,
                'giphyID' => $giphyID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($postID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get comments from one of your posts.
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
    ): CommentListResponse {
        $params = Util::removeNulls(
            [
                'account' => $account,
                'limit' => $limit,
                'offset' => $offset,
                'sort' => $sort,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($postID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a comment on one of your posts.
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
    ): CommentDeleteResponse {
        $params = Util::removeNulls(['account' => $account, 'postID' => $postID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($commentID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Like a comment on one of your posts.
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
    ): CommentLikeResponse {
        $params = Util::removeNulls(['account' => $account, 'postID' => $postID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->like($commentID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Pin a comment on one of your posts.
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
    ): CommentPinResponse {
        $params = Util::removeNulls(['account' => $account, 'postID' => $postID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->pin($commentID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Unlike a comment on one of your posts.
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
    ): CommentUnlikeResponse {
        $params = Util::removeNulls(['account' => $account, 'postID' => $postID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->unlike($commentID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Unpin a comment from one of your posts.
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
    ): CommentUnpinResponse {
        $params = Util::removeNulls(['account' => $account, 'postID' => $postID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->unpin($commentID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
