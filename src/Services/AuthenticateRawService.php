<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Authenticate\AuthenticatePollStatusResponse;
use Onlyfansapi\Authenticate\AuthenticateStartParams;
use Onlyfansapi\Authenticate\AuthenticateStartParams\ProxyCountry;
use Onlyfansapi\Authenticate\AuthenticateStartResponse;
use Onlyfansapi\Authenticate\AuthenticateSubmit2faParams;
use Onlyfansapi\Authenticate\AuthenticateSubmit2faResponse;
use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\AuthenticateRawContract;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class AuthenticateRawService implements AuthenticateRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Poll the status of the authentication process. Eg. if 2FA is required, we will ask you for the code using the `twoFactorPending = true` in the response body.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/authenticate/%1$s', $attemptID],
            options: $requestOptions,
            convert: AuthenticatePollStatusResponse::class,
        );
    }

    /**
     * @api
     *
     * Trigger account reauthentication without the need to submit email & password again.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/authenticate/%1$s/reauthenticate', $accountID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Start the authentication process for a new account. Our systems will bypass Captcha and also ask you for 2FA code if required. All credentials are stored securely using bcrypt and only used during login.
     *
     * @param array{
     *   email: string,
     *   password: string,
     *   proxyCountry: ProxyCountry|value-of<ProxyCountry>,
     * }|AuthenticateStartParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AuthenticateStartResponse>
     *
     * @throws APIException
     */
    public function start(
        array|AuthenticateStartParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AuthenticateStartParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/authenticate',
            body: (object) $parsed,
            options: $options,
            convert: AuthenticateStartResponse::class,
        );
    }

    /**
     * @api
     *
     * Submit the 2FA code for the authentication process.
     *
     * @param string $attemptID The attempt ID of the authentication process
     * @param array{code: string}|AuthenticateSubmit2faParams $params
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
    ): BaseResponse {
        [$parsed, $options] = AuthenticateSubmit2faParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['api/authenticate/%1$s', $attemptID],
            body: (object) $parsed,
            options: $options,
            convert: AuthenticateSubmit2faResponse::class,
        );
    }
}
