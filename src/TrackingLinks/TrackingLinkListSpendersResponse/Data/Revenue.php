<?php

declare(strict_types=1);

namespace Onlyfansapi\TrackingLinks\TrackingLinkListSpendersResponse\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type RevenueShape = array{
 *   messages?: float|null,
 *   posts?: int|null,
 *   streams?: int|null,
 *   subscriptions?: float|null,
 *   tips?: int|null,
 *   total?: float|null,
 * }
 */
final class Revenue implements BaseModel
{
    /** @use SdkModel<RevenueShape> */
    use SdkModel;

    #[Optional]
    public ?float $messages;

    #[Optional]
    public ?int $posts;

    #[Optional]
    public ?int $streams;

    #[Optional]
    public ?float $subscriptions;

    #[Optional]
    public ?int $tips;

    #[Optional]
    public ?float $total;

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
        ?float $messages = null,
        ?int $posts = null,
        ?int $streams = null,
        ?float $subscriptions = null,
        ?int $tips = null,
        ?float $total = null,
    ): self {
        $self = new self;

        null !== $messages && $self['messages'] = $messages;
        null !== $posts && $self['posts'] = $posts;
        null !== $streams && $self['streams'] = $streams;
        null !== $subscriptions && $self['subscriptions'] = $subscriptions;
        null !== $tips && $self['tips'] = $tips;
        null !== $total && $self['total'] = $total;

        return $self;
    }

    public function withMessages(float $messages): self
    {
        $self = clone $this;
        $self['messages'] = $messages;

        return $self;
    }

    public function withPosts(int $posts): self
    {
        $self = clone $this;
        $self['posts'] = $posts;

        return $self;
    }

    public function withStreams(int $streams): self
    {
        $self = clone $this;
        $self['streams'] = $streams;

        return $self;
    }

    public function withSubscriptions(float $subscriptions): self
    {
        $self = clone $this;
        $self['subscriptions'] = $subscriptions;

        return $self;
    }

    public function withTips(int $tips): self
    {
        $self = clone $this;
        $self['tips'] = $tips;

        return $self;
    }

    public function withTotal(float $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }
}
