<?php

declare(strict_types=1);

namespace OnlyFansAPI\Authenticate\AuthenticateStartParams;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Custom proxy configuration. Cannot be used together with proxyCountry.
 *
 * @phpstan-type CustomProxyShape = array{
 *   host?: string|null,
 *   password?: string|null,
 *   port?: int|null,
 *   username?: string|null,
 * }
 */
final class CustomProxy implements BaseModel
{
    /** @use SdkModel<CustomProxyShape> */
    use SdkModel;

    /**
     * The hostname or IP address of your custom proxy server.
     */
    #[Optional]
    public ?string $host;

    /**
     * The password for proxy authentication (optional).
     */
    #[Optional]
    public ?string $password;

    /**
     * The port number of your custom proxy server (1-65535).
     */
    #[Optional]
    public ?int $port;

    /**
     * The username for proxy authentication (optional).
     */
    #[Optional]
    public ?string $username;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $host = null,
        ?string $password = null,
        ?int $port = null,
        ?string $username = null,
    ): self {
        $self = new self;

        null !== $host && $self['host'] = $host;
        null !== $password && $self['password'] = $password;
        null !== $port && $self['port'] = $port;
        null !== $username && $self['username'] = $username;

        return $self;
    }

    /**
     * The hostname or IP address of your custom proxy server.
     */
    public function withHost(string $host): self
    {
        $self = clone $this;
        $self['host'] = $host;

        return $self;
    }

    /**
     * The password for proxy authentication (optional).
     */
    public function withPassword(string $password): self
    {
        $self = clone $this;
        $self['password'] = $password;

        return $self;
    }

    /**
     * The port number of your custom proxy server (1-65535).
     */
    public function withPort(int $port): self
    {
        $self = clone $this;
        $self['port'] = $port;

        return $self;
    }

    /**
     * The username for proxy authentication (optional).
     */
    public function withUsername(string $username): self
    {
        $self = clone $this;
        $self['username'] = $username;

        return $self;
    }
}
