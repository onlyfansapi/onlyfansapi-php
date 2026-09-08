<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\SharedTrackingLinks;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\SharedTrackingLinks\TagsRawContract;
use OnlyFansAPI\SharedTrackingLinks\Tags\TagAddParams;
use OnlyFansAPI\SharedTrackingLinks\Tags\TagAddResponse;
use OnlyFansAPI\SharedTrackingLinks\Tags\TagListParams;
use OnlyFansAPI\SharedTrackingLinks\Tags\TagListResponse;
use OnlyFansAPI\SharedTrackingLinks\Tags\TagRemoveParams;
use OnlyFansAPI\SharedTrackingLinks\Tags\TagRemoveResponse;

/**
 * APIs for Tracking Links (campaigns) that other OF creators have shared with this account. Revenue, cost, and spender data are not available for shared campaigns.
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
     * Get tags for a specific shared Tracking Link. Tag namespace is shared with owned Tracking Links. This is a free endpoint.
     *
     * @param int $sharedTrackingLinkID The OnlyFans-side ID of the shared tracking link
     * @param array{account: string}|TagListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TagListResponse>
     *
     * @throws APIException
     */
    public function list(
        int $sharedTrackingLinkID,
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
            path: [
                'api/%1$s/shared-tracking-links/%2$s/tags',
                $account,
                $sharedTrackingLinkID,
            ],
            options: $options,
            convert: TagListResponse::class,
        );
    }

    /**
     * @api
     *
     * Add tags to a shared Tracking Link. Existing tags are preserved. Tag namespace is shared with owned Tracking Links. This is a free endpoint.
     *
     * @param int $sharedTrackingLinkID Path param: The OnlyFans-side ID of the shared tracking link
     * @param array{account: string, tags: list<string>}|TagAddParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TagAddResponse>
     *
     * @throws APIException
     */
    public function add(
        int $sharedTrackingLinkID,
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
            path: [
                'api/%1$s/shared-tracking-links/%2$s/tags',
                $account,
                $sharedTrackingLinkID,
            ],
            body: (object) array_diff_key($parsed, array_flip(['account'])),
            options: $options,
            convert: TagAddResponse::class,
        );
    }

    /**
     * @api
     *
     * Remove tags from a shared Tracking Link. Tag namespace is shared with owned Tracking Links. This is a free endpoint.
     *
     * @param int $sharedTrackingLinkID Path param: The OnlyFans-side ID of the shared tracking link
     * @param array{account: string, tags: list<string>}|TagRemoveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TagRemoveResponse>
     *
     * @throws APIException
     */
    public function remove(
        int $sharedTrackingLinkID,
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
            path: [
                'api/%1$s/shared-tracking-links/%2$s/tags',
                $account,
                $sharedTrackingLinkID,
            ],
            body: (object) array_diff_key($parsed, array_flip(['account'])),
            options: $options,
            convert: TagRemoveResponse::class,
        );
    }
}
