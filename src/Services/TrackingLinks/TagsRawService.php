<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\TrackingLinks;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\TrackingLinks\TagsRawContract;
use Onlyfansapi\TrackingLinks\Tags\TagAddParams;
use Onlyfansapi\TrackingLinks\Tags\TagAddResponse;
use Onlyfansapi\TrackingLinks\Tags\TagListParams;
use Onlyfansapi\TrackingLinks\Tags\TagListResponse;
use Onlyfansapi\TrackingLinks\Tags\TagRemoveParams;
use Onlyfansapi\TrackingLinks\Tags\TagRemoveResponse;

/**
 * APIs for managing tracking links.
 *
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
