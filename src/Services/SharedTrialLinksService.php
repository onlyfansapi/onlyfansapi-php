<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\SharedTrialLinksContract;
use OnlyFansAPI\Services\SharedTrialLinks\TagsService;
use OnlyFansAPI\SharedTrialLinks\SharedTrialLinkListResponse;
use OnlyFansAPI\SharedTrialLinks\SharedTrialLinkRevokeAccessResponse;

/**
 * APIs for Free Trial Links that other OF creators have shared with this account. Revenue, cost, and spender data are not available for shared links.
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class SharedTrialLinksService implements SharedTrialLinksContract
{
    /**
     * @api
     */
    public SharedTrialLinksRawService $raw;

    /**
     * @api
     */
    public TagsService $tags;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SharedTrialLinksRawService($client);
        $this->tags = new TagsService($client);
    }

    /**
     * @api
     *
     * List all Free Trial Links shared with the account by other OF creators. Calls OnlyFans live and syncs to our cache.
     *
     * @param string $account The Account ID
     * @param int $limit The number of shared trial links to return. Default `10`
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
    ): SharedTrialLinkListResponse {
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
     * Revoke the account's access to a shared Free Trial Link. Calls OnlyFans `DELETE /trials/share-access`, then removes the local cache row. The owner keeps the link.
     *
     * @param int $sharedTrialLinkID The OnlyFans-side ID of the shared trial link
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function revokeAccess(
        int $sharedTrialLinkID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): SharedTrialLinkRevokeAccessResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->revokeAccess($sharedTrialLinkID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
