<?php

declare(strict_types=1);

namespace OnlyFansAPI\Analytics\Summary;

use OnlyFansAPI\Analytics\Summary\SummaryGetPeriodComparisonResponse\Summary;
use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SummaryShape from \OnlyFansAPI\Analytics\Summary\SummaryGetPeriodComparisonResponse\Summary
 *
 * @phpstan-type SummaryGetPeriodComparisonResponseShape = array{
 *   breakdown?: list<mixed>|null,
 *   chartData?: list<mixed>|null,
 *   periodALabel?: string|null,
 *   periodBLabel?: string|null,
 *   summary?: null|Summary|SummaryShape,
 * }
 */
final class SummaryGetPeriodComparisonResponse implements BaseModel
{
    /** @use SdkModel<SummaryGetPeriodComparisonResponseShape> */
    use SdkModel;

    /** @var list<mixed>|null $breakdown */
    #[Optional(list: 'mixed')]
    public ?array $breakdown;

    /** @var list<mixed>|null $chartData */
    #[Optional('chart_data', list: 'mixed')]
    public ?array $chartData;

    #[Optional('period_a_label')]
    public ?string $periodALabel;

    #[Optional('period_b_label')]
    public ?string $periodBLabel;

    #[Optional]
    public ?Summary $summary;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<mixed>|null $breakdown
     * @param list<mixed>|null $chartData
     * @param Summary|SummaryShape|null $summary
     */
    public static function with(
        ?array $breakdown = null,
        ?array $chartData = null,
        ?string $periodALabel = null,
        ?string $periodBLabel = null,
        Summary|array|null $summary = null,
    ): self {
        $self = new self;

        null !== $breakdown && $self['breakdown'] = $breakdown;
        null !== $chartData && $self['chartData'] = $chartData;
        null !== $periodALabel && $self['periodALabel'] = $periodALabel;
        null !== $periodBLabel && $self['periodBLabel'] = $periodBLabel;
        null !== $summary && $self['summary'] = $summary;

        return $self;
    }

    /**
     * @param list<mixed> $breakdown
     */
    public function withBreakdown(array $breakdown): self
    {
        $self = clone $this;
        $self['breakdown'] = $breakdown;

        return $self;
    }

    /**
     * @param list<mixed> $chartData
     */
    public function withChartData(array $chartData): self
    {
        $self = clone $this;
        $self['chartData'] = $chartData;

        return $self;
    }

    public function withPeriodALabel(string $periodALabel): self
    {
        $self = clone $this;
        $self['periodALabel'] = $periodALabel;

        return $self;
    }

    public function withPeriodBLabel(string $periodBLabel): self
    {
        $self = clone $this;
        $self['periodBLabel'] = $periodBLabel;

        return $self;
    }

    /**
     * @param Summary|SummaryShape $summary
     */
    public function withSummary(Summary|array $summary): self
    {
        $self = clone $this;
        $self['summary'] = $summary;

        return $self;
    }
}
