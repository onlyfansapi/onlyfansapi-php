<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Authenticate\AuthenticatePollStatusResponse;
use Onlyfansapi\Authenticate\AuthenticateReauthenticateResponse;
use Onlyfansapi\Authenticate\AuthenticateSend2faEmailResponse;
use Onlyfansapi\Authenticate\AuthenticateStartParams;
use Onlyfansapi\Authenticate\AuthenticateStartParams\AuthType;
use Onlyfansapi\Authenticate\AuthenticateStartParams\CustomProxy;
use Onlyfansapi\Authenticate\AuthenticateStartParams\ProxyCountry;
use Onlyfansapi\Authenticate\AuthenticateStartResponse;
use Onlyfansapi\Authenticate\AuthenticateStartResponse\UnionMember0;
use Onlyfansapi\Authenticate\AuthenticateStartResponse\UnionMember1;
use Onlyfansapi\Authenticate\AuthenticateSubmit2faParams;
use Onlyfansapi\Authenticate\AuthenticateSubmit2faResponse;
use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\AuthenticateRawContract;

/**
 * @phpstan-import-type CustomProxyShape from \Onlyfansapi\Authenticate\AuthenticateStartParams\CustomProxy
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
     * Poll the status of the authentication process. Eg. if 2FA is required, we will ask you for the code using the `twoFactorPending = true` in the response body. For `mobile_app` auth, the response includes `mobile_auth_session_deeplink` while the session is pending.
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
     * @return BaseResponse<AuthenticateReauthenticateResponse>
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
            convert: AuthenticateReauthenticateResponse::class,
        );
    }

    /**
     * @api
     *
     * Send 2FA verification e-mail to the creator's email so they can verify login on their device without your input. The e-mail will be sent to the e-mail address used for signing into OnlyFans.
     *
     * @param string $attemptID The attempt ID of the authentication process
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AuthenticateSend2faEmailResponse>
     *
     * @throws APIException
     */
    public function send2faEmail(
        string $attemptID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/authenticate/%1$s/send-email-to-creator', $attemptID],
            options: $requestOptions,
            convert: AuthenticateSend2faEmailResponse::class,
        );
    }

    /**
     * @api
     *
     * Start the authentication process for a new account. Supports three methods: email/password (default), cookies & headers (raw_data), or FansAPI Auth+ mobile app (mobile_app). For email/password, our systems will bypass Captcha and ask you for 2FA if required. For raw_data, provide session cookies directly for instant authentication. For mobile_app, the response includes a `mobile_auth_session_deeplink` that the creator opens on their phone (or scans as a QR code) to complete authentication via the FansAPI Auth+ mobile app. All credentials are stored securely and encrypted at rest.
     *
     * @param array{
     *   authID?: string,
     *   authType?: AuthType|value-of<AuthType>,
     *   cookies?: string,
     *   customProxy?: CustomProxy|CustomProxyShape,
     *   email?: string,
     *   forceConnect?: bool,
     *   name?: string,
     *   password?: string,
     *   proxyCountry?: ProxyCountry|value-of<ProxyCountry>,
     *   userAgent?: string,
     *   xbc?: string,
     * }|AuthenticateStartParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UnionMember0|UnionMember1>
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
     * Submit the 2FA code, or Selfie Verification status, for the authentication process.
     *
     * @param string $attemptID The attempt ID of the authentication process
     * @param array{
     *   code?: string, selfieVerificationCompleted?: mixed
     * }|AuthenticateSubmit2faParams $params
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
