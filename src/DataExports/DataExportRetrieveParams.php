<?php

declare(strict_types=1);

namespace Onlyfansapi\DataExports;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Get the current status and progress of a data export.
 *
 * @see Onlyfansapi\Services\DataExportsService::retrieve()
 *
 * @phpstan-type DataExportRetrieveParamsShape = array{
 *   downloadURLExpiresIn?: int|null
 * }
 */
final class DataExportRetrieveParams implements BaseModel
{
    /** @use SdkModel<DataExportRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Number of minutes until the download URL expires. Min `1`, max `60`, default `5`.
     */
    #[Optional]
    public ?int $downloadURLExpiresIn;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $downloadURLExpiresIn = null): self
    {
        $self = new self;

        null !== $downloadURLExpiresIn && $self['downloadURLExpiresIn'] = $downloadURLExpiresIn;

        return $self;
    }

    /**
     * Number of minutes until the download URL expires. Min `1`, max `60`, default `5`.
     */
    public function withDownloadURLExpiresIn(int $downloadURLExpiresIn): self
    {
        $self = clone $this;
        $self['downloadURLExpiresIn'] = $downloadURLExpiresIn;

        return $self;
    }
}
