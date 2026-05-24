<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Stories;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\Stories\Highlights\HighlightAddStoryParams;
use Onlyfansapi\Stories\Highlights\HighlightAddStoryResponse;
use Onlyfansapi\Stories\Highlights\HighlightCreateParams;
use Onlyfansapi\Stories\Highlights\HighlightDeleteParams;
use Onlyfansapi\Stories\Highlights\HighlightDeleteResponse;
use Onlyfansapi\Stories\Highlights\HighlightGetResponse;
use Onlyfansapi\Stories\Highlights\HighlightListParams;
use Onlyfansapi\Stories\Highlights\HighlightListResponse;
use Onlyfansapi\Stories\Highlights\HighlightNewResponse;
use Onlyfansapi\Stories\Highlights\HighlightRemoveStoryParams;
use Onlyfansapi\Stories\Highlights\HighlightRemoveStoryResponse;
use Onlyfansapi\Stories\Highlights\HighlightRetrieveParams;
use Onlyfansapi\Stories\Highlights\HighlightUpdateParams;
use Onlyfansapi\Stories\Highlights\HighlightUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
