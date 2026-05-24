<?php

declare(strict_types=1);

namespace Onlyfansapi\Media\Uploads\UploadGetStatusResponse\UnionMember3\Media;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type AdditionalShape = array{user?: string|null}
 */
final class Additional implements BaseModel
{
    /** @use SdkModel<AdditionalShape> */
    use SdkModel;

    #[Optional]
    public ?string $user;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $user = null): self
    {
        $self = new self;

        null !== $user && $self['user'] = $user;

        return $self;
    }

    public function withUser(string $user): self
    {
        $self = clone $this;
        $self['user'] = $user;

        return $self;
    }
}
