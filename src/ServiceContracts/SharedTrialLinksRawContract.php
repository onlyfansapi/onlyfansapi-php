<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\SharedTrialLinks\SharedTrialLinkListParams;
use Onlyfansapi\SharedTrialLinks\SharedTrialLinkListResponse;
use Onlyfansapi\SharedTrialLinks\SharedTrialLinkRevokeAccessParams;
use Onlyfansapi\SharedTrialLinks\SharedTrialLinkRevokeAccessResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
