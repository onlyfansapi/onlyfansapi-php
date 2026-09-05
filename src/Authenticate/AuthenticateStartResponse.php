<?php

declare(strict_types=1);

namespace OnlyFansAPI\Authenticate;

use OnlyFansAPI\Authenticate\AuthenticateStartResponse\UnionMember0;
use OnlyFansAPI\Authenticate\AuthenticateStartResponse\UnionMember1;
use OnlyFansAPI\Core\Concerns\SdkUnion;
use OnlyFansAPI\Core\Conversion\Contracts\Converter;
use OnlyFansAPI\Core\Conversion\Contracts\ConverterSource;

/**
 * For email_password or raw_data auth types.
 *
 * @phpstan-import-type UnionMember0Shape from \OnlyFansAPI\Authenticate\AuthenticateStartResponse\UnionMember0
 * @phpstan-import-type UnionMember1Shape from \OnlyFansAPI\Authenticate\AuthenticateStartResponse\UnionMember1
 *
 * @phpstan-type AuthenticateStartResponseVariants = UnionMember0|UnionMember1
 * @phpstan-type AuthenticateStartResponseShape = AuthenticateStartResponseVariants|UnionMember0Shape|UnionMember1Shape
 */
final class AuthenticateStartResponse implements ConverterSource
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
