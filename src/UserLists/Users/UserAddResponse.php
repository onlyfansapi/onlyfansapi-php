<?php

declare(strict_types=1);

namespace OnlyFansAPI\UserLists\Users;

use OnlyFansAPI\Core\Concerns\SdkUnion;
use OnlyFansAPI\Core\Conversion\Contracts\Converter;
use OnlyFansAPI\Core\Conversion\Contracts\ConverterSource;
use OnlyFansAPI\UserLists\Users\UserAddResponse\UnionMember0;
use OnlyFansAPI\UserLists\Users\UserAddResponse\UnionMember1;

/**
 * Default: OnlyFans accepted every User ID.
 *
 * @phpstan-import-type UnionMember0Shape from \OnlyFansAPI\UserLists\Users\UserAddResponse\UnionMember0
 * @phpstan-import-type UnionMember1Shape from \OnlyFansAPI\UserLists\Users\UserAddResponse\UnionMember1
 *
 * @phpstan-type UserAddResponseVariants = UnionMember0|UnionMember1
 * @phpstan-type UserAddResponseShape = UserAddResponseVariants|UnionMember0Shape|UnionMember1Shape
 */
final class UserAddResponse implements ConverterSource
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
