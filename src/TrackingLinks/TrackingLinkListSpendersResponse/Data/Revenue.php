<?php

declare(strict_types=1);

namespace Onlyfansapi\TrackingLinks\TrackingLinkListSpendersResponse\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type RevenueShape = array{
 *   calculatedAt?: string|null, total?: float|null
 * }
 */
final class Revenue implements BaseModel
{
    /** @use SdkModel<RevenueShape> */
    use SdkModel;

    #[Optional('calculated_at')]
    public ?string $calculatedAt;

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
        ?float $total = null
    ): self {
        $self = new self;

        null !== $calculatedAt && $self['calculatedAt'] = $calculatedAt;
        null !== $total && $self['total'] = $total;

        return $self;
    }

    public function withCalculatedAt(string $calculatedAt): self
    {
        $self = clone $this;
        $self['calculatedAt'] = $calculatedAt;

        return $self;
    }

    public function withTotal(float $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }
}
