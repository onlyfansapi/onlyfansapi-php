<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\Stories\StoryCreateParams;
use OnlyFansAPI\Stories\StoryDeleteParams;
use OnlyFansAPI\Stories\StoryDeleteResponse;
use OnlyFansAPI\Stories\StoryGetResponse;
use OnlyFansAPI\Stories\StoryGetStatsResponse;
use OnlyFansAPI\Stories\StoryListActiveResponse;
use OnlyFansAPI\Stories\StoryListArchiveParams;
use OnlyFansAPI\Stories\StoryListArchiveResponse;
use OnlyFansAPI\Stories\StoryListViewersParams;
use OnlyFansAPI\Stories\StoryListViewersResponse;
use OnlyFansAPI\Stories\StoryMarkAsWatchedParams;
use OnlyFansAPI\Stories\StoryMarkAsWatchedResponse;
use OnlyFansAPI\Stories\StoryNewResponse;
use OnlyFansAPI\Stories\StoryRetrieveParams;
use OnlyFansAPI\Stories\StoryRetrieveStatsParams;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface StoriesRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|StoryCreateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $storyID The ID of the story to retrieve
     * @param array<string,mixed>|StoryRetrieveParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $storyID The ID of the story to retrieve
     * @param array<string,mixed>|StoryDeleteParams $params
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
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|StoryListArchiveParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $storyID Path param: The ID of the story to get viewers for
     * @param array<string,mixed>|StoryListViewersParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $storyID the ID of the story to mark as watched
     * @param array<string,mixed>|StoryMarkAsWatchedParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $storyID The ID of the story to get stats for
     * @param array<string,mixed>|StoryRetrieveStatsParams $params
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
    ): BaseResponse;
}
