<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\SharedTrackingLinksContract;
use OnlyFansAPI\Services\SharedTrackingLinks\TagsService;
use OnlyFansAPI\SharedTrackingLinks\SharedTrackingLinkListParams\Pagination;
use OnlyFansAPI\SharedTrackingLinks\SharedTrackingLinkListParams\SortingDeleted;
use OnlyFansAPI\SharedTrackingLinks\SharedTrackingLinkListParams\WithDeleted;
use OnlyFansAPI\SharedTrackingLinks\SharedTrackingLinkListResponse;
use OnlyFansAPI\SharedTrackingLinks\SharedTrackingLinkRevokeAccessResponse;

/**
 * APIs for Tracking Links (campaigns) that other OF creators have shared with this account. Revenue, cost, and spender data are not available for shared campaigns.
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class SharedTrackingLinksService implements SharedTrackingLinksContract
{
    /**
     * @api
     */
    public SharedTrackingLinksRawService $raw;

    /**
     * @api
     */
    public TagsService $tags;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SharedTrackingLinksRawService($client);
        $this->tags = new TagsService($client);
    }

    /**
     * @api
     *
     * List all Tracking Links (campaigns) shared with the account by other OF creators. Calls OnlyFans live and syncs to our cache.
     *
     * @param string $account The Account ID
     * @param int $limit The number of shared tracking links to return. Default `10`. Must be at least 1. Must not be greater than 100.
     * @param int $offset The offset used for pagination. Default `0`. Must be at least 0.
     * @param Pagination|value-of<Pagination> $pagination Whether pagination metadata is enabled. Default `1`.
     * @param SortingDeleted|value-of<SortingDeleted> $sortingDeleted Whether deleted links participate in sorting. Default `1`.
     * @param string $stats Whether statistics are included. Default `true`. Must not be greater than 10 characters.
     * @param bool $synchronous wait for the database sync instead of processing it in the background
     * @param WithDeleted|value-of<WithDeleted> $withDeleted Whether to include deleted shared tracking links. Default `1`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        ?int $limit = null,
        ?int $offset = null,
        Pagination|int|null $pagination = null,
        SortingDeleted|int|null $sortingDeleted = null,
        ?string $stats = null,
        ?bool $synchronous = null,
        WithDeleted|int|null $withDeleted = null,
        RequestOptions|array|null $requestOptions = null,
    ): SharedTrackingLinkListResponse {
        $params = Util::removeNulls(
            [
                'limit' => $limit,
                'offset' => $offset,
                'pagination' => $pagination,
                'sortingDeleted' => $sortingDeleted,
                'stats' => $stats,
                'synchronous' => $synchronous,
                'withDeleted' => $withDeleted,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Revoke the account's access to a shared Tracking Link (campaign). Calls OnlyFans `DELETE /campaigns/share-access`, then removes the local cache row. The owner keeps the link.
     *
     * @param int $sharedTrackingLinkID The OnlyFans-side ID of the shared tracking link
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function revokeAccess(
        int $sharedTrackingLinkID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): SharedTrackingLinkRevokeAccessResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->revokeAccess($sharedTrackingLinkID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
