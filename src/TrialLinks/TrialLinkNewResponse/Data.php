<?php

declare(strict_types=1);

namespace OnlyFansAPI\TrialLinks\TrialLinkNewResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: int|null,
 *   claimCounts?: int|null,
 *   createdAt?: string|null,
 *   expiredAt?: string|null,
 *   isFinished?: bool|null,
 *   subscribeCounts?: int|null,
 *   subscribeDays?: int|null,
 *   trialLinkName?: string|null,
 *   url?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?int $claimCounts;

    #[Optional]
    public ?string $createdAt;

    #[Optional]
    public ?string $expiredAt;

    #[Optional]
    public ?bool $isFinished;

    #[Optional]
    public ?int $subscribeCounts;

    #[Optional]
    public ?int $subscribeDays;

    #[Optional]
    public ?string $trialLinkName;

    #[Optional]
    public ?string $url;

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
        ?int $id = null,
        ?int $claimCounts = null,
        ?string $createdAt = null,
        ?string $expiredAt = null,
        ?bool $isFinished = null,
        ?int $subscribeCounts = null,
        ?int $subscribeDays = null,
        ?string $trialLinkName = null,
        ?string $url = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $claimCounts && $self['claimCounts'] = $claimCounts;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $expiredAt && $self['expiredAt'] = $expiredAt;
        null !== $isFinished && $self['isFinished'] = $isFinished;
        null !== $subscribeCounts && $self['subscribeCounts'] = $subscribeCounts;
        null !== $subscribeDays && $self['subscribeDays'] = $subscribeDays;
        null !== $trialLinkName && $self['trialLinkName'] = $trialLinkName;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withClaimCounts(int $claimCounts): self
    {
        $self = clone $this;
        $self['claimCounts'] = $claimCounts;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withExpiredAt(string $expiredAt): self
    {
        $self = clone $this;
        $self['expiredAt'] = $expiredAt;

        return $self;
    }

    public function withIsFinished(bool $isFinished): self
    {
        $self = clone $this;
        $self['isFinished'] = $isFinished;

        return $self;
    }

    public function withSubscribeCounts(int $subscribeCounts): self
    {
        $self = clone $this;
        $self['subscribeCounts'] = $subscribeCounts;

        return $self;
    }

    public function withSubscribeDays(int $subscribeDays): self
    {
        $self = clone $this;
        $self['subscribeDays'] = $subscribeDays;

        return $self;
    }

    public function withTrialLinkName(string $trialLinkName): self
    {
        $self = clone $this;
        $self['trialLinkName'] = $trialLinkName;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
