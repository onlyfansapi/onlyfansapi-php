<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Authenticate\AuthenticatePollStatusResponse;
use Onlyfansapi\Authenticate\AuthenticateReauthenticateResponse;
use Onlyfansapi\Authenticate\AuthenticateStartParams\AuthType;
use Onlyfansapi\Authenticate\AuthenticateStartParams\CustomProxy;
use Onlyfansapi\Authenticate\AuthenticateStartParams\ProxyCountry;
use Onlyfansapi\Authenticate\AuthenticateStartResponse\UnionMember0;
use Onlyfansapi\Authenticate\AuthenticateStartResponse\UnionMember1;
use Onlyfansapi\Authenticate\AuthenticateSubmit2faResponse;
use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\AuthenticateContract;

/**
 * @phpstan-import-type CustomProxyShape from \Onlyfansapi\Authenticate\AuthenticateStartParams\CustomProxy
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class AuthenticateService implements AuthenticateContract
{
    /**
     * @api
     */
    public AuthenticateRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AuthenticateRawService($client);
    }

    /**
     * @api
     *
     * Poll the status of the authentication process. Eg. if 2FA is required, we will ask you for the code using the `twoFactorPending = true` in the response body. For `mobile_app` auth, the response includes `mobile_auth_session_deeplink` while the session is pending.
     *
     * @param string $attemptID The attempt ID of the authentication process
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function pollStatus(
        string $attemptID,
        RequestOptions|array|null $requestOptions = null
    ): AuthenticatePollStatusResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->pollStatus($attemptID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Trigger account reauthentication without the need to submit email & password again.
     *
     * @param string $accountID The Account ID of the authentication process
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function reauthenticate(
        string $accountID,
        RequestOptions|array|null $requestOptions = null
    ): AuthenticateReauthenticateResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->reauthenticate($accountID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Start the authentication process for a new account. Supports three methods: email/password (default), cookies & headers (raw_data), or FansAPI Auth+ mobile app (mobile_app). For email/password, our systems will bypass Captcha and ask you for 2FA if required. For raw_data, provide session cookies directly for instant authentication. For mobile_app, the response includes a `mobile_auth_session_deeplink` that the creator opens on their phone (or scans as a QR code) to complete authentication via the FansAPI Auth+ mobile app. All credentials are stored securely and encrypted at rest.
     *
     * @param string $authID The auth_id from OnlyFans session cookies. Required when auth_type is `raw_data`.
     * @param AuthType|value-of<AuthType> $authType The authentication method to use. Defaults to `email_password` if omitted. Use `mobile_app` to authenticate via the FansAPI Auth+ mobile app (no credential fields required).
     * @param string $cookies The full cookie string (semicolon-separated). Required when auth_type is `raw_data`.
     * @param CustomProxy|CustomProxyShape $customProxy Custom proxy configuration. Cannot be used together with proxyCountry.
     * @param string $email The email address of the OnlyFans account. Required when auth_type is `email_password`.
     * @param bool $forceConnect Set to true to connect the account even if it already exists
     * @param string $name A display name for the account. If omitted, defaults to the email address or auth_id.
     * @param string $password The password of the OnlyFans account. Required when auth_type is `email_password`.
     * @param ProxyCountry|value-of<ProxyCountry> $proxyCountry The country of the managed proxy server you want to use. Eg. "us" for United States. Cannot be used together with customProxy.
     * @param string $userAgent The browser User-Agent string. Required when auth_type is `raw_data`.
     * @param string $xbc The X-BC token from request headers. Required when auth_type is `raw_data`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function start(
        ?string $authID = null,
        AuthType|string|null $authType = null,
        ?string $cookies = null,
        CustomProxy|array|null $customProxy = null,
        ?string $email = null,
        ?bool $forceConnect = null,
        ?string $name = null,
        ?string $password = null,
        ProxyCountry|string|null $proxyCountry = null,
        ?string $userAgent = null,
        ?string $xbc = null,
        RequestOptions|array|null $requestOptions = null,
    ): UnionMember0|UnionMember1 {
        $params = Util::removeNulls(
            [
                'authID' => $authID,
                'authType' => $authType,
                'cookies' => $cookies,
                'customProxy' => $customProxy,
                'email' => $email,
                'forceConnect' => $forceConnect,
                'name' => $name,
                'password' => $password,
                'proxyCountry' => $proxyCountry,
                'userAgent' => $userAgent,
                'xbc' => $xbc,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->start(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Submit the 2FA code, or Selfie Verification status, for the authentication process.
     *
     * @param string $attemptID The attempt ID of the authentication process
     * @param string $code The 2FA code you received on your phone. Must be empty if `selfie_verification_completed` is `true`.
     * @param bool $selfieVerificationCompleted this field is required when <code>code</code> is not present
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function submit2fa(
        string $attemptID,
        ?string $code = null,
        ?bool $selfieVerificationCompleted = null,
        RequestOptions|array|null $requestOptions = null,
    ): AuthenticateSubmit2faResponse {
        $params = Util::removeNulls(
            [
                'code' => $code,
                'selfieVerificationCompleted' => $selfieVerificationCompleted,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->submit2fa($attemptID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
