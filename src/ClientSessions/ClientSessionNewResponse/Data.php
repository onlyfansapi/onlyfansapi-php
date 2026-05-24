<?php

declare(strict_types=1);

namespace Onlyfansapi\ClientSessions\ClientSessionNewResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   token?: string|null,
 *   clientReferenceID?: string|null,
 *   displayName?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $token;

    #[Optional('client_reference_id')]
    public ?string $clientReferenceID;

    #[Optional('display_name')]
    public ?string $displayName;

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
        ?string $token = null,
        ?string $clientReferenceID = null,
        ?string $displayName = null,
    ): self {
        $self = new self;

        null !== $token && $self['token'] = $token;
        null !== $clientReferenceID && $self['clientReferenceID'] = $clientReferenceID;
        null !== $displayName && $self['displayName'] = $displayName;

        return $self;
    }

    public function withToken(string $token): self
    {
        $self = clone $this;
        $self['token'] = $token;

        return $self;
    }

    public function withClientReferenceID(string $clientReferenceID): self
    {
        $self = clone $this;
        $self['clientReferenceID'] = $clientReferenceID;

        return $self;
    }

    public function withDisplayName(string $displayName): self
    {
        $self = clone $this;
        $self['displayName'] = $displayName;

        return $self;
    }
}
