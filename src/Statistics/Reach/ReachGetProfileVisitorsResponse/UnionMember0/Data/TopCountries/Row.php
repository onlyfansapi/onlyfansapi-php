<?php

declare(strict_types=1);

namespace OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember0\Data\TopCountries;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember0\Data\TopCountries\Row\ViewsCount;

/**
 * @phpstan-import-type ViewsCountShape from \OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember0\Data\TopCountries\Row\ViewsCount
 *
 * @phpstan-type RowShape = array{
 *   countryCode?: string|null,
 *   countryName?: string|null,
 *   rank?: int|null,
 *   viewsCount?: null|ViewsCount|ViewsCountShape,
 * }
 */
final class Row implements BaseModel
{
    /** @use SdkModel<RowShape> */
    use SdkModel;

    #[Optional]
    public ?string $countryCode;

    #[Optional]
    public ?string $countryName;

    #[Optional]
    public ?int $rank;

    #[Optional]
    public ?ViewsCount $viewsCount;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ViewsCount|ViewsCountShape|null $viewsCount
     */
    public static function with(
        ?string $countryCode = null,
        ?string $countryName = null,
        ?int $rank = null,
        ViewsCount|array|null $viewsCount = null,
    ): self {
        $self = new self;

        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $countryName && $self['countryName'] = $countryName;
        null !== $rank && $self['rank'] = $rank;
        null !== $viewsCount && $self['viewsCount'] = $viewsCount;

        return $self;
    }

    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    public function withCountryName(string $countryName): self
    {
        $self = clone $this;
        $self['countryName'] = $countryName;

        return $self;
    }

    public function withRank(int $rank): self
    {
        $self = clone $this;
        $self['rank'] = $rank;

        return $self;
    }

    /**
     * @param ViewsCount|ViewsCountShape $viewsCount
     */
    public function withViewsCount(ViewsCount|array $viewsCount): self
    {
        $self = clone $this;
        $self['viewsCount'] = $viewsCount;

        return $self;
    }
}
