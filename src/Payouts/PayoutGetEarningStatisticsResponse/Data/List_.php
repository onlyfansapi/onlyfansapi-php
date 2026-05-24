<?php

declare(strict_types=1);

namespace Onlyfansapi\Payouts\PayoutGetEarningStatisticsResponse\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Payouts\PayoutGetEarningStatisticsResponse\Data\List_\Months;
use Onlyfansapi\Payouts\PayoutGetEarningStatisticsResponse\Data\List_\Total;

/**
 * @phpstan-import-type MonthsShape from \Onlyfansapi\Payouts\PayoutGetEarningStatisticsResponse\Data\List_\Months
 * @phpstan-import-type TotalShape from \Onlyfansapi\Payouts\PayoutGetEarningStatisticsResponse\Data\List_\Total
 *
 * @phpstan-type ListShape = array{
 *   months?: null|Months|MonthsShape, total?: null|Total|TotalShape
 * }
 */
final class List_ implements BaseModel
{
    /** @use SdkModel<ListShape> */
    use SdkModel;

    #[Optional]
    public ?Months $months;

    #[Optional]
    public ?Total $total;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Months|MonthsShape|null $months
     * @param Total|TotalShape|null $total
     */
    public static function with(
        Months|array|null $months = null,
        Total|array|null $total = null
    ): self {
        $self = new self;

        null !== $months && $self['months'] = $months;
        null !== $total && $self['total'] = $total;

        return $self;
    }

    /**
     * @param Months|MonthsShape $months
     */
    public function withMonths(Months|array $months): self
    {
        $self = clone $this;
        $self['months'] = $months;

        return $self;
    }

    /**
     * @param Total|TotalShape $total
     */
    public function withTotal(Total|array $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }
}
