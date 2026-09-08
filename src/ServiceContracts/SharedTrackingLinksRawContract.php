<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\SharedTrackingLinks\SharedTrackingLinkListParams;
use OnlyFansAPI\SharedTrackingLinks\SharedTrackingLinkListResponse;
use OnlyFansAPI\SharedTrackingLinks\SharedTrackingLinkRevokeAccessParams;
use OnlyFansAPI\SharedTrackingLinks\SharedTrackingLinkRevokeAccessResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface SharedTrackingLinksRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|SharedTrackingLinkListParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $sharedTrackingLinkID The OnlyFans-side ID of the shared tracking link
     * @param array<string,mixed>|SharedTrackingLinkRevokeAccessParams $params
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
    ): BaseResponse;
}
