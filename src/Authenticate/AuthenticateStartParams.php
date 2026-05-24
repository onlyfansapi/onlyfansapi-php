<?php

declare(strict_types=1);

namespace Onlyfansapi\Authenticate;

use Onlyfansapi\Authenticate\AuthenticateStartParams\AuthType;
use Onlyfansapi\Authenticate\AuthenticateStartParams\CustomProxy;
use Onlyfansapi\Authenticate\AuthenticateStartParams\ProxyCountry;
use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Start the authentication process for a new account. Supports three methods: email/password (default), cookies & headers (raw_data), or FansAPI Auth+ mobile app (mobile_app). For email/password, our systems will bypass Captcha and ask you for 2FA if required. For raw_data, provide session cookies directly for instant authentication. For mobile_app, the response includes a `mobile_auth_session_deeplink` that the creator opens on their phone (or scans as a QR code) to complete authentication via the FansAPI Auth+ mobile app. All credentials are stored securely and encrypted at rest.
 *
 * @see Onlyfansapi\Services\AuthenticateService::start()
 *
 * @phpstan-import-type CustomProxyShape from \Onlyfansapi\Authenticate\AuthenticateStartParams\CustomProxy
 *
 * @phpstan-type AuthenticateStartParamsShape = array{
 *   authID?: string|null,
 *   authType?: null|AuthType|value-of<AuthType>,
 *   cookies?: string|null,
 *   customProxy?: null|CustomProxy|CustomProxyShape,
 *   email?: string|null,
 *   forceConnect?: bool|null,
 *   name?: string|null,
 *   password?: string|null,
 *   proxyCountry?: null|ProxyCountry|value-of<ProxyCountry>,
 *   userAgent?: string|null,
 *   xbc?: string|null,
 * }
 */
final class AuthenticateStartParams implements BaseModel
{
    /** @use SdkModel<AuthenticateStartParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The auth_id from OnlyFans session cookies. Required when auth_type is `raw_data`.
     */
    #[Optional('auth_id')]
    public ?string $authID;

    /**
     * The authentication method to use. Defaults to `email_password` if omitted. Use `mobile_app` to authenticate via the FansAPI Auth+ mobile app (no credential fields required).
     *
     * @var value-of<AuthType>|null $authType
     */
    #[Optional('auth_type', enum: AuthType::class)]
    public ?string $authType;

    /**
     * The full cookie string (semicolon-separated). Required when auth_type is `raw_data`.
     */
    #[Optional]
    public ?string $cookies;

    /**
     * Custom proxy configuration. Cannot be used together with proxyCountry.
     */
    #[Optional]
    public ?CustomProxy $customProxy;

    /**
     * The email address of the OnlyFans account. Required when auth_type is `email_password`.
     */
    #[Optional]
    public ?string $email;

    /**
     * Set to true to connect the account even if it already exists.
     */
    #[Optional('force_connect')]
    public ?bool $forceConnect;

    /**
     * A display name for the account. If omitted, defaults to the email address or auth_id.
     */
    #[Optional]
    public ?string $name;

    /**
     * The password of the OnlyFans account. Required when auth_type is `email_password`.
     */
    #[Optional]
    public ?string $password;

    /**
     * The country of the managed proxy server you want to use. Eg. "us" for United States. Cannot be used together with customProxy.
     *
     * @var value-of<ProxyCountry>|null $proxyCountry
     */
    #[Optional(enum: ProxyCountry::class)]
    public ?string $proxyCountry;

    /**
     * The browser User-Agent string. Required when auth_type is `raw_data`.
     */
    #[Optional('user_agent')]
    public ?string $userAgent;

    /**
     * The X-BC token from request headers. Required when auth_type is `raw_data`.
     */
    #[Optional]
    public ?string $xbc;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AuthType|value-of<AuthType>|null $authType
     * @param CustomProxy|CustomProxyShape|null $customProxy
     * @param ProxyCountry|value-of<ProxyCountry>|null $proxyCountry
     */
    public static function with(
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
    ): self {
        $self = new self;

        null !== $authID && $self['authID'] = $authID;
        null !== $authType && $self['authType'] = $authType;
        null !== $cookies && $self['cookies'] = $cookies;
        null !== $customProxy && $self['customProxy'] = $customProxy;
        null !== $email && $self['email'] = $email;
        null !== $forceConnect && $self['forceConnect'] = $forceConnect;
        null !== $name && $self['name'] = $name;
        null !== $password && $self['password'] = $password;
        null !== $proxyCountry && $self['proxyCountry'] = $proxyCountry;
        null !== $userAgent && $self['userAgent'] = $userAgent;
        null !== $xbc && $self['xbc'] = $xbc;

        return $self;
    }

    /**
     * The auth_id from OnlyFans session cookies. Required when auth_type is `raw_data`.
     */
    public function withAuthID(string $authID): self
    {
        $self = clone $this;
        $self['authID'] = $authID;

        return $self;
    }

    /**
     * The authentication method to use. Defaults to `email_password` if omitted. Use `mobile_app` to authenticate via the FansAPI Auth+ mobile app (no credential fields required).
     *
     * @param AuthType|value-of<AuthType> $authType
     */
    public function withAuthType(AuthType|string $authType): self
    {
        $self = clone $this;
        $self['authType'] = $authType;

        return $self;
    }

    /**
     * The full cookie string (semicolon-separated). Required when auth_type is `raw_data`.
     */
    public function withCookies(string $cookies): self
    {
        $self = clone $this;
        $self['cookies'] = $cookies;

        return $self;
    }

    /**
     * Custom proxy configuration. Cannot be used together with proxyCountry.
     *
     * @param CustomProxy|CustomProxyShape $customProxy
     */
    public function withCustomProxy(CustomProxy|array $customProxy): self
    {
        $self = clone $this;
        $self['customProxy'] = $customProxy;

        return $self;
    }

    /**
     * The email address of the OnlyFans account. Required when auth_type is `email_password`.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * Set to true to connect the account even if it already exists.
     */
    public function withForceConnect(bool $forceConnect): self
    {
        $self = clone $this;
        $self['forceConnect'] = $forceConnect;

        return $self;
    }

    /**
     * A display name for the account. If omitted, defaults to the email address or auth_id.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The password of the OnlyFans account. Required when auth_type is `email_password`.
     */
    public function withPassword(string $password): self
    {
        $self = clone $this;
        $self['password'] = $password;

        return $self;
    }

    /**
     * The country of the managed proxy server you want to use. Eg. "us" for United States. Cannot be used together with customProxy.
     *
     * @param ProxyCountry|value-of<ProxyCountry> $proxyCountry
     */
    public function withProxyCountry(ProxyCountry|string $proxyCountry): self
    {
        $self = clone $this;
        $self['proxyCountry'] = $proxyCountry;

        return $self;
    }

    /**
     * The browser User-Agent string. Required when auth_type is `raw_data`.
     */
    public function withUserAgent(string $userAgent): self
    {
        $self = clone $this;
        $self['userAgent'] = $userAgent;

        return $self;
    }

    /**
     * The X-BC token from request headers. Required when auth_type is `raw_data`.
     */
    public function withXbc(string $xbc): self
    {
        $self = clone $this;
        $self['xbc'] = $xbc;

        return $self;
    }
}
