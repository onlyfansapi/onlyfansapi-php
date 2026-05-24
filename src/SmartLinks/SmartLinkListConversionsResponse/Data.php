<?php

declare(strict_types=1);

namespace Onlyfansapi\SmartLinks\SmartLinkListConversionsResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\SmartLinks\SmartLinkListConversionsResponse\Data\Chart;
use Onlyfansapi\SmartLinks\SmartLinkListConversionsResponse\Data\Filters;
use Onlyfansapi\SmartLinks\SmartLinkListConversionsResponse\Data\Row;
use Onlyfansapi\SmartLinks\SmartLinkListConversionsResponse\Data\Summary;

/**
 * @phpstan-import-type ChartShape from \Onlyfansapi\SmartLinks\SmartLinkListConversionsResponse\Data\Chart
 * @phpstan-import-type FiltersShape from \Onlyfansapi\SmartLinks\SmartLinkListConversionsResponse\Data\Filters
 * @phpstan-import-type RowShape from \Onlyfansapi\SmartLinks\SmartLinkListConversionsResponse\Data\Row
 * @phpstan-import-type SummaryShape from \Onlyfansapi\SmartLinks\SmartLinkListConversionsResponse\Data\Summary
 *
 * @phpstan-type DataShape = array{
 *   chart?: list<Chart|ChartShape>|null,
 *   filters?: null|Filters|FiltersShape,
 *   rows?: list<Row|RowShape>|null,
 *   summary?: null|Summary|SummaryShape,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /** @var list<Chart>|null $chart */
    #[Optional(list: Chart::class)]
    public ?array $chart;

    #[Optional]
    public ?Filters $filters;

    /** @var list<Row>|null $rows */
    #[Optional(list: Row::class)]
    public ?array $rows;

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
     * @param list<Chart|ChartShape>|null $chart
     * @param Filters|FiltersShape|null $filters
     * @param list<Row|RowShape>|null $rows
     * @param Summary|SummaryShape|null $summary
     */
    public static function with(
        ?array $chart = null,
        Filters|array|null $filters = null,
        ?array $rows = null,
        Summary|array|null $summary = null,
    ): self {
        $self = new self;

        null !== $chart && $self['chart'] = $chart;
        null !== $filters && $self['filters'] = $filters;
        null !== $rows && $self['rows'] = $rows;
        null !== $summary && $self['summary'] = $summary;

        return $self;
    }

    /**
     * @param list<Chart|ChartShape> $chart
     */
    public function withChart(array $chart): self
    {
        $self = clone $this;
        $self['chart'] = $chart;

        return $self;
    }

    /**
     * @param Filters|FiltersShape $filters
     */
    public function withFilters(Filters|array $filters): self
    {
        $self = clone $this;
        $self['filters'] = $filters;

        return $self;
    }

    /**
     * @param list<Row|RowShape> $rows
     */
    public function withRows(array $rows): self
    {
        $self = clone $this;
        $self['rows'] = $rows;

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
