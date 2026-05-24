<?php

declare(strict_types=1);

namespace Onlyfansapi\Media\Uploads\UploadGetStatusResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Upload failed.
 *
 * @phpstan-type UnionMember1Shape = array{
 *   error?: string|null, prefixedID?: string|null, status?: string|null
 * }
 */
final class UnionMember1 implements BaseModel
{
    /** @use SdkModel<UnionMember1Shape> */
    use SdkModel;

    #[Optional]
    public ?string $error;

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
        ?string $error = null,
        ?string $prefixedID = null,
        ?string $status = null
    ): self {
        $self = new self;

        null !== $error && $self['error'] = $error;
        null !== $prefixedID && $self['prefixedID'] = $prefixedID;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    public function withError(string $error): self
    {
        $self = clone $this;
        $self['error'] = $error;

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
