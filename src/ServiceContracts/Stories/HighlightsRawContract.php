<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Stories;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\Stories\Highlights\HighlightAddStoryParams;
use OnlyFansAPI\Stories\Highlights\HighlightAddStoryResponse;
use OnlyFansAPI\Stories\Highlights\HighlightCreateParams;
use OnlyFansAPI\Stories\Highlights\HighlightDeleteParams;
use OnlyFansAPI\Stories\Highlights\HighlightDeleteResponse;
use OnlyFansAPI\Stories\Highlights\HighlightGetResponse;
use OnlyFansAPI\Stories\Highlights\HighlightListParams;
use OnlyFansAPI\Stories\Highlights\HighlightListResponse;
use OnlyFansAPI\Stories\Highlights\HighlightNewResponse;
use OnlyFansAPI\Stories\Highlights\HighlightRemoveStoryParams;
use OnlyFansAPI\Stories\Highlights\HighlightRemoveStoryResponse;
use OnlyFansAPI\Stories\Highlights\HighlightRetrieveParams;
use OnlyFansAPI\Stories\Highlights\HighlightUpdateParams;
use OnlyFansAPI\Stories\Highlights\HighlightUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface HighlightsRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|HighlightCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<HighlightNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $account,
        array|HighlightCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $highlightID The ID of the story highlight to retrieve
     * @param array<string,mixed>|HighlightRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<HighlightGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        int $highlightID,
        array|HighlightRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $highlightID Path param: The ID of the story highlight to retrieve
     * @param array<string,mixed>|HighlightUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<HighlightUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        int $highlightID,
        array|HighlightUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|HighlightListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<HighlightListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        array|HighlightListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $highlightID The ID of the story highlight to retrieve
     * @param array<string,mixed>|HighlightDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<HighlightDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        int $highlightID,
        array|HighlightDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $storyID_ path param: The ID of the story
     * @param array<string,mixed>|HighlightAddStoryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<HighlightAddStoryResponse>
     *
     * @throws APIException
     */
    public function addStory(
        string $storyID_,
        array|HighlightAddStoryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $storyID the ID of the story
     * @param array<string,mixed>|HighlightRemoveStoryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<HighlightRemoveStoryResponse>
     *
     * @throws APIException
     */
    public function removeStory(
        string $storyID,
        array|HighlightRemoveStoryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
