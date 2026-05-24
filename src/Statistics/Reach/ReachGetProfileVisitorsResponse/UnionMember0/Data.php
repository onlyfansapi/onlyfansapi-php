<?php

declare(strict_types=1);

namespace Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember0;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember0\Data\Chart;
use Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember0\Data\TopCountries;
use Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember0\Data\TopDurationUsers;
use Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember0\Data\Total;

/**
 * @phpstan-import-type ChartShape from \Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember0\Data\Chart
 * @phpstan-import-type TopCountriesShape from \Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember0\Data\TopCountries
 * @phpstan-import-type TopDurationUsersShape from \Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember0\Data\TopDurationUsers
 * @phpstan-import-type TotalShape from \Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember0\Data\Total
 *
 * @phpstan-type DataShape = array{
 *   chart?: null|Chart|ChartShape,
 *   hasStats?: bool|null,
 *   isAvailable?: bool|null,
 *   topCountries?: null|TopCountries|TopCountriesShape,
 *   topDurationUsers?: null|TopDurationUsers|TopDurationUsersShape,
 *   total?: null|Total|TotalShape,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?Chart $chart;

    #[Optional]
    public ?bool $hasStats;

    #[Optional]
    public ?bool $isAvailable;

    #[Optional]
    public ?TopCountries $topCountries;

    #[Optional]
    public ?TopDurationUsers $topDurationUsers;

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
     * @param Chart|ChartShape|null $chart
     * @param TopCountries|TopCountriesShape|null $topCountries
     * @param TopDurationUsers|TopDurationUsersShape|null $topDurationUsers
     * @param Total|TotalShape|null $total
     */
    public static function with(
        Chart|array|null $chart = null,
        ?bool $hasStats = null,
        ?bool $isAvailable = null,
        TopCountries|array|null $topCountries = null,
        TopDurationUsers|array|null $topDurationUsers = null,
        Total|array|null $total = null,
    ): self {
        $self = new self;

        null !== $chart && $self['chart'] = $chart;
        null !== $hasStats && $self['hasStats'] = $hasStats;
        null !== $isAvailable && $self['isAvailable'] = $isAvailable;
        null !== $topCountries && $self['topCountries'] = $topCountries;
        null !== $topDurationUsers && $self['topDurationUsers'] = $topDurationUsers;
        null !== $total && $self['total'] = $total;

        return $self;
    }

    /**
     * @param Chart|ChartShape $chart
     */
    public function withChart(Chart|array $chart): self
    {
        $self = clone $this;
        $self['chart'] = $chart;

        return $self;
    }

    public function withHasStats(bool $hasStats): self
    {
        $self = clone $this;
        $self['hasStats'] = $hasStats;

        return $self;
    }

    public function withIsAvailable(bool $isAvailable): self
    {
        $self = clone $this;
        $self['isAvailable'] = $isAvailable;

        return $self;
    }

    /**
     * @param TopCountries|TopCountriesShape $topCountries
     */
    public function withTopCountries(TopCountries|array $topCountries): self
    {
        $self = clone $this;
        $self['topCountries'] = $topCountries;

        return $self;
    }

    /**
     * @param TopDurationUsers|TopDurationUsersShape $topDurationUsers
     */
    public function withTopDurationUsers(
        TopDurationUsers|array $topDurationUsers
    ): self {
        $self = clone $this;
        $self['topDurationUsers'] = $topDurationUsers;

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
