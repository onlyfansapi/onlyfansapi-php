<?php

declare(strict_types=1);

namespace OnlyFansAPI\DataExports\DataExportListResponse\Data\Data;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type AccountShape = array{id?: string|null, displayName?: string|null}
 */
final class Account implements BaseModel
{
    /** @use SdkModel<AccountShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

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
        ?string $id = null,
        ?string $displayName = null
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $displayName && $self['displayName'] = $displayName;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withDisplayName(string $displayName): self
    {
        $self = clone $this;
        $self['displayName'] = $displayName;

        return $self;
    }
}
