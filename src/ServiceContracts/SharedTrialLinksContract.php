<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\SharedTrialLinks\SharedTrialLinkListResponse;
use Onlyfansapi\SharedTrialLinks\SharedTrialLinkRevokeAccessResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface SharedTrialLinksContract
{
    /**
     * @api
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
    ): SharedTrialLinkListResponse;

    /**
     * @api
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
    ): SharedTrialLinkRevokeAccessResponse;
}
