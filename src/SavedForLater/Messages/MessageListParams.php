<?php

declare(strict_types=1);

namespace OnlyFansAPI\SavedForLater\Messages;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * List all messages that are marked as "Save For Later".
 *
 * @see OnlyFansAPI\Services\SavedForLater\MessagesService::list()
 *
 * @phpstan-type MessageListParamsShape = array{limit: int, offset: int}
 */
final class MessageListParams implements BaseModel
{
    /** @use SdkModel<MessageListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Maximum number of messages to return (default = 10).
     */
    #[Required]
    public int $limit;

    /**
     * Offset for pagination (default = 0).
     */
    #[Required]
    public int $offset;

    /**
     * `new MessageListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessageListParams::with(limit: ..., offset: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessageListParams)->withLimit(...)->withOffset(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(int $limit, int $offset): self
    {
        $self = new self;

        $self['limit'] = $limit;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * Maximum number of messages to return (default = 10).
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Offset for pagination (default = 0).
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }
}
