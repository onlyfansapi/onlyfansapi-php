<?php

declare(strict_types=1);

namespace Onlyfansapi\Authenticate;

use Onlyfansapi\Authenticate\AuthenticateStartParams\ProxyCountry;
use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Start the authentication process for a new account. Our systems will bypass Captcha and also ask you for 2FA code if required. All credentials are stored securely using bcrypt and only used during login.
 *
 * @see Onlyfansapi\Services\AuthenticateService::start()
 *
 * @phpstan-type AuthenticateStartParamsShape = array{
 *   email: string,
 *   password: string,
 *   proxyCountry: ProxyCountry|value-of<ProxyCountry>,
 * }
 */
final class AuthenticateStartParams implements BaseModel
{
    /** @use SdkModel<AuthenticateStartParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The email address of the OnlyFans account.
     */
    #[Required]
    public string $email;

    /**
     * The password of the OnlyFans account.
     */
    #[Required]
    public string $password;

    /**
     * The country of the proxy server you want to use. Eg. "us" for United States.
     *
     * @var value-of<ProxyCountry> $proxyCountry
     */
    #[Required(enum: ProxyCountry::class)]
    public string $proxyCountry;

    /**
     * `new AuthenticateStartParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AuthenticateStartParams::with(email: ..., password: ..., proxyCountry: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AuthenticateStartParams)
     *   ->withEmail(...)
     *   ->withPassword(...)
     *   ->withProxyCountry(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ProxyCountry|value-of<ProxyCountry> $proxyCountry
     */
    public static function with(
        string $email,
        string $password,
        ProxyCountry|string $proxyCountry
    ): self {
        $self = new self;

        $self['email'] = $email;
        $self['password'] = $password;
        $self['proxyCountry'] = $proxyCountry;

        return $self;
    }

    /**
     * The email address of the OnlyFans account.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * The password of the OnlyFans account.
     */
    public function withPassword(string $password): self
    {
        $self = clone $this;
        $self['password'] = $password;

        return $self;
    }

    /**
     * The country of the proxy server you want to use. Eg. "us" for United States.
     *
     * @param ProxyCountry|value-of<ProxyCountry> $proxyCountry
     */
    public function withProxyCountry(ProxyCountry|string $proxyCountry): self
    {
        $self = clone $this;
        $self['proxyCountry'] = $proxyCountry;

        return $self;
    }
}
