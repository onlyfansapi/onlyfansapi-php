<?php

declare(strict_types=1);

namespace Onlyfansapi\MassMessaging;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\MassMessaging\MassMessagingListStatisticsParams\Type;

/**
 * List mass messaging statistics, showing the send count and view count.
 *
 * @see Onlyfansapi\Services\MassMessagingService::listStatistics()
 *
 * @phpstan-type MassMessagingListStatisticsParamsShape = array{
 *   limit?: int|null,
 *   offset?: int|null,
 *   query?: string|null,
 *   type?: null|Type|value-of<Type>,
 * }
 */
final class MassMessagingListStatisticsParams implements BaseModel
{
    /** @use SdkModel<MassMessagingListStatisticsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Number of mass messages to return (default = 20).
     */
    #[Optional]
    public ?int $limit;

    /**
     * Number of mass messages to skip for pagination.
     */
    #[Optional]
    public ?int $offset;

    /**
     * Optionally, find a mass message by the message text.
     */
    #[Optional]
    public ?string $query;

    /**
     * Filter by sent / scheduled / unsent (default = sent).
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        ?int $limit = null,
        ?int $offset = null,
        ?string $query = null,
        Type|string|null $type = null,
    ): self {
        $self = new self;

        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;
        null !== $query && $self['query'] = $query;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * Number of mass messages to return (default = 20).
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Number of mass messages to skip for pagination.
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * Optionally, find a mass message by the message text.
     */
    public function withQuery(string $query): self
    {
        $self = clone $this;
        $self['query'] = $query;

        return $self;
    }

    /**
     * Filter by sent / scheduled / unsent (default = sent).
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
