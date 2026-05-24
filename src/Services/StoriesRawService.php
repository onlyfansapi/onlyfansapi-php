<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\StoriesRawContract;
use Onlyfansapi\Stories\StoryCreateParams;
use Onlyfansapi\Stories\StoryDeleteParams;
use Onlyfansapi\Stories\StoryDeleteResponse;
use Onlyfansapi\Stories\StoryGetResponse;
use Onlyfansapi\Stories\StoryGetStatsResponse;
use Onlyfansapi\Stories\StoryListActiveResponse;
use Onlyfansapi\Stories\StoryListArchiveParams;
use Onlyfansapi\Stories\StoryListArchiveResponse;
use Onlyfansapi\Stories\StoryListViewersParams;
use Onlyfansapi\Stories\StoryListViewersResponse;
use Onlyfansapi\Stories\StoryMarkAsWatchedParams;
use Onlyfansapi\Stories\StoryMarkAsWatchedResponse;
use Onlyfansapi\Stories\StoryNewResponse;
use Onlyfansapi\Stories\StoryRetrieveParams;
use Onlyfansapi\Stories\StoryRetrieveStatsParams;

/**
 * APIs for managing OnlyFans stories.
 *
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class StoriesRawService implements StoriesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Post a new media or vault file to your story.
     *
     * @param string $account The Account ID
     * @param array{mediaFiles: list<string>}|StoryCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<StoryNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $account,
        array|StoryCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = StoryCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/stories', $account],
            body: (object) $parsed,
            options: $options,
            convert: StoryNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve details of a specific story by its ID.
     *
     * @param int $storyID The ID of the story to retrieve
     * @param array{account: string}|StoryRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<StoryGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        int $storyID,
        array|StoryRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = StoryRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/stories/%2$s', $account, $storyID],
            options: $options,
            convert: StoryGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a specific story by its ID.
     *
     * @param int $storyID The ID of the story to retrieve
     * @param array{account: string}|StoryDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<StoryDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        int $storyID,
        array|StoryDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = StoryDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['api/%1$s/stories/%2$s', $account, $storyID],
            options: $options,
            convert: StoryDeleteResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a list of your currently active stories.
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<StoryListActiveResponse>
     *
     * @throws APIException
     */
    public function listActive(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/stories', $account],
            options: $requestOptions,
            convert: StoryListActiveResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a list of your archived stories.
     *
     * @param string $account The Account ID
     * @param array{limit?: int, marker?: string}|StoryListArchiveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<StoryListArchiveResponse>
     *
     * @throws APIException
     */
    public function listArchive(
        string $account,
        array|StoryListArchiveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = StoryListArchiveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/stories/archive', $account],
            query: $parsed,
            options: $options,
            convert: StoryListArchiveResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the list of viewers for a specific story by its ID.
     *
     * @param int $storyID Path param: The ID of the story to get viewers for
     * @param array{
     *   account: string, limit?: int|null, offset?: int|null
     * }|StoryListViewersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<StoryListViewersResponse>
     *
     * @throws APIException
     */
    public function listViewers(
        int $storyID,
        array|StoryListViewersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = StoryListViewersParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/stories/%2$s/viewers', $account, $storyID],
            query: $parsed,
            options: $options,
            convert: StoryListViewersResponse::class,
        );
    }

    /**
     * @api
     *
     * Mark a specific story as watched by its ID.
     *
     * @param int $storyID the ID of the story to mark as watched
     * @param array{account: string}|StoryMarkAsWatchedParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<StoryMarkAsWatchedResponse>
     *
     * @throws APIException
     */
    public function markAsWatched(
        int $storyID,
        array|StoryMarkAsWatchedParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = StoryMarkAsWatchedParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/stories/%2$s/mark-as-watched', $account, $storyID],
            options: $options,
            convert: StoryMarkAsWatchedResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve viewer count, likes count, comments count, and tips statistics for a specific story by its ID.
     *
     * @param int $storyID The ID of the story to get stats for
     * @param array{account: string}|StoryRetrieveStatsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<StoryGetStatsResponse>
     *
     * @throws APIException
     */
    public function retrieveStats(
        int $storyID,
        array|StoryRetrieveStatsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = StoryRetrieveStatsParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/stories/%2$s/stats', $account, $storyID],
            options: $options,
            convert: StoryGetStatsResponse::class,
        );
    }
}
