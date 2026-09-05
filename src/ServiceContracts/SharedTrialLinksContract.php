<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\SharedTrialLinks\SharedTrialLinkListParams\Pagination;
use OnlyFansAPI\SharedTrialLinks\SharedTrialLinkListResponse;
use OnlyFansAPI\SharedTrialLinks\SharedTrialLinkRevokeAccessResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface SharedTrialLinksContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param int $limit The number of shared trial links to return. Default `10`. Must be at least 1. Must not be greater than 100.
     * @param int $offset The offset used for pagination. Default `0`. Must be at least 0.
     * @param Pagination|value-of<Pagination> $pagination
     * @param bool $synchronous wait for the database sync instead of processing it in the background
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        ?int $limit = null,
        ?int $offset = null,
        Pagination|int|null $pagination = null,
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
