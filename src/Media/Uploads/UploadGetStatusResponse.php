<?php

declare(strict_types=1);

namespace Onlyfansapi\Media\Uploads;

use Onlyfansapi\Core\Concerns\SdkUnion;
use Onlyfansapi\Core\Conversion\Contracts\Converter;
use Onlyfansapi\Core\Conversion\Contracts\ConverterSource;
use Onlyfansapi\Media\Uploads\UploadGetStatusResponse\UnionMember0;
use Onlyfansapi\Media\Uploads\UploadGetStatusResponse\UnionMember1;
use Onlyfansapi\Media\Uploads\UploadGetStatusResponse\UnionMember2;
use Onlyfansapi\Media\Uploads\UploadGetStatusResponse\UnionMember3;

/**
 * Upload still processing.
 *
 * @phpstan-import-type UnionMember0Shape from \Onlyfansapi\Media\Uploads\UploadGetStatusResponse\UnionMember0
 * @phpstan-import-type UnionMember1Shape from \Onlyfansapi\Media\Uploads\UploadGetStatusResponse\UnionMember1
 * @phpstan-import-type UnionMember2Shape from \Onlyfansapi\Media\Uploads\UploadGetStatusResponse\UnionMember2
 * @phpstan-import-type UnionMember3Shape from \Onlyfansapi\Media\Uploads\UploadGetStatusResponse\UnionMember3
 *
 * @phpstan-type UploadGetStatusResponseVariants = UnionMember0|UnionMember1|UnionMember2|UnionMember3
 * @phpstan-type UploadGetStatusResponseShape = UploadGetStatusResponseVariants|UnionMember0Shape|UnionMember1Shape|UnionMember2Shape|UnionMember3Shape
 */
final class UploadGetStatusResponse implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            UnionMember0::class,
            UnionMember1::class,
            UnionMember2::class,
            UnionMember3::class,
        ];
    }
}
