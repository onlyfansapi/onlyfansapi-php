<?php

declare(strict_types=1);

namespace Onlyfansapi\Queue\QueueCountResponse\Data\List_;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type _2025_01_02Shape = array{chat?: int|null, post?: int|null}
 */
final class _2025_01_02 implements BaseModel
{
    /** @use SdkModel<_2025_01_02Shape> */
    use SdkModel;

    #[Optional]
    public ?int $chat;

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
    public static function with(?int $chat = null, ?int $post = null): self
    {
        $self = new self;

        null !== $chat && $self['chat'] = $chat;
        null !== $post && $self['post'] = $post;

        return $self;
    }

    public function withChat(int $chat): self
    {
        $self = clone $this;
        $self['chat'] = $chat;

        return $self;
    }

    public function withPost(int $post): self
    {
        $self = clone $this;
        $self['post'] = $post;

        return $self;
    }
}
