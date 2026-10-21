<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Stories;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Stories\HighlightsRawContract;
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
 * APIs for managing OnlyFans story highlights.
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class HighlightsRawService implements HighlightsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new story highlight.
     *
     * @param string $account The Account ID
     * @param array{
     *   coverStoryID: int, storyIDs: list<string>, title: string
     * }|HighlightCreateParams $params
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
    ): BaseResponse {
        [$parsed, $options] = HighlightCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/stories/highlights', $account],
            body: (object) $parsed,
            options: $options,
            convert: HighlightNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve details of a specific story highlight by its ID.
     *
     * @param int $highlightID The ID of the story highlight to retrieve
     * @param array{account: string}|HighlightRetrieveParams $params
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
    ): BaseResponse {
        [$parsed, $options] = HighlightRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/stories/highlights/%2$s', $account, $highlightID],
            options: $options,
            convert: HighlightGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update the details of a specific story highlight by its ID.
     *
     * @param int $highlightID Path param: The ID of the story highlight to retrieve
     * @param array{
     *   account: string, coverStoryID: int, storyIDs: list<string>, title: string
     * }|HighlightUpdateParams $params
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
    ): BaseResponse {
        [$parsed, $options] = HighlightUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['api/%1$s/stories/highlights/%2$s', $account, $highlightID],
            body: (object) array_diff_key($parsed, array_flip(['account'])),
            options: $options,
            convert: HighlightUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a list of your story highlights.
     *
     * @param string $account The Account ID
     * @param array{limit?: int, offset?: int}|HighlightListParams $params
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
    ): BaseResponse {
        [$parsed, $options] = HighlightListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/stories/highlights', $account],
            query: $parsed,
            options: $options,
            convert: HighlightListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a specific story highlight by its ID.
     *
     * @param int $highlightID The ID of the story highlight to retrieve
     * @param array{account: string}|HighlightDeleteParams $params
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
    ): BaseResponse {
        [$parsed, $options] = HighlightDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['api/%1$s/stories/highlights/%2$s', $account, $highlightID],
            options: $options,
            convert: HighlightDeleteResponse::class,
        );
    }

    /**
     * @api
     *
     * Add a specific story to a story highlight.
     *
     * @param string $storyID_ path param: The ID of the story
     * @param array{
     *   account: string, highlightID: int, storyID: int
     * }|HighlightAddStoryParams $params
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
    ): BaseResponse {
        [$parsed, $options] = HighlightAddStoryParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);
        $highlightID = $parsed['highlightID'];
        unset($parsed['highlightID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: [
                'api/%1$s/stories/highlights/%2$s/%3$s',
                $account,
                $highlightID,
                $storyID_,
            ],
            body: (object) array_diff_key(
                $parsed,
                array_flip(['account', 'highlightID'])
            ),
            options: $options,
            convert: HighlightAddStoryResponse::class,
        );
    }

    /**
     * @api
     *
     * Remove a specific story from a story highlight.
     *
     * @param string $storyID the ID of the story
     * @param array{
     *   account: string, highlightID: int
     * }|HighlightRemoveStoryParams $params
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
    ): BaseResponse {
        [$parsed, $options] = HighlightRemoveStoryParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);
        $highlightID = $parsed['highlightID'];
        unset($parsed['highlightID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'api/%1$s/stories/highlights/%2$s/%3$s',
                $account,
                $highlightID,
                $storyID,
            ],
            options: $options,
            convert: HighlightRemoveStoryResponse::class,
        );
    }
}
