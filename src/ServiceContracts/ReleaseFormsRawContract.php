<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\ReleaseForms\ReleaseFormCreateInvitationLinkParams;
use Onlyfansapi\ReleaseForms\ReleaseFormCreateReleaseFormParams;
use Onlyfansapi\ReleaseForms\ReleaseFormListTaggableUsersParams;
use Onlyfansapi\ReleaseForms\ReleaseFormListTaggableUsersResponse;
use Onlyfansapi\ReleaseForms\ReleaseFormNewInvitationLinkResponse;
use Onlyfansapi\ReleaseForms\ReleaseFormNewReleaseFormResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
