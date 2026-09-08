<?php

declare(strict_types=1);

namespace OnlyFansAPI\Media\Uploads\UploadGetStatusResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Upload still processing.
 *
 * @phpstan-type UnionMember0Shape = array{
 *   prefixedID?: string|null, status?: string|null
 * }
 */
final class UnionMember0 implements BaseModel
{
    /** @use SdkModel<UnionMember0Shape> */
    use SdkModel;

    #[Optional('prefixed_id')]
    public ?string $prefixedID;

    #[Optional]
    public ?string $status;

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
        ?string $prefixedID = null,
        ?string $status = null
    ): self {
        $self = new self;

        null !== $prefixedID && $self['prefixedID'] = $prefixedID;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    public function withPrefixedID(string $prefixedID): self
    {
        $self = clone $this;
        $self['prefixedID'] = $prefixedID;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
