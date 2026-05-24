<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\SharedTrackingLinksRawContract;
use Onlyfansapi\SharedTrackingLinks\SharedTrackingLinkListParams;
use Onlyfansapi\SharedTrackingLinks\SharedTrackingLinkListResponse;
use Onlyfansapi\SharedTrackingLinks\SharedTrackingLinkRevokeAccessParams;
use Onlyfansapi\SharedTrackingLinks\SharedTrackingLinkRevokeAccessResponse;

/**
 * APIs for Tracking Links (campaigns) that other OF creators have shared with this account. Revenue, cost, and spender data are not available for shared campaigns.
 *
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class SharedTrackingLinksRawService implements SharedTrackingLinksRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List all Tracking Links (campaigns) shared with the account by other OF creators. Calls OnlyFans live and syncs to our cache.
     *
     * @param string $account The Account ID
     * @param array{
     *   limit?: int, offset?: int, synchronous?: bool|null
     * }|SharedTrackingLinkListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SharedTrackingLinkListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        array|SharedTrackingLinkListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SharedTrackingLinkListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/shared-tracking-links', $account],
            query: $parsed,
            options: $options,
            convert: SharedTrackingLinkListResponse::class,
        );
    }

    /**
     * @api
     *
     * Revoke the account's access to a shared Tracking Link (campaign). Calls OnlyFans `DELETE /campaigns/share-access`, then removes the local cache row. The owner keeps the link.
     *
     * @param int $sharedTrackingLinkID The OnlyFans-side ID of the shared tracking link
     * @param array{account: string}|SharedTrackingLinkRevokeAccessParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SharedTrackingLinkRevokeAccessResponse>
     *
     * @throws APIException
     */
    public function revokeAccess(
        int $sharedTrackingLinkID,
        array|SharedTrackingLinkRevokeAccessParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SharedTrackingLinkRevokeAccessParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'api/%1$s/shared-tracking-links/%2$s', $account, $sharedTrackingLinkID,
            ],
            options: $options,
            convert: SharedTrackingLinkRevokeAccessResponse::class,
        );
    }
}
