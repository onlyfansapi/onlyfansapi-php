<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\Posts\PostArchiveResponse;
use Onlyfansapi\Posts\PostCreateParams\VotingType;
use Onlyfansapi\Posts\PostDeleteResponse;
use Onlyfansapi\Posts\PostGetResponse;
use Onlyfansapi\Posts\PostListParams\Order;
use Onlyfansapi\Posts\PostListParams\Sort;
use Onlyfansapi\Posts\PostListResponse;
use Onlyfansapi\Posts\PostNewResponse;
use Onlyfansapi\Posts\PostPinResponse;
use Onlyfansapi\Posts\PostStatsResponse;
use Onlyfansapi\Posts\PostUnarchiveResponse;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\PostsContract;
use Onlyfansapi\Services\Posts\CommentsService;
use Onlyfansapi\Services\Posts\LabelsService;

/**
 * APIs for managing OnlyFans posts.
 *
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class PostsService implements PostsContract
{
    /**
     * @api
     */
    public PostsRawService $raw;

    /**
     * @api
     */
    public CommentsService $comments;

    /**
     * @api
     */
    public LabelsService $labels;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PostsRawService($client);
        $this->comments = new CommentsService($client);
        $this->labels = new LabelsService($client);
    }

    /**
     * @api
     *
     * Compose and send a new post to your OnlyFans account.
     *
     * @param string $account The Account ID
     * @param string $text The post text content
     * @param int $expireDays Number of days after which the post will expire. Can be 1, 3, 7 or 30 days. Keep empty for no expiration.
     * @param int $fundRaisingTargetAmount Add a fundraising target to your post. If present, value must be at least 10.
     * @param list<string> $fundRaisingTipsPresets Specify which tip amounts will be listed under the fundraising card. Required with `fundRaisingTargetAmount`, and you must provide at least 1 option. Array items cannot be higher than the `fundRaisingTargetAmount`.
     * @param string $labelIDs Array of OF label IDs. Refer to our `/posts/labels` endpoint.
     * @param string $mediaFiles Array of OFAPI `ofapi_media_` IDs, or OF media IDs
     * @param list<string> $previews Array of media file upload prefixed_ids, or OF media IDs (required if price is not 0). Will be shown if `price` is provided. All `previews` values must also exist in the `mediaFiles` array.
     * @param string $rfTag Array OnlyFans creator user IDs to tag in your post
     * @param bool $saveForLater add your post to the "Saved for later" queue
     * @param string $scheduledDate schedule your post in the future (UTC timezone)
     * @param int $votingCorrectIndex The array key of your quiz' correct answer. Required when `votingType` is "quiz". Keep in mind that arrays start at `0`
     * @param int $votingDue The due date (in days) of your poll/quiz. Can be 1, 3, 7 or 30 days. Can only be filled with `votingType`.
     * @param list<string> $votingOptions The options of your poll/quiz. Required with `votingType`.
     * @param VotingType|value-of<VotingType> $votingType include a poll or quiz within your post
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $account,
        string $text,
        ?int $expireDays = null,
        ?int $fundRaisingTargetAmount = null,
        ?array $fundRaisingTipsPresets = null,
        ?string $labelIDs = null,
        ?string $mediaFiles = null,
        ?array $previews = null,
        ?string $rfTag = null,
        ?bool $saveForLater = null,
        ?string $scheduledDate = null,
        ?int $votingCorrectIndex = null,
        ?int $votingDue = null,
        ?array $votingOptions = null,
        VotingType|string|null $votingType = null,
        RequestOptions|array|null $requestOptions = null,
    ): PostNewResponse {
        $params = Util::removeNulls(
            [
                'text' => $text,
                'expireDays' => $expireDays,
                'fundRaisingTargetAmount' => $fundRaisingTargetAmount,
                'fundRaisingTipsPresets' => $fundRaisingTipsPresets,
                'labelIDs' => $labelIDs,
                'mediaFiles' => $mediaFiles,
                'previews' => $previews,
                'rfTag' => $rfTag,
                'saveForLater' => $saveForLater,
                'scheduledDate' => $scheduledDate,
                'votingCorrectIndex' => $votingCorrectIndex,
                'votingDue' => $votingDue,
                'votingOptions' => $votingOptions,
                'votingType' => $votingType,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve details of a post from your account.
     *
     * @param int $postID The ID of the post
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        int $postID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): PostGetResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($postID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a posted, queued, or "saved for later" post.
     *
     * @param int $postID Path param: The ID of the post
     * @param string $account Path param: The Account ID
     * @param string $text Body param: The post text content
     * @param int $expireDays Body param: Number of days after which the post will expire. Can be 1, 3, 7 or 30 days. Keep empty for no expiration.
     * @param int $fundRaisingTargetAmount Body param: Add a fundraising target to your post. If present, value must be at least 10.
     * @param list<string> $fundRaisingTipsPresets Body param: Specify which tip amounts will be listed under the fundraising card. Required with `fundRaisingTargetAmount`, and you must provide at least 1 option. Array items cannot be higher than the `fundRaisingTargetAmount`.
     * @param string $labelIDs Body param: Array of OF label IDs. Refer to our `/posts/labels` endpoint.
     * @param string $mediaFiles Body param: Array of OFAPI `ofapi_media_` IDs, or OF media IDs
     * @param int $price Body param: Price for paid content (0 or between 3-100). In case this is not zero, **mediaFiles** is required
     * @param string $rfTag Body param: Array OnlyFans creator user IDs to tag in your post
     * @param bool $saveForLater body param: Add your post to the "Saved for later" queue
     * @param string $scheduledDate body param: Schedule your post in the future (UTC timezone)
     * @param int $votingCorrectIndex Body param: The array key of your quiz' correct answer. Required when `votingType` is "quiz". Keep in mind that arrays start at `0`
     * @param int $votingDue Body param: The due date (in days) of your poll/quiz. Can be 1, 3, 7 or 30 days. Can only be filled with `votingType`.
     * @param list<string> $votingOptions Body param: The options of your poll/quiz. Required with `votingType`.
     * @param \Onlyfansapi\Posts\PostUpdateParams\VotingType|value-of<\Onlyfansapi\Posts\PostUpdateParams\VotingType> $votingType body param: Include a poll or quiz within your post
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        int $postID,
        string $account,
        string $text,
        ?int $expireDays = null,
        ?int $fundRaisingTargetAmount = null,
        ?array $fundRaisingTipsPresets = null,
        ?string $labelIDs = null,
        ?string $mediaFiles = null,
        ?int $price = null,
        ?string $rfTag = null,
        ?bool $saveForLater = null,
        ?string $scheduledDate = null,
        ?int $votingCorrectIndex = null,
        ?int $votingDue = null,
        ?array $votingOptions = null,
        \Onlyfansapi\Posts\PostUpdateParams\VotingType|string|null $votingType = null,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(
            [
                'account' => $account,
                'text' => $text,
                'expireDays' => $expireDays,
                'fundRaisingTargetAmount' => $fundRaisingTargetAmount,
                'fundRaisingTipsPresets' => $fundRaisingTipsPresets,
                'labelIDs' => $labelIDs,
                'mediaFiles' => $mediaFiles,
                'price' => $price,
                'rfTag' => $rfTag,
                'saveForLater' => $saveForLater,
                'scheduledDate' => $scheduledDate,
                'votingCorrectIndex' => $votingCorrectIndex,
                'votingDue' => $votingDue,
                'votingOptions' => $votingOptions,
                'votingType' => $votingType,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($postID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get posts from your OnlyFans account.
     *
     * @param string $account The Account ID
     * @param bool $counters Set to true to include an array of counters (see example responses)
     * @param int $limit Number of posts to return (default = 10)
     * @param string $minimumPublishDate Filter posts by minimum publish date
     * @param int $offset Number of posts to skip for pagination
     * @param Order|value-of<Order> $order Order the returned posts (default = publish_date)
     * @param bool $pinned Set to true to only show pinned posts
     * @param string $query Search query to filter posts
     * @param Sort|value-of<Sort> $sort Sort the returned posts (default = desc)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        ?bool $counters = null,
        ?int $limit = null,
        ?string $minimumPublishDate = null,
        ?int $offset = null,
        Order|string|null $order = null,
        ?bool $pinned = null,
        ?string $query = null,
        Sort|string|null $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): PostListResponse {
        $params = Util::removeNulls(
            [
                'counters' => $counters,
                'limit' => $limit,
                'minimumPublishDate' => $minimumPublishDate,
                'offset' => $offset,
                'order' => $order,
                'pinned' => $pinned,
                'query' => $query,
                'sort' => $sort,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a post from your account.
     *
     * @param int $postID The ID of the post
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $postID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): PostDeleteResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($postID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Archive a post from your account. Also can be used to move posts between the Regular and Private Archive.
     *
     * @param int $postID Path param: The ID of the post
     * @param string $account Path param: The Account ID
     * @param bool $privateArchive query param: Set to `true` to move this post to the Private Archive
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function archive(
        int $postID,
        string $account,
        ?bool $privateArchive = null,
        RequestOptions|array|null $requestOptions = null,
    ): PostArchiveResponse {
        $params = Util::removeNulls(
            ['account' => $account, 'privateArchive' => $privateArchive]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->archive($postID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Pin or unpin a post to your account.
     *
     * @param int $postID The ID of the post
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function pin(
        int $postID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): PostPinResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->pin($postID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Show the statistics of a post like purchases, views, likes, tips and more.
     *
     * @param int $postID Path param: The ID of the post
     * @param string $account Path param: The Account ID
     * @param bool $withHistoricalData query param: Set to `true` to include historical data for a post
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function stats(
        int $postID,
        string $account,
        ?bool $withHistoricalData = null,
        RequestOptions|array|null $requestOptions = null,
    ): PostStatsResponse {
        $params = Util::removeNulls(
            ['account' => $account, 'withHistoricalData' => $withHistoricalData]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->stats($postID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Unarchive a post from your account.
     *
     * @param int $postID Path param: The ID of the post
     * @param string $account Path param: The Account ID
     * @param bool $privateArchive query param: Set to `true` if this post is currently in the Private Archive
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function unarchive(
        int $postID,
        string $account,
        ?bool $privateArchive = null,
        RequestOptions|array|null $requestOptions = null,
    ): PostUnarchiveResponse {
        $params = Util::removeNulls(
            ['account' => $account, 'privateArchive' => $privateArchive]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->unarchive($postID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
