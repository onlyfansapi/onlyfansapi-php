<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Authenticate\AuthenticatePollStatusResponse;
use Onlyfansapi\Authenticate\AuthenticateStartParams;
use Onlyfansapi\Authenticate\AuthenticateStartResponse;
use Onlyfansapi\Authenticate\AuthenticateSubmit2faParams;
use Onlyfansapi\Authenticate\AuthenticateSubmit2faResponse;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface AuthenticateRawContract
{
    /**
     * @api
     *
     * @param string $attemptID The attempt ID of the authentication process
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AuthenticatePollStatusResponse>
     *
     * @throws APIException
     */
    public function pollStatus(
        string $attemptID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $accountID The Account ID of the authentication process
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function reauthenticate(
        string $accountID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AuthenticateStartParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AuthenticateStartResponse>
     *
     * @throws APIException
     */
    public function start(
        array|AuthenticateStartParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $attemptID The attempt ID of the authentication process
     * @param array<string,mixed>|AuthenticateSubmit2faParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AuthenticateSubmit2faResponse>
     *
     * @throws APIException
     */
    public function submit2fa(
        string $attemptID,
        array|AuthenticateSubmit2faParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
