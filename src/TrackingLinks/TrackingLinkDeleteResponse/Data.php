<?php

declare(strict_types=1);

namespace OnlyFansAPI\TrackingLinks\TrackingLinkDeleteResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{success?: bool|null}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?bool $success;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $success = null): self
    {
        $self = new self;

        null !== $success && $self['success'] = $success;

        return $self;
    }

    public function withSuccess(bool $success): self
    {
        $self = clone $this;
        $self['success'] = $success;

        return $self;
    }
}
