<?php

declare(strict_types=1);

namespace Onlyfansapi\ClientSessions;

use Onlyfansapi\ClientSessions\ClientSessionCreateParams\ProxyCountry;
use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Create Client Session Token for later use in embedded auth components - eg. via @onlyfansapi/auth npm package.
 *
 * @see Onlyfansapi\Services\ClientSessionsService::create()
 *
 * @phpstan-type ClientSessionCreateParamsShape = array{
 *   displayName: string,
 *   clientReferenceID?: string|null,
 *   proxyCountry?: null|ProxyCountry|value-of<ProxyCountry>,
 * }
 */
final class ClientSessionCreateParams implements BaseModel
{
    /** @use SdkModel<ClientSessionCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Display Name of the account visible in your OnlyFansAPI Console Dashboard.
     */
    #[Required('display_name')]
    public string $displayName;

    /**
     * Your Internal Reference ID for the connected account.
     */
    #[Optional('client_reference_id')]
    public ?string $clientReferenceID;

    /** @var value-of<ProxyCountry>|null $proxyCountry */
    #[Optional('proxy_country', enum: ProxyCountry::class, nullable: true)]
    public ?string $proxyCountry;

    /**
     * `new ClientSessionCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ClientSessionCreateParams::with(displayName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ClientSessionCreateParams)->withDisplayName(...)
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
     * @param ProxyCountry|value-of<ProxyCountry>|null $proxyCountry
     */
    public static function with(
        string $displayName,
        ?string $clientReferenceID = null,
        ProxyCountry|string|null $proxyCountry = null,
    ): self {
        $self = new self;

        $self['displayName'] = $displayName;

        null !== $clientReferenceID && $self['clientReferenceID'] = $clientReferenceID;
        null !== $proxyCountry && $self['proxyCountry'] = $proxyCountry;

        return $self;
    }

    /**
     * Display Name of the account visible in your OnlyFansAPI Console Dashboard.
     */
    public function withDisplayName(string $displayName): self
    {
        $self = clone $this;
        $self['displayName'] = $displayName;

        return $self;
    }

    /**
     * Your Internal Reference ID for the connected account.
     */
    public function withClientReferenceID(string $clientReferenceID): self
    {
        $self = clone $this;
        $self['clientReferenceID'] = $clientReferenceID;

        return $self;
    }

    /**
     * @param ProxyCountry|value-of<ProxyCountry>|null $proxyCountry
     */
    public function withProxyCountry(
        ProxyCountry|string|null $proxyCountry
    ): self {
        $self = clone $this;
        $self['proxyCountry'] = $proxyCountry;

        return $self;
    }
}
