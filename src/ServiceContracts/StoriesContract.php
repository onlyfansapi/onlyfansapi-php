<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\Stories\StoryDeleteResponse;
use OnlyFansAPI\Stories\StoryGetResponse;
use OnlyFansAPI\Stories\StoryGetStatsResponse;
use OnlyFansAPI\Stories\StoryListActiveResponse;
use OnlyFansAPI\Stories\StoryListArchiveResponse;
use OnlyFansAPI\Stories\StoryListViewersResponse;
use OnlyFansAPI\Stories\StoryMarkAsWatchedResponse;
use OnlyFansAPI\Stories\StoryNewResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface StoriesContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param list<string> $mediaFiles array of media file upload prefixed_ids, or OF media IDs (required if price is not 0)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $account,
        array $mediaFiles,
        RequestOptions|array|null $requestOptions = null,
    ): StoryNewResponse;

    /**
     * @api
     *
     * @param int $storyID The ID of the story to retrieve
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        int $storyID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): StoryGetResponse;

    /**
     * @api
     *
     * @param int $storyID The ID of the story to retrieve
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $storyID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): StoryDeleteResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listActive(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): StoryListActiveResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param int $limit Number of stories to return (default = 18)
     * @param string $marker The marker used for pagination. Default: `null`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listArchive(
        string $account,
        ?int $limit = null,
        ?string $marker = null,
        RequestOptions|array|null $requestOptions = null,
    ): StoryListArchiveResponse;

    /**
     * @api
     *
     * @param int $storyID Path param: The ID of the story to get viewers for
     * @param string $account Path param: The Account ID
     * @param int|null $limit Query param: The number of story viewers to return. Default `8`
     * @param int|null $offset Query param: The offset used for pagination. Default `0`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listViewers(
        int $storyID,
        string $account,
        ?int $limit = null,
        ?int $offset = null,
        RequestOptions|array|null $requestOptions = null,
    ): StoryListViewersResponse;

    /**
     * @api
     *
     * @param int $storyID the ID of the story to mark as watched
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function markAsWatched(
        int $storyID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): StoryMarkAsWatchedResponse;

    /**
     * @api
     *
     * @param int $storyID The ID of the story to get stats for
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveStats(
        int $storyID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): StoryGetStatsResponse;
}
