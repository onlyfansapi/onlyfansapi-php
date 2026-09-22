<?php

declare(strict_types=1);

namespace OnlyFansAPI\Queue\QueueListResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Queue\QueueListResponse\Data\List_;

/**
 * @phpstan-import-type ListShape from \OnlyFansAPI\Queue\QueueListResponse\Data\List_
 *
 * @phpstan-type DataShape = array{
 *   list?: list<List_|ListShape>|null, syncInProcess?: bool|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /** @var list<List_>|null $list */
    #[Optional(list: List_::class)]
    public ?array $list;

    #[Optional]
    public ?bool $syncInProcess;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<List_|ListShape>|null $list
     */
    public static function with(
        ?array $list = null,
        ?bool $syncInProcess = null
    ): self {
        $self = new self;

        null !== $list && $self['list'] = $list;
        null !== $syncInProcess && $self['syncInProcess'] = $syncInProcess;

        return $self;
    }

    /**
     * @param list<List_|ListShape> $list
     */
    public function withList(array $list): self
    {
        $self = clone $this;
        $self['list'] = $list;

        return $self;
    }

    public function withSyncInProcess(bool $syncInProcess): self
    {
        $self = clone $this;
        $self['syncInProcess'] = $syncInProcess;

        return $self;
    }
}
