<?php

declare(strict_types=1);

namespace OnlyFansAPI\Whoami\WhoamiGetResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIKeyShape = array{
 *   createdAt?: string|null, lastUsedAt?: string|null, name?: string|null
 * }
 */
final class APIKey implements BaseModel
{
    /** @use SdkModel<APIKeyShape> */
    use SdkModel;

    #[Optional('created_at')]
    public ?string $createdAt;

    #[Optional('last_used_at')]
    public ?string $lastUsedAt;

    #[Optional]
    public ?string $name;

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
        ?string $createdAt = null,
        ?string $lastUsedAt = null,
        ?string $name = null
    ): self {
        $self = new self;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $lastUsedAt && $self['lastUsedAt'] = $lastUsedAt;
        null !== $name && $self['name'] = $name;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withLastUsedAt(string $lastUsedAt): self
    {
        $self = clone $this;
        $self['lastUsedAt'] = $lastUsedAt;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
