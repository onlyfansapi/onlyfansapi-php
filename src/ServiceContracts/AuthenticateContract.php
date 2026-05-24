<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Authenticate\AuthenticatePollStatusResponse;
use Onlyfansapi\Authenticate\AuthenticateReauthenticateResponse;
use Onlyfansapi\Authenticate\AuthenticateStartParams\AuthType;
use Onlyfansapi\Authenticate\AuthenticateStartParams\CustomProxy;
use Onlyfansapi\Authenticate\AuthenticateStartParams\ProxyCountry;
use Onlyfansapi\Authenticate\AuthenticateStartResponse\UnionMember0;
use Onlyfansapi\Authenticate\AuthenticateStartResponse\UnionMember1;
use Onlyfansapi\Authenticate\AuthenticateSubmit2faResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type CustomProxyShape from \Onlyfansapi\Authenticate\AuthenticateStartParams\CustomProxy
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface AuthenticateContract
{
    /**
     * @api
     *
     * @param string $attemptID The attempt ID of the authentication process
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function pollStatus(
        string $attemptID,
        RequestOptions|array|null $requestOptions = null
    ): AuthenticatePollStatusResponse;

    /**
     * @api
     *
     * @param string $accountID The Account ID of the authentication process
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function reauthenticate(
        string $accountID,
        RequestOptions|array|null $requestOptions = null
    ): AuthenticateReauthenticateResponse;

    /**
     * @api
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
    ): UnionMember0|UnionMember1;

    /**
     * @api
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
    ): AuthenticateSubmit2faResponse;
}
