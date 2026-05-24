<?php

declare(strict_types=1);

namespace Onlyfansapi\Users\UserListResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Users\UserListResponse\Data\_1000000;

/**
 * @phpstan-import-type _1000000Shape from \Onlyfansapi\Users\UserListResponse\Data\_1000000
 *
 * @phpstan-type DataShape = array{
 *   _1000000?: null|\Onlyfansapi\Users\UserListResponse\Data\_1000000|_1000000Shape,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional('1000000')]
    public ?_1000000 $_1000000;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param _1000000|_1000000Shape|null $_1000000
     */
    public static function with(
        _1000000|array|null $_1000000 = null
    ): self {
        $self = new self;

        null !== $_1000000 && $self['_1000000'] = $_1000000;

        return $self;
    }

    /**
     * @param _1000000|_1000000Shape $_1000000
     */
    public function with1000000(
        _1000000|array $_1000000
    ): self {
        $self = clone $this;
        $self['_1000000'] = $_1000000;

        return $self;
    }
}
