<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\SharedTrackingLinksRawContract;
use OnlyFansAPI\SharedTrackingLinks\SharedTrackingLinkListParams;
use OnlyFansAPI\SharedTrackingLinks\SharedTrackingLinkListParams\Pagination;
use OnlyFansAPI\SharedTrackingLinks\SharedTrackingLinkListParams\SortingDeleted;
use OnlyFansAPI\SharedTrackingLinks\SharedTrackingLinkListParams\WithDeleted;
use OnlyFansAPI\SharedTrackingLinks\SharedTrackingLinkListResponse;
use OnlyFansAPI\SharedTrackingLinks\SharedTrackingLinkRevokeAccessParams;
use OnlyFansAPI\SharedTrackingLinks\SharedTrackingLinkRevokeAccessResponse;

/**
 * APIs for Tracking Links (campaigns) that other OF creators have shared with this account. Revenue, cost, and spender data are not available for shared campaigns.
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
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
     *   limit?: int,
     *   offset?: int,
     *   pagination?: Pagination|value-of<Pagination>,
     *   sortingDeleted?: SortingDeleted|value-of<SortingDeleted>,
     *   stats?: string,
     *   synchronous?: bool,
     *   withDeleted?: WithDeleted|value-of<WithDeleted>,
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
            query: Util::array_transform_keys(
                $parsed,
                [
                    'sortingDeleted' => 'sorting_deleted', 'withDeleted' => 'with_deleted',
                ],
            ),
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
