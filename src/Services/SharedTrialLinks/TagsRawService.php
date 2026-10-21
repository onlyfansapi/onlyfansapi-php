<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\SharedTrialLinks;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\SharedTrialLinks\TagsRawContract;
use OnlyFansAPI\SharedTrialLinks\Tags\TagAddParams;
use OnlyFansAPI\SharedTrialLinks\Tags\TagAddResponse;
use OnlyFansAPI\SharedTrialLinks\Tags\TagListParams;
use OnlyFansAPI\SharedTrialLinks\Tags\TagListResponse;
use OnlyFansAPI\SharedTrialLinks\Tags\TagRemoveParams;
use OnlyFansAPI\SharedTrialLinks\Tags\TagRemoveResponse;

/**
 * APIs for Free Trial Links that other OF creators have shared with this account. Revenue, cost, and spender data are not available for shared links.
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
     * Get tags for a specific shared Free Trial Link. Tag namespace is shared with owned Free Trial Links. This is a free endpoint.
     *
     * @param int $sharedTrialLinkID The OnlyFans-side ID of the shared trial link
     * @param array{account: string}|TagListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TagListResponse>
     *
     * @throws APIException
     */
    public function list(
        int $sharedTrialLinkID,
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
                'api/%1$s/shared-trial-links/%2$s/tags', $account, $sharedTrialLinkID,
            ],
            options: $options,
            convert: TagListResponse::class,
        );
    }

    /**
     * @api
     *
     * Add tags to a shared Free Trial Link. Existing tags are preserved. Tag namespace is shared with owned Free Trial Links. This is a free endpoint.
     *
     * @param int $sharedTrialLinkID Path param: The OnlyFans-side ID of the shared trial link
     * @param array{account: string, tags: list<string>}|TagAddParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TagAddResponse>
     *
     * @throws APIException
     */
    public function add(
        int $sharedTrialLinkID,
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
                'api/%1$s/shared-trial-links/%2$s/tags', $account, $sharedTrialLinkID,
            ],
            body: (object) array_diff_key($parsed, array_flip(['account'])),
            options: $options,
            convert: TagAddResponse::class,
        );
    }

    /**
     * @api
     *
     * Remove tags from a shared Free Trial Link. Tag namespace is shared with owned Free Trial Links. This is a free endpoint.
     *
     * @param int $sharedTrialLinkID Path param: The OnlyFans-side ID of the shared trial link
     * @param array{account: string, tags: list<string>}|TagRemoveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TagRemoveResponse>
     *
     * @throws APIException
     */
    public function remove(
        int $sharedTrialLinkID,
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
                'api/%1$s/shared-trial-links/%2$s/tags', $account, $sharedTrialLinkID,
            ],
            body: (object) array_diff_key($parsed, array_flip(['account'])),
            options: $options,
            convert: TagRemoveResponse::class,
        );
    }
}
