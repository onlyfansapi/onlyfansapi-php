<?php

declare(strict_types=1);

namespace OnlyFansAPI\Statistics\StatisticGetOverviewResponse\Data\Visitors;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Statistics\StatisticGetOverviewResponse\Data\Visitors\Subscriptions\New_;
use OnlyFansAPI\Statistics\StatisticGetOverviewResponse\Data\Visitors\Subscriptions\Renew;

/**
 * @phpstan-import-type NewShape from \OnlyFansAPI\Statistics\StatisticGetOverviewResponse\Data\Visitors\Subscriptions\New_
 * @phpstan-import-type RenewShape from \OnlyFansAPI\Statistics\StatisticGetOverviewResponse\Data\Visitors\Subscriptions\Renew
 *
 * @phpstan-type SubscriptionsShape = array{
 *   new?: null|New_|NewShape, renew?: null|Renew|RenewShape
 * }
 */
final class Subscriptions implements BaseModel
{
    /** @use SdkModel<SubscriptionsShape> */
    use SdkModel;

    #[Optional]
    public ?New_ $new;

    #[Optional]
    public ?Renew $renew;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param New_|NewShape|null $new
     * @param Renew|RenewShape|null $renew
     */
    public static function with(
        New_|array|null $new = null,
        Renew|array|null $renew = null
    ): self {
        $self = new self;

        null !== $new && $self['new'] = $new;
        null !== $renew && $self['renew'] = $renew;

        return $self;
    }

    /**
     * @param New_|NewShape $new
     */
    public function withNew(New_|array $new): self
    {
        $self = clone $this;
        $self['new'] = $new;

        return $self;
    }

    /**
     * @param Renew|RenewShape $renew
     */
    public function withRenew(Renew|array $renew): self
    {
        $self = clone $this;
        $self['renew'] = $renew;

        return $self;
    }
}
