<?php

declare(strict_types=1);

namespace Onlyfansapi\MassMessaging\MassMessagingDeleteResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\MassMessaging\MassMessagingDeleteResponse\Data\Queue;

/**
 * @phpstan-import-type QueueShape from \Onlyfansapi\MassMessaging\MassMessagingDeleteResponse\Data\Queue
 *
 * @phpstan-type DataShape = array{
 *   queue?: null|Queue|QueueShape, success?: bool|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?Queue $queue;

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
     *
     * @param Queue|QueueShape|null $queue
     */
    public static function with(
        Queue|array|null $queue = null,
        ?bool $success = null
    ): self {
        $self = new self;

        null !== $queue && $self['queue'] = $queue;
        null !== $success && $self['success'] = $success;

        return $self;
    }

    /**
     * @param Queue|QueueShape $queue
     */
    public function withQueue(Queue|array $queue): self
    {
        $self = clone $this;
        $self['queue'] = $queue;

        return $self;
    }

    public function withSuccess(bool $success): self
    {
        $self = clone $this;
        $self['success'] = $success;

        return $self;
    }
}
