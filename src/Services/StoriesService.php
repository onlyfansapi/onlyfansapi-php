<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\StoriesContract;
use OnlyFansAPI\Services\Stories\HighlightsService;
use OnlyFansAPI\Stories\StoryDeleteResponse;
use OnlyFansAPI\Stories\StoryGetResponse;
use OnlyFansAPI\Stories\StoryGetStatsResponse;
use OnlyFansAPI\Stories\StoryListActiveResponse;
use OnlyFansAPI\Stories\StoryListArchiveResponse;
use OnlyFansAPI\Stories\StoryListViewersResponse;
use OnlyFansAPI\Stories\StoryMarkAsWatchedResponse;
use OnlyFansAPI\Stories\StoryNewResponse;

/**
 * APIs for managing OnlyFans stories.
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class StoriesService implements StoriesContract
{
    /**
     * @api
     */
    public StoriesRawService $raw;

    /**
     * @api
     */
    public HighlightsService $highlights;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new StoriesRawService($client);
        $this->highlights = new HighlightsService($client);
    }

    /**
     * @api
     *
     * Post a new media or vault file to your story.
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
    ): StoryNewResponse {
        $params = Util::removeNulls(['mediaFiles' => $mediaFiles]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve details of a specific story by its ID.
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
    ): StoryGetResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($storyID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a specific story by its ID.
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
    ): StoryDeleteResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($storyID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a list of your currently active stories.
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listActive(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): StoryListActiveResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listActive($account, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a list of your archived stories.
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
    ): StoryListArchiveResponse {
        $params = Util::removeNulls(['limit' => $limit, 'marker' => $marker]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listArchive($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the list of viewers for a specific story by its ID.
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
    ): StoryListViewersResponse {
        $params = Util::removeNulls(
            ['account' => $account, 'limit' => $limit, 'offset' => $offset]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listViewers($storyID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Mark a specific story as watched by its ID.
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
    ): StoryMarkAsWatchedResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->markAsWatched($storyID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve viewer count, likes count, comments count, and tips statistics for a specific story by its ID.
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
    ): StoryGetStatsResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveStats($storyID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
