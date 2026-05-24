<?php

declare(strict_types=1);

namespace Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember0\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember0\Data\TopCountries\Row;
use Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember0\Data\TopCountries\Totals;

/**
 * @phpstan-import-type RowShape from \Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember0\Data\TopCountries\Row
 * @phpstan-import-type TotalsShape from \Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember0\Data\TopCountries\Totals
 *
 * @phpstan-type TopCountriesShape = array{
 *   hasMore?: bool|null,
 *   rows?: list<Row|RowShape>|null,
 *   totals?: null|Totals|TotalsShape,
 * }
 */
final class TopCountries implements BaseModel
{
    /** @use SdkModel<TopCountriesShape> */
    use SdkModel;

    #[Optional]
    public ?bool $hasMore;

    /** @var list<Row>|null $rows */
    #[Optional(list: Row::class)]
    public ?array $rows;

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
     * @param list<Row|RowShape>|null $rows
     * @param Totals|TotalsShape|null $totals
     */
    public static function with(
        ?bool $hasMore = null,
        ?array $rows = null,
        Totals|array|null $totals = null
    ): self {
        $self = new self;

        null !== $hasMore && $self['hasMore'] = $hasMore;
        null !== $rows && $self['rows'] = $rows;
        null !== $totals && $self['totals'] = $totals;

        return $self;
    }

    public function withHasMore(bool $hasMore): self
    {
        $self = clone $this;
        $self['hasMore'] = $hasMore;

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
     * @param Totals|TotalsShape $totals
     */
    public function withTotals(Totals|array $totals): self
    {
        $self = clone $this;
        $self['totals'] = $totals;

        return $self;
    }
}
