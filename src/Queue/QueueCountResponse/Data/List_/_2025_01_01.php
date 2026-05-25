<?php

declare(strict_types=1);

namespace OnlyFansAPI\Queue\QueueCountResponse\Data\List_;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type _2025_01_01Shape = array{post?: int|null}
 */
final class _2025_01_01 implements BaseModel
{
    /** @use SdkModel<_2025_01_01Shape> */
    use SdkModel;

    #[Optional]
    public ?int $post;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $post = null): self
    {
        $self = new self;

        null !== $post && $self['post'] = $post;

        return $self;
    }

    public function withPost(int $post): self
    {
        $self = clone $this;
        $self['post'] = $post;

        return $self;
    }
}
