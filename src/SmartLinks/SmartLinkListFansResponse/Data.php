<?php

declare(strict_types=1);

namespace Onlyfansapi\SmartLinks\SmartLinkListFansResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\SmartLinks\SmartLinkListFansResponse\Data\Filters;
use Onlyfansapi\SmartLinks\SmartLinkListFansResponse\Data\Row;
use Onlyfansapi\SmartLinks\SmartLinkListFansResponse\Data\Summary;

/**
 * @phpstan-import-type FiltersShape from \Onlyfansapi\SmartLinks\SmartLinkListFansResponse\Data\Filters
 * @phpstan-import-type RowShape from \Onlyfansapi\SmartLinks\SmartLinkListFansResponse\Data\Row
 * @phpstan-import-type SummaryShape from \Onlyfansapi\SmartLinks\SmartLinkListFansResponse\Data\Summary
 *
 * @phpstan-type DataShape = array{
 *   filters?: null|Filters|FiltersShape,
 *   rows?: list<Row|RowShape>|null,
 *   summary?: null|Summary|SummaryShape,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

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
     * @param Filters|FiltersShape|null $filters
     * @param list<Row|RowShape>|null $rows
     * @param Summary|SummaryShape|null $summary
     */
    public static function with(
        Filters|array|null $filters = null,
        ?array $rows = null,
        Summary|array|null $summary = null,
    ): self {
        $self = new self;

        null !== $filters && $self['filters'] = $filters;
        null !== $rows && $self['rows'] = $rows;
        null !== $summary && $self['summary'] = $summary;

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
