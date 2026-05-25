<?php

declare(strict_types=1);

namespace OnlyFansAPI\Payouts\PayoutGetEarningStatisticsResponse\Data\List_;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Payouts\PayoutGetEarningStatisticsResponse\Data\List_\Months\_1735689661;

/**
 * @phpstan-import-type _1735689661Shape from \OnlyFansAPI\Payouts\PayoutGetEarningStatisticsResponse\Data\List_\Months\_1735689661
 *
 * @phpstan-type MonthsShape = array{
 *   _1735689661?: null|\OnlyFansAPI\Payouts\PayoutGetEarningStatisticsResponse\Data\List_\Months\_1735689661|_1735689661Shape,
 * }
 */
final class Months implements BaseModel
{
    /** @use SdkModel<MonthsShape> */
    use SdkModel;

    #[Optional('1735689661')]
    public ?_1735689661 $_1735689661;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param _1735689661|_1735689661Shape|null $_1735689661
     */
    public static function with(
        _1735689661|array|null $_1735689661 = null,
    ): self {
        $self = new self;

        null !== $_1735689661 && $self['_1735689661'] = $_1735689661;

        return $self;
    }

    /**
     * @param _1735689661|_1735689661Shape $_1735689661
     */
    public function with1735689661(
        _1735689661|array $_1735689661,
    ): self {
        $self = clone $this;
        $self['_1735689661'] = $_1735689661;

        return $self;
    }
}
