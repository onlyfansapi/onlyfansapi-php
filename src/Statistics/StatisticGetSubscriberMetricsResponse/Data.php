<?php

declare(strict_types=1);

namespace Onlyfansapi\Statistics\StatisticGetSubscriberMetricsResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Statistics\StatisticGetSubscriberMetricsResponse\Data\Detailed;

/**
 * @phpstan-import-type DetailedShape from \Onlyfansapi\Statistics\StatisticGetSubscriberMetricsResponse\Data\Detailed
 *
 * @phpstan-type DataShape = array{
 *   detailed?: null|Detailed|DetailedShape,
 *   newSubscriptions?: int|null,
 *   renewedSubscriptions?: int|null,
 *   totalSubscriptions?: int|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?Detailed $detailed;

    #[Optional('new_subscriptions')]
    public ?int $newSubscriptions;

    #[Optional('renewed_subscriptions')]
    public ?int $renewedSubscriptions;

    #[Optional('total_subscriptions')]
    public ?int $totalSubscriptions;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Detailed|DetailedShape|null $detailed
     */
    public static function with(
        Detailed|array|null $detailed = null,
        ?int $newSubscriptions = null,
        ?int $renewedSubscriptions = null,
        ?int $totalSubscriptions = null,
    ): self {
        $self = new self;

        null !== $detailed && $self['detailed'] = $detailed;
        null !== $newSubscriptions && $self['newSubscriptions'] = $newSubscriptions;
        null !== $renewedSubscriptions && $self['renewedSubscriptions'] = $renewedSubscriptions;
        null !== $totalSubscriptions && $self['totalSubscriptions'] = $totalSubscriptions;

        return $self;
    }

    /**
     * @param Detailed|DetailedShape $detailed
     */
    public function withDetailed(Detailed|array $detailed): self
    {
        $self = clone $this;
        $self['detailed'] = $detailed;

        return $self;
    }

    public function withNewSubscriptions(int $newSubscriptions): self
    {
        $self = clone $this;
        $self['newSubscriptions'] = $newSubscriptions;

        return $self;
    }

    public function withRenewedSubscriptions(int $renewedSubscriptions): self
    {
        $self = clone $this;
        $self['renewedSubscriptions'] = $renewedSubscriptions;

        return $self;
    }

    public function withTotalSubscriptions(int $totalSubscriptions): self
    {
        $self = clone $this;
        $self['totalSubscriptions'] = $totalSubscriptions;

        return $self;
    }
}
