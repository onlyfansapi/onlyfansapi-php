<?php

declare(strict_types=1);

namespace OnlyFansAPI\Media\Vault\Lists;

use OnlyFansAPI\Core\Concerns\SdkUnion;
use OnlyFansAPI\Core\Conversion\Contracts\Converter;
use OnlyFansAPI\Core\Conversion\Contracts\ConverterSource;
use OnlyFansAPI\Media\Vault\Lists\ListListResponse\UnionMember0;
use OnlyFansAPI\Media\Vault\Lists\ListListResponse\UnionMember1;

/**
 * Success.
 *
 * @phpstan-import-type UnionMember0Shape from \OnlyFansAPI\Media\Vault\Lists\ListListResponse\UnionMember0
 * @phpstan-import-type UnionMember1Shape from \OnlyFansAPI\Media\Vault\Lists\ListListResponse\UnionMember1
 *
 * @phpstan-type ListListResponseVariants = UnionMember0|UnionMember1
 * @phpstan-type ListListResponseShape = ListListResponseVariants|UnionMember0Shape|UnionMember1Shape
 */
final class ListListResponse implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [UnionMember0::class, UnionMember1::class];
    }
}
