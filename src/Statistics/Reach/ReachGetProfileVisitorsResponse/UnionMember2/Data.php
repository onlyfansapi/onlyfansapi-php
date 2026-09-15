<?php

declare(strict_types=1);

namespace OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember2;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember2\Data\TopCountries;

/**
 * @phpstan-import-type TopCountriesShape from \OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember2\Data\TopCountries
 *
 * @phpstan-type DataShape = array{
 *   hasStats?: bool|null,
 *   isAvailable?: bool|null,
 *   topCountries?: null|TopCountries|TopCountriesShape,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?bool $hasStats;

    #[Optional]
    public ?bool $isAvailable;

    #[Optional]
    public ?TopCountries $topCountries;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param TopCountries|TopCountriesShape|null $topCountries
     */
    public static function with(
        ?bool $hasStats = null,
        ?bool $isAvailable = null,
        TopCountries|array|null $topCountries = null,
    ): self {
        $self = new self;

        null !== $hasStats && $self['hasStats'] = $hasStats;
        null !== $isAvailable && $self['isAvailable'] = $isAvailable;
        null !== $topCountries && $self['topCountries'] = $topCountries;

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
}
