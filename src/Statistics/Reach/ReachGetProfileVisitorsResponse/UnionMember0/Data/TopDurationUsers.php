<?php

declare(strict_types=1);

namespace Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember0\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember0\Data\TopDurationUsers\Totals;

/**
 * @phpstan-import-type TotalsShape from \Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember0\Data\TopDurationUsers\Totals
 *
 * @phpstan-type TopDurationUsersShape = array{totals?: null|Totals|TotalsShape}
 */
final class TopDurationUsers implements BaseModel
{
    /** @use SdkModel<TopDurationUsersShape> */
    use SdkModel;

    #[Optional]
    public ?Totals $totals;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Totals|TotalsShape|null $totals
     */
    public static function with(Totals|array|null $totals = null): self
    {
        $self = new self;

        null !== $totals && $self['totals'] = $totals;

        return $self;
    }

    /**
     * @param Totals|TotalsShape $totals
     */
    public function withTotals(Totals|array $totals): self
    {
        $self = clone $this;
        $self['totals'] = $totals;

        return $self;
    }
}
