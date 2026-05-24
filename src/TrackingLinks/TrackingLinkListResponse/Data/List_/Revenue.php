<?php

declare(strict_types=1);

namespace Onlyfansapi\TrackingLinks\TrackingLinkListResponse\Data\List_;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type RevenueShape = array{
 *   calculatedAt?: string|null,
 *   isLoading?: bool|null,
 *   revenuePerClick?: int|null,
 *   revenuePerSubscriber?: int|null,
 *   spendersCount?: int|null,
 *   total?: int|null,
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
    public ?int $revenuePerClick;

    #[Optional]
    public ?int $revenuePerSubscriber;

    #[Optional]
    public ?int $spendersCount;

    #[Optional]
    public ?int $total;

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
        ?int $revenuePerClick = null,
        ?int $revenuePerSubscriber = null,
        ?int $spendersCount = null,
        ?int $total = null,
    ): self {
        $self = new self;

        null !== $calculatedAt && $self['calculatedAt'] = $calculatedAt;
        null !== $isLoading && $self['isLoading'] = $isLoading;
        null !== $revenuePerClick && $self['revenuePerClick'] = $revenuePerClick;
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

    public function withRevenuePerClick(int $revenuePerClick): self
    {
        $self = clone $this;
        $self['revenuePerClick'] = $revenuePerClick;

        return $self;
    }

    public function withRevenuePerSubscriber(int $revenuePerSubscriber): self
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

    public function withTotal(int $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }
}
