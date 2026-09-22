<?php

declare(strict_types=1);

namespace OnlyFansAPI\UserLists\Users\UserAddResponse\UnionMember1\Data;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type FailedShape = array{_123456?: string|null}
 */
final class Failed implements BaseModel
{
    /** @use SdkModel<FailedShape> */
    use SdkModel;

    #[Optional('123456')]
    public ?string $_123456;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $_123456 = null): self
    {
        $self = new self;

        null !== $_123456 && $self['_123456'] = $_123456;

        return $self;
    }

    public function with123456(string $_123456): self
    {
        $self = clone $this;
        $self['_123456'] = $_123456;

        return $self;
    }
}
