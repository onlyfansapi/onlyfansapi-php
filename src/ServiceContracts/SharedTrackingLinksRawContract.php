<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\SharedTrackingLinks\SharedTrackingLinkListParams;
use Onlyfansapi\SharedTrackingLinks\SharedTrackingLinkListResponse;
use Onlyfansapi\SharedTrackingLinks\SharedTrackingLinkRevokeAccessParams;
use Onlyfansapi\SharedTrackingLinks\SharedTrackingLinkRevokeAccessResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
