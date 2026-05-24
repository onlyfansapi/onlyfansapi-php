<?php

declare(strict_types=1);

namespace Onlyfansapi\Queue\QueueCountResponse\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Queue\QueueCountResponse\Data\List_\_2025_01_01;
use Onlyfansapi\Queue\QueueCountResponse\Data\List_\_2025_01_02;

/**
 * @phpstan-import-type _2025_01_01Shape from \Onlyfansapi\Queue\QueueCountResponse\Data\List_\_2025_01_01
 * @phpstan-import-type _2025_01_02Shape from \Onlyfansapi\Queue\QueueCountResponse\Data\List_\_2025_01_02
 *
 * @phpstan-type ListShape = array{
 *   _2025_01_01?: null|\Onlyfansapi\Queue\QueueCountResponse\Data\List_\_2025_01_01|_2025_01_01Shape,
 *   _2025_01_02?: null|\Onlyfansapi\Queue\QueueCountResponse\Data\List_\_2025_01_02|_2025_01_02Shape,
 * }
 */
final class List_ implements BaseModel
{
    /** @use SdkModel<ListShape> */
    use SdkModel;

    #[Optional('2025-01-01')]
    public ?_2025_01_01 $_2025_01_01;

    #[Optional('2025-01-02')]
    public ?_2025_01_02 $_2025_01_02;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param _2025_01_01|_2025_01_01Shape|null $_2025_01_01
     * @param _2025_01_02|_2025_01_02Shape|null $_2025_01_02
     */
    public static function with(
        _2025_01_01|array|null $_2025_01_01 = null,
        _2025_01_02|array|null $_2025_01_02 = null,
    ): self {
        $self = new self;

        null !== $_2025_01_01 && $self['_2025_01_01'] = $_2025_01_01;
        null !== $_2025_01_02 && $self['_2025_01_02'] = $_2025_01_02;

        return $self;
    }

    /**
     * @param _2025_01_01|_2025_01_01Shape $_2025_01_01
     */
    public function with2025_01_01(
        _2025_01_01|array $_2025_01_01,
    ): self {
        $self = clone $this;
        $self['_2025_01_01'] = $_2025_01_01;

        return $self;
    }

    /**
     * @param _2025_01_02|_2025_01_02Shape $_2025_01_02
     */
    public function with2025_01_02(
        _2025_01_02|array $_2025_01_02,
    ): self {
        $self = clone $this;
        $self['_2025_01_02'] = $_2025_01_02;

        return $self;
    }
}
