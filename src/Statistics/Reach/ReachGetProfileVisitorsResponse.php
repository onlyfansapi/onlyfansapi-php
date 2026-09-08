<?php

declare(strict_types=1);

namespace OnlyFansAPI\Statistics\Reach;

use OnlyFansAPI\Core\Concerns\SdkUnion;
use OnlyFansAPI\Core\Conversion\Contracts\Converter;
use OnlyFansAPI\Core\Conversion\Contracts\ConverterSource;
use OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember0;
use OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember1;
use OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember2;

/**
 * No filter.
 *
 * @phpstan-import-type UnionMember0Shape from \OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember0
 * @phpstan-import-type UnionMember1Shape from \OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember1
 * @phpstan-import-type UnionMember2Shape from \OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember2
 *
 * @phpstan-type ReachGetProfileVisitorsResponseVariants = UnionMember0|UnionMember1|UnionMember2
 * @phpstan-type ReachGetProfileVisitorsResponseShape = ReachGetProfileVisitorsResponseVariants|UnionMember0Shape|UnionMember1Shape|UnionMember2Shape
 */
final class ReachGetProfileVisitorsResponse implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [UnionMember0::class, UnionMember1::class, UnionMember2::class];
    }
}
