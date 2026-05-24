<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\SharedTrialLinksRawContract;
use Onlyfansapi\SharedTrialLinks\SharedTrialLinkListParams;
use Onlyfansapi\SharedTrialLinks\SharedTrialLinkListResponse;
use Onlyfansapi\SharedTrialLinks\SharedTrialLinkRevokeAccessParams;
use Onlyfansapi\SharedTrialLinks\SharedTrialLinkRevokeAccessResponse;

/**
 * APIs for Free Trial Links that other OF creators have shared with this account. Revenue, cost, and spender data are not available for shared links.
 *
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class SharedTrialLinksRawService implements SharedTrialLinksRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List all Free Trial Links shared with the account by other OF creators. Calls OnlyFans live and syncs to our cache.
     *
     * @param string $account The Account ID
     * @param array{
     *   limit?: int, offset?: int, synchronous?: bool|null
     * }|SharedTrialLinkListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SharedTrialLinkListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        array|SharedTrialLinkListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SharedTrialLinkListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/shared-trial-links', $account],
            query: $parsed,
            options: $options,
            convert: SharedTrialLinkListResponse::class,
        );
    }

    /**
     * @api
     *
     * Revoke the account's access to a shared Free Trial Link. Calls OnlyFans `DELETE /trials/share-access`, then removes the local cache row. The owner keeps the link.
     *
     * @param int $sharedTrialLinkID The OnlyFans-side ID of the shared trial link
     * @param array{account: string}|SharedTrialLinkRevokeAccessParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SharedTrialLinkRevokeAccessResponse>
     *
     * @throws APIException
     */
    public function revokeAccess(
        int $sharedTrialLinkID,
        array|SharedTrialLinkRevokeAccessParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SharedTrialLinkRevokeAccessParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['api/%1$s/shared-trial-links/%2$s', $account, $sharedTrialLinkID],
            options: $options,
            convert: SharedTrialLinkRevokeAccessResponse::class,
        );
    }
}
