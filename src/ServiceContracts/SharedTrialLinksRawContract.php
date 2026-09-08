<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\SharedTrialLinks\SharedTrialLinkListParams;
use OnlyFansAPI\SharedTrialLinks\SharedTrialLinkListResponse;
use OnlyFansAPI\SharedTrialLinks\SharedTrialLinkRevokeAccessParams;
use OnlyFansAPI\SharedTrialLinks\SharedTrialLinkRevokeAccessResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface SharedTrialLinksRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|SharedTrialLinkListParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $sharedTrialLinkID The OnlyFans-side ID of the shared trial link
     * @param array<string,mixed>|SharedTrialLinkRevokeAccessParams $params
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
    ): BaseResponse;
}
