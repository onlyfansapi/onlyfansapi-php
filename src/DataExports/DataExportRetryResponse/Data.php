<?php

declare(strict_types=1);

namespace OnlyFansAPI\DataExports\DataExportRetryResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   message?: string|null,
 *   originalID?: string|null,
 *   status?: string|null,
 *   type?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional]
    public ?string $message;

    #[Optional('original_id')]
    public ?string $originalID;

    #[Optional]
    public ?string $status;

    #[Optional]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $id = null,
        ?string $message = null,
        ?string $originalID = null,
        ?string $status = null,
        ?string $type = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $message && $self['message'] = $message;
        null !== $originalID && $self['originalID'] = $originalID;
        null !== $status && $self['status'] = $status;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }

    public function withOriginalID(string $originalID): self
    {
        $self = clone $this;
        $self['originalID'] = $originalID;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
