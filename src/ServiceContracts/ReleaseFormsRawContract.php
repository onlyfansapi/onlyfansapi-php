<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\ReleaseForms\ReleaseFormCreateInvitationLinkParams;
use OnlyFansAPI\ReleaseForms\ReleaseFormCreateReleaseFormParams;
use OnlyFansAPI\ReleaseForms\ReleaseFormListTaggableUsersParams;
use OnlyFansAPI\ReleaseForms\ReleaseFormListTaggableUsersResponse;
use OnlyFansAPI\ReleaseForms\ReleaseFormNewInvitationLinkResponse;
use OnlyFansAPI\ReleaseForms\ReleaseFormNewReleaseFormResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface ReleaseFormsRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|ReleaseFormCreateInvitationLinkParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReleaseFormNewInvitationLinkResponse>
     *
     * @throws APIException
     */
    public function createInvitationLink(
        string $account,
        array|ReleaseFormCreateInvitationLinkParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|ReleaseFormCreateReleaseFormParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReleaseFormNewReleaseFormResponse>
     *
     * @throws APIException
     */
    public function createReleaseForm(
        string $account,
        array|ReleaseFormCreateReleaseFormParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|ReleaseFormListTaggableUsersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReleaseFormListTaggableUsersResponse>
     *
     * @throws APIException
     */
    public function listTaggableUsers(
        string $account,
        array|ReleaseFormListTaggableUsersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
