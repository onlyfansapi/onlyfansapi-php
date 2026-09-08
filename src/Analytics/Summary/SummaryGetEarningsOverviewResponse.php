<?php

declare(strict_types=1);

namespace OnlyFansAPI\Analytics\Summary;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type SummaryGetEarningsOverviewResponseShape = array{
 *   messages?: float|null,
 *   posts?: float|null,
 *   streams?: float|null,
 *   subscriptions?: float|null,
 *   tips?: float|null,
 *   totalAccounts?: int|null,
 *   totalEarnings?: float|null,
 *   totalImages?: int|null,
 *   totalMessages?: int|null,
 *   totalVideos?: int|null,
 * }
 */
final class SummaryGetEarningsOverviewResponse implements BaseModel
{
    /** @use SdkModel<SummaryGetEarningsOverviewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?float $messages;

    #[Optional]
    public ?float $posts;

    #[Optional]
    public ?float $streams;

    #[Optional]
    public ?float $subscriptions;

    #[Optional]
    public ?float $tips;

    #[Optional('total_accounts')]
    public ?int $totalAccounts;

    #[Optional('total_earnings')]
    public ?float $totalEarnings;

    #[Optional('total_images')]
    public ?int $totalImages;

    #[Optional('total_messages')]
    public ?int $totalMessages;

    #[Optional('total_videos')]
    public ?int $totalVideos;

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
        ?float $posts = null,
        ?float $streams = null,
        ?float $subscriptions = null,
        ?float $tips = null,
        ?int $totalAccounts = null,
        ?float $totalEarnings = null,
        ?int $totalImages = null,
        ?int $totalMessages = null,
        ?int $totalVideos = null,
    ): self {
        $self = new self;

        null !== $messages && $self['messages'] = $messages;
        null !== $posts && $self['posts'] = $posts;
        null !== $streams && $self['streams'] = $streams;
        null !== $subscriptions && $self['subscriptions'] = $subscriptions;
        null !== $tips && $self['tips'] = $tips;
        null !== $totalAccounts && $self['totalAccounts'] = $totalAccounts;
        null !== $totalEarnings && $self['totalEarnings'] = $totalEarnings;
        null !== $totalImages && $self['totalImages'] = $totalImages;
        null !== $totalMessages && $self['totalMessages'] = $totalMessages;
        null !== $totalVideos && $self['totalVideos'] = $totalVideos;

        return $self;
    }

    public function withMessages(float $messages): self
    {
        $self = clone $this;
        $self['messages'] = $messages;

        return $self;
    }

    public function withPosts(float $posts): self
    {
        $self = clone $this;
        $self['posts'] = $posts;

        return $self;
    }

    public function withStreams(float $streams): self
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

    public function withTips(float $tips): self
    {
        $self = clone $this;
        $self['tips'] = $tips;

        return $self;
    }

    public function withTotalAccounts(int $totalAccounts): self
    {
        $self = clone $this;
        $self['totalAccounts'] = $totalAccounts;

        return $self;
    }

    public function withTotalEarnings(float $totalEarnings): self
    {
        $self = clone $this;
        $self['totalEarnings'] = $totalEarnings;

        return $self;
    }

    public function withTotalImages(int $totalImages): self
    {
        $self = clone $this;
        $self['totalImages'] = $totalImages;

        return $self;
    }

    public function withTotalMessages(int $totalMessages): self
    {
        $self = clone $this;
        $self['totalMessages'] = $totalMessages;

        return $self;
    }

    public function withTotalVideos(int $totalVideos): self
    {
        $self = clone $this;
        $self['totalVideos'] = $totalVideos;

        return $self;
    }
}
