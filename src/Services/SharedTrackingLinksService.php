<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\SharedTrackingLinksContract;
use Onlyfansapi\Services\SharedTrackingLinks\TagsService;
use Onlyfansapi\SharedTrackingLinks\SharedTrackingLinkListResponse;
use Onlyfansapi\SharedTrackingLinks\SharedTrackingLinkRevokeAccessResponse;

/**
 * APIs for Tracking Links (campaigns) that other OF creators have shared with this account. Revenue, cost, and spender data are not available for shared campaigns.
 *
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
     * @param int $limit The number of shared tracking links to return. Default `10`
     * @param int $offset The offset used for pagination. Default `0`
     * @param bool|null $synchronous Wait for the database sync to finish, instead of running it in the background. **Will result in longer response times, use with caution**. Default `false`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        ?int $limit = null,
        ?int $offset = null,
        ?bool $synchronous = null,
        RequestOptions|array|null $requestOptions = null,
    ): SharedTrackingLinkListResponse {
        $params = Util::removeNulls(
            ['limit' => $limit, 'offset' => $offset, 'synchronous' => $synchronous]
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
