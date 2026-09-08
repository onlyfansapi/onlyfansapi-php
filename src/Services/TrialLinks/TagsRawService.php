<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\TrialLinks;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\TrialLinks\TagsRawContract;
use OnlyFansAPI\TrialLinks\Tags\TagAddParams;
use OnlyFansAPI\TrialLinks\Tags\TagAddResponse;
use OnlyFansAPI\TrialLinks\Tags\TagListParams;
use OnlyFansAPI\TrialLinks\Tags\TagListResponse;
use OnlyFansAPI\TrialLinks\Tags\TagRemoveParams;
use OnlyFansAPI\TrialLinks\Tags\TagRemoveResponse;

/**
 * APIs for managing Free Trial Links.
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
     * Get tags for a specific free trial link. This is a free endpoint.
     *
     * @param int $trialLinkID The ID of the trial link
     * @param array{account: string}|TagListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TagListResponse>
     *
     * @throws APIException
     */
    public function list(
        int $trialLinkID,
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
            path: ['api/%1$s/trial-links/%2$s/tags', $account, $trialLinkID],
            options: $options,
            convert: TagListResponse::class,
        );
    }

    /**
     * @api
     *
     * Add tags to a specific free trial link. Existing tags are preserved. This is a free endpoint.
     *
     * @param int $trialLinkID Path param: The ID of the trial link
     * @param array{account: string, tags: list<string>}|TagAddParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TagAddResponse>
     *
     * @throws APIException
     */
    public function add(
        int $trialLinkID,
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
            path: ['api/%1$s/trial-links/%2$s/tags', $account, $trialLinkID],
            body: (object) array_diff_key($parsed, array_flip(['account'])),
            options: $options,
            convert: TagAddResponse::class,
        );
    }

    /**
     * @api
     *
     * Remove tags from a specific free trial link. This is a free endpoint.
     *
     * @param int $trialLinkID Path param: The ID of the trial link
     * @param array{account: string, tags: list<string>}|TagRemoveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TagRemoveResponse>
     *
     * @throws APIException
     */
    public function remove(
        int $trialLinkID,
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
            path: ['api/%1$s/trial-links/%2$s/tags', $account, $trialLinkID],
            body: (object) array_diff_key($parsed, array_flip(['account'])),
            options: $options,
            convert: TagRemoveResponse::class,
        );
    }
}
