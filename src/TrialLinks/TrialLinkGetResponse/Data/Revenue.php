<?php

declare(strict_types=1);

namespace OnlyFansAPI\TrialLinks\TrialLinkGetResponse\Data;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type RevenueShape = array{
 *   calculatedAt?: string|null,
 *   isLoading?: bool|null,
 *   revenuePerSubscriber?: float|null,
 *   spendersCount?: int|null,
 *   total?: float|null,
 * }
 */
final class Revenue implements BaseModel
{
    /** @use SdkModel<RevenueShape> */
    use SdkModel;

    #[Optional]
    public ?string $calculatedAt;

    #[Optional]
    public ?bool $isLoading;

    #[Optional]
    public ?float $revenuePerSubscriber;

    #[Optional]
    public ?int $spendersCount;

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
        ?string $calculatedAt = null,
        ?bool $isLoading = null,
        ?float $revenuePerSubscriber = null,
        ?int $spendersCount = null,
        ?float $total = null,
    ): self {
        $self = new self;

        null !== $calculatedAt && $self['calculatedAt'] = $calculatedAt;
        null !== $isLoading && $self['isLoading'] = $isLoading;
        null !== $revenuePerSubscriber && $self['revenuePerSubscriber'] = $revenuePerSubscriber;
        null !== $spendersCount && $self['spendersCount'] = $spendersCount;
        null !== $total && $self['total'] = $total;

        return $self;
    }

    public function withCalculatedAt(string $calculatedAt): self
    {
        $self = clone $this;
        $self['calculatedAt'] = $calculatedAt;

        return $self;
    }

    public function withIsLoading(bool $isLoading): self
    {
        $self = clone $this;
        $self['isLoading'] = $isLoading;

        return $self;
    }

    public function withRevenuePerSubscriber(float $revenuePerSubscriber): self
    {
        $self = clone $this;
        $self['revenuePerSubscriber'] = $revenuePerSubscriber;

        return $self;
    }

    public function withSpendersCount(int $spendersCount): self
    {
        $self = clone $this;
        $self['spendersCount'] = $spendersCount;

        return $self;
    }

    public function withTotal(float $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }
}
