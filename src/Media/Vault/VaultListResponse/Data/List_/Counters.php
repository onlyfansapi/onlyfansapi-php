<?php

declare(strict_types=1);

namespace Onlyfansapi\Media\Vault\VaultListResponse\Data\List_;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type CountersShape = array{likesCount?: int|null, tipsSumm?: int|null}
 */
final class Counters implements BaseModel
{
    /** @use SdkModel<CountersShape> */
    use SdkModel;

    #[Optional]
    public ?int $likesCount;

    #[Optional]
    public ?int $tipsSumm;

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
        ?int $likesCount = null,
        ?int $tipsSumm = null
    ): self {
        $self = new self;

        null !== $likesCount && $self['likesCount'] = $likesCount;
        null !== $tipsSumm && $self['tipsSumm'] = $tipsSumm;

        return $self;
    }

    public function withLikesCount(int $likesCount): self
    {
        $self = clone $this;
        $self['likesCount'] = $likesCount;

        return $self;
    }

    public function withTipsSumm(int $tipsSumm): self
    {
        $self = clone $this;
        $self['tipsSumm'] = $tipsSumm;

        return $self;
    }
}
