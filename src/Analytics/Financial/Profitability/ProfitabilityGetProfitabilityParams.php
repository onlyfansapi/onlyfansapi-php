<?php

declare(strict_types=1);

namespace Onlyfansapi\Analytics\Financial\Profitability;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Calculate profitability for creators including revenue, costs, commissions, and margins for a specific month.
 *
 * @see Onlyfansapi\Services\Analytics\Financial\ProfitabilityService::getProfitability()
 *
 * @phpstan-type ProfitabilityGetProfitabilityParamsShape = array{
 *   accountIDs: list<string>, month: int, year: int
 * }
 */
final class ProfitabilityGetProfitabilityParams implements BaseModel
{
    /** @use SdkModel<ProfitabilityGetProfitabilityParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Array of account prefixed IDs.
     *
     * @var list<string> $accountIDs
     */
    #[Required('account_ids', list: 'string')]
    public array $accountIDs;

    /**
     * The month to calculate profitability for (1-12).
     */
    #[Required]
    public int $month;

    /**
     * The year to calculate profitability for.
     */
    #[Required]
    public int $year;

    /**
     * `new ProfitabilityGetProfitabilityParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ProfitabilityGetProfitabilityParams::with(
     *   accountIDs: ..., month: ..., year: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ProfitabilityGetProfitabilityParams)
     *   ->withAccountIDs(...)
     *   ->withMonth(...)
     *   ->withYear(...)
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
     *
     * @param list<string> $accountIDs
     */
    public static function with(array $accountIDs, int $month, int $year): self
    {
        $self = new self;

        $self['accountIDs'] = $accountIDs;
        $self['month'] = $month;
        $self['year'] = $year;

        return $self;
    }

    /**
     * Array of account prefixed IDs.
     *
     * @param list<string> $accountIDs
     */
    public function withAccountIDs(array $accountIDs): self
    {
        $self = clone $this;
        $self['accountIDs'] = $accountIDs;

        return $self;
    }

    /**
     * The month to calculate profitability for (1-12).
     */
    public function withMonth(int $month): self
    {
        $self = clone $this;
        $self['month'] = $month;

        return $self;
    }

    /**
     * The year to calculate profitability for.
     */
    public function withYear(int $year): self
    {
        $self = clone $this;
        $self['year'] = $year;

        return $self;
    }
}
