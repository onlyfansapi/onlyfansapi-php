<?php

declare(strict_types=1);

namespace OnlyFansAPI\Me\MeGetResponse\Data;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Me\MeGetResponse\Data\Upload\GeoUploadArgs;

/**
 * @phpstan-import-type GeoUploadArgsShape from \OnlyFansAPI\Me\MeGetResponse\Data\Upload\GeoUploadArgs
 *
 * @phpstan-type UploadShape = array{
 *   geoUploadArgs?: null|GeoUploadArgs|GeoUploadArgsShape
 * }
 */
final class Upload implements BaseModel
{
    /** @use SdkModel<UploadShape> */
    use SdkModel;

    #[Optional]
    public ?GeoUploadArgs $geoUploadArgs;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param GeoUploadArgs|GeoUploadArgsShape|null $geoUploadArgs
     */
    public static function with(GeoUploadArgs|array|null $geoUploadArgs = null): self
    {
        $self = new self;

        null !== $geoUploadArgs && $self['geoUploadArgs'] = $geoUploadArgs;

        return $self;
    }

    /**
     * @param GeoUploadArgs|GeoUploadArgsShape $geoUploadArgs
     */
    public function withGeoUploadArgs(GeoUploadArgs|array $geoUploadArgs): self
    {
        $self = clone $this;
        $self['geoUploadArgs'] = $geoUploadArgs;

        return $self;
    }
}
