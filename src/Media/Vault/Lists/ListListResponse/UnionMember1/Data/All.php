<?php

declare(strict_types=1);

namespace OnlyFansAPI\Media\Vault\Lists\ListListResponse\UnionMember1\Data;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type AllShape = array{mediaCount?: int|null}
 */
final class All implements BaseModel
{
    /** @use SdkModel<AllShape> */
    use SdkModel;

    #[Optional]
    public ?int $mediaCount;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $mediaCount = null): self
    {
        $self = new self;

        null !== $mediaCount && $self['mediaCount'] = $mediaCount;

        return $self;
    }

    public function withMediaCount(int $mediaCount): self
    {
        $self = clone $this;
        $self['mediaCount'] = $mediaCount;

        return $self;
    }
}
