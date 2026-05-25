<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\TrackingLinks;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\TrackingLinks\TagsRawContract;
use OnlyFansAPI\TrackingLinks\Tags\TagAddParams;
use OnlyFansAPI\TrackingLinks\Tags\TagAddResponse;
use OnlyFansAPI\TrackingLinks\Tags\TagListParams;
use OnlyFansAPI\TrackingLinks\Tags\TagListResponse;
use OnlyFansAPI\TrackingLinks\Tags\TagRemoveParams;
use OnlyFansAPI\TrackingLinks\Tags\TagRemoveResponse;

/**
 * APIs for managing tracking links.
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class TagsRawService implements TagsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get tags for a specific tracking link. This is a free endpoint.
     *
     * @param int $trackingLinkID The ID of the tracking link
     * @param array{account: string}|TagListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TagListResponse>
     *
     * @throws APIException
     */
    public function list(
        int $trackingLinkID,
        array|TagListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TagListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/tracking-links/%2$s/tags', $account, $trackingLinkID],
            options: $options,
            convert: TagListResponse::class,
        );
    }

    /**
     * @api
     *
     * Add tags to a specific tracking link. Existing tags are preserved. This is a free endpoint.
     *
     * @param int $trackingLinkID Path param: The ID of the tracking link
     * @param array{account: string, tags: list<string>}|TagAddParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TagAddResponse>
     *
     * @throws APIException
     */
    public function add(
        int $trackingLinkID,
        array|TagAddParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TagAddParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/tracking-links/%2$s/tags', $account, $trackingLinkID],
            body: (object) array_diff_key($parsed, array_flip(['account'])),
            options: $options,
            convert: TagAddResponse::class,
        );
    }

    /**
     * @api
     *
     * Remove tags from a specific tracking link. This is a free endpoint.
     *
     * @param int $trackingLinkID Path param: The ID of the tracking link
     * @param array{account: string, tags: list<string>}|TagRemoveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TagRemoveResponse>
     *
     * @throws APIException
     */
    public function remove(
        int $trackingLinkID,
        array|TagRemoveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TagRemoveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['api/%1$s/tracking-links/%2$s/tags', $account, $trackingLinkID],
            body: (object) array_diff_key($parsed, array_flip(['account'])),
            options: $options,
            convert: TagRemoveResponse::class,
        );
    }
}
