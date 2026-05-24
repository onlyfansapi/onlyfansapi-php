<?php

declare(strict_types=1);

namespace Onlyfansapi\Analytics\Financial\Profitability;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Get historical profitability data for a specific account over multiple months.
 *
 * @see Onlyfansapi\Services\Analytics\Financial\ProfitabilityService::getHistory()
 *
 * @phpstan-type ProfitabilityGetHistoryParamsShape = array{months?: int|null}
 */
final class ProfitabilityGetHistoryParams implements BaseModel
{
    /** @use SdkModel<ProfitabilityGetHistoryParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Number of months of history to retrieve (1-60, default 12).
     */
    #[Optional]
    public ?int $months;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $months = null): self
    {
        $self = new self;

        null !== $months && $self['months'] = $months;

        return $self;
    }

    /**
     * Number of months of history to retrieve (1-60, default 12).
     */
    public function withMonths(int $months): self
    {
        $self = clone $this;
        $self['months'] = $months;

        return $self;
    }
}
