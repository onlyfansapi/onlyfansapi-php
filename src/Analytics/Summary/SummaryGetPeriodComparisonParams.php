<?php

declare(strict_types=1);

namespace Onlyfansapi\Analytics\Summary;

use Onlyfansapi\Analytics\Summary\SummaryGetPeriodComparisonParams\Granularity;
use Onlyfansapi\Analytics\Summary\SummaryGetPeriodComparisonParams\PeriodA;
use Onlyfansapi\Analytics\Summary\SummaryGetPeriodComparisonParams\PeriodB;
use Onlyfansapi\Analytics\Summary\SummaryGetPeriodComparisonParams\StatType;
use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Compare two time periods to analyze performance changes. Returns summary, breakdown, and chart data for the comparison.
 *
 * @see Onlyfansapi\Services\Analytics\SummaryService::getPeriodComparison()
 *
 * @phpstan-import-type PeriodAShape from \Onlyfansapi\Analytics\Summary\SummaryGetPeriodComparisonParams\PeriodA
 * @phpstan-import-type PeriodBShape from \Onlyfansapi\Analytics\Summary\SummaryGetPeriodComparisonParams\PeriodB
 *
 * @phpstan-type SummaryGetPeriodComparisonParamsShape = array{
 *   accountIDs: list<string>,
 *   periodA: PeriodA|PeriodAShape,
 *   periodB: PeriodB|PeriodBShape,
 *   granularity?: null|Granularity|value-of<Granularity>,
 *   statType?: null|StatType|value-of<StatType>,
 * }
 */
final class SummaryGetPeriodComparisonParams implements BaseModel
{
    /** @use SdkModel<SummaryGetPeriodComparisonParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Array of account prefixed IDs to compare.
     *
     * @var list<string> $accountIDs
     */
    #[Required('account_ids', list: 'string')]
    public array $accountIDs;

    /**
     * First period to compare.
     */
    #[Required('period_a')]
    public PeriodA $periodA;

    /**
     * Second period to compare.
     */
    #[Required('period_b')]
    public PeriodB $periodB;

    /**
     * Comparison granularity.
     *
     * @var value-of<Granularity>|null $granularity
     */
    #[Optional(enum: Granularity::class)]
    public ?string $granularity;

    /**
     * The statistic type to compare.
     *
     * @var value-of<StatType>|null $statType
     */
    #[Optional('stat_type', enum: StatType::class)]
    public ?string $statType;

    /**
     * `new SummaryGetPeriodComparisonParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SummaryGetPeriodComparisonParams::with(
     *   accountIDs: ..., periodA: ..., periodB: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SummaryGetPeriodComparisonParams)
     *   ->withAccountIDs(...)
     *   ->withPeriodA(...)
     *   ->withPeriodB(...)
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
     * @param PeriodA|PeriodAShape $periodA
     * @param PeriodB|PeriodBShape $periodB
     * @param Granularity|value-of<Granularity>|null $granularity
     * @param StatType|value-of<StatType>|null $statType
     */
    public static function with(
        array $accountIDs,
        PeriodA|array $periodA,
        PeriodB|array $periodB,
        Granularity|string|null $granularity = null,
        StatType|string|null $statType = null,
    ): self {
        $self = new self;

        $self['accountIDs'] = $accountIDs;
        $self['periodA'] = $periodA;
        $self['periodB'] = $periodB;

        null !== $granularity && $self['granularity'] = $granularity;
        null !== $statType && $self['statType'] = $statType;

        return $self;
    }

    /**
     * Array of account prefixed IDs to compare.
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
     * First period to compare.
     *
     * @param PeriodA|PeriodAShape $periodA
     */
    public function withPeriodA(PeriodA|array $periodA): self
    {
        $self = clone $this;
        $self['periodA'] = $periodA;

        return $self;
    }

    /**
     * Second period to compare.
     *
     * @param PeriodB|PeriodBShape $periodB
     */
    public function withPeriodB(PeriodB|array $periodB): self
    {
        $self = clone $this;
        $self['periodB'] = $periodB;

        return $self;
    }

    /**
     * Comparison granularity.
     *
     * @param Granularity|value-of<Granularity> $granularity
     */
    public function withGranularity(Granularity|string $granularity): self
    {
        $self = clone $this;
        $self['granularity'] = $granularity;

        return $self;
    }

    /**
     * The statistic type to compare.
     *
     * @param StatType|value-of<StatType> $statType
     */
    public function withStatType(StatType|string $statType): self
    {
        $self = clone $this;
        $self['statType'] = $statType;

        return $self;
    }
}
