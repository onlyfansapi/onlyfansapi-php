<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Stories;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\Stories\Highlights\HighlightAddStoryResponse;
use Onlyfansapi\Stories\Highlights\HighlightDeleteResponse;
use Onlyfansapi\Stories\Highlights\HighlightGetResponse;
use Onlyfansapi\Stories\Highlights\HighlightListResponse;
use Onlyfansapi\Stories\Highlights\HighlightNewResponse;
use Onlyfansapi\Stories\Highlights\HighlightRemoveStoryResponse;
use Onlyfansapi\Stories\Highlights\HighlightUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface HighlightsContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param int $coverStoryID The ID of the story to use as the cover for the highlight
     * @param list<string> $storyIDs An array of story IDs to include in the highlight
     * @param string $title The title of the story highlight
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $account,
        int $coverStoryID,
        array $storyIDs,
        string $title,
        RequestOptions|array|null $requestOptions = null,
    ): HighlightNewResponse;

    /**
     * @api
     *
     * @param int $highlightID The ID of the story highlight to retrieve
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        int $highlightID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): HighlightGetResponse;

    /**
     * @api
     *
     * @param int $highlightID Path param: The ID of the story highlight to retrieve
     * @param string $account Path param: The Account ID
     * @param int $coverStoryID Body param: The ID of the story to use as the cover for the highlight. Provide the old value if you don't want to change it.
     * @param list<string> $storyIDs Body param: An array of story IDs to include in the highlight. Provide the old value if you don't want to change it.
     * @param string $title Body param: The new title for the story highlight. Provide the old value if you don't want to change it.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        int $highlightID,
        string $account,
        int $coverStoryID,
        array $storyIDs,
        string $title,
        RequestOptions|array|null $requestOptions = null,
    ): HighlightUpdateResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param int $limit Number of highlights to return (default = 5)
     * @param int $offset Number of highlights to skip for pagination
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        ?int $limit = null,
        ?int $offset = null,
        RequestOptions|array|null $requestOptions = null,
    ): HighlightListResponse;

    /**
     * @api
     *
     * @param int $highlightID The ID of the story highlight to retrieve
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $highlightID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): HighlightDeleteResponse;

    /**
     * @api
     *
     * @param string $storyID_ path param: The ID of the story
     * @param string $account Path param: The Account ID
     * @param int $highlightID Path param: The ID of the story highlight to add the story to
     * @param int $storyID Body param: The ID of the story to add to the highlight
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function addStory(
        string $storyID_,
        string $account,
        int $highlightID,
        int $storyID,
        RequestOptions|array|null $requestOptions = null,
    ): HighlightAddStoryResponse;

    /**
     * @api
     *
     * @param string $storyID the ID of the story
     * @param string $account The Account ID
     * @param int $highlightID The ID of the story highlight to add the story to
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function removeStory(
        string $storyID,
        string $account,
        int $highlightID,
        RequestOptions|array|null $requestOptions = null,
    ): HighlightRemoveStoryResponse;
}
