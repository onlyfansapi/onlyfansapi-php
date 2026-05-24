<?php

declare(strict_types=1);

namespace Onlyfansapi\Analytics\Financial\Profitability;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Get historical profitability data for a specific account over multiple months.
 *
 * @see Onlyfansapi\Services\Analytics\Financial\ProfitabilityService::getHistory()
 *
 * @phpstan-type ProfitabilityGetHistoryParamsShape = array{
 *   accountPrefixedID: string, months?: int|null
 * }
 */
final class ProfitabilityGetHistoryParams implements BaseModel
{
    /** @use SdkModel<ProfitabilityGetHistoryParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The account prefixed ID.
     */
    #[Required]
    public string $accountPrefixedID;

    /**
     * Number of months of history to retrieve (1-60, default 12). Must be at least 1. Must not be greater than 60.
     */
    #[Optional]
    public ?int $months;

    /**
     * `new ProfitabilityGetHistoryParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ProfitabilityGetHistoryParams::with(accountPrefixedID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ProfitabilityGetHistoryParams)->withAccountPrefixedID(...)
     * ```
     */
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
        string $accountPrefixedID,
        ?int $months = null
    ): self {
        $self = new self;

        $self['accountPrefixedID'] = $accountPrefixedID;

        null !== $months && $self['months'] = $months;

        return $self;
    }

    /**
     * The account prefixed ID.
     */
    public function withAccountPrefixedID(string $accountPrefixedID): self
    {
        $self = clone $this;
        $self['accountPrefixedID'] = $accountPrefixedID;

        return $self;
    }

    /**
     * Number of months of history to retrieve (1-60, default 12). Must be at least 1. Must not be greater than 60.
     */
    public function withMonths(int $months): self
    {
        $self = clone $this;
        $self['months'] = $months;

        return $self;
    }
}
