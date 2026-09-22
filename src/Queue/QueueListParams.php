<?php

declare(strict_types=1);

namespace OnlyFansAPI\Queue;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Queue\QueueListParams\Type;

/**
 * List scheduled posts and mass messages for a date range. Use the type filter to return only posts, messages, or both.
 *
 * @see OnlyFansAPI\Services\QueueService::list()
 *
 * @phpstan-type QueueListParamsShape = array{
 *   publishDateEnd: string,
 *   publishDateStart: string,
 *   timezone: string,
 *   limit?: int|null,
 *   type?: list<Type|value-of<Type>>|null,
 * }
 */
final class QueueListParams implements BaseModel
{
    /** @use SdkModel<QueueListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Latest publish date to return. Must be a valid date. Must be a valid date. Must be a date after or equal to <code>publishDateStart</code>.
     */
    #[Required]
    public string $publishDateEnd;

    /**
     * Earliest publish date to return (must be at least today). Must be a valid date. Must be a valid date. Must be a date after or equal to <code>today</code>.
     */
    #[Required]
    public string $publishDateStart;

    /**
     * Timezone of the provided dates. [View available timezone values](https://www.php.net/manual/en/timezones.php). Must be a valid time zone, such as <code>Africa/Accra</code>.
     */
    #[Required]
    public string $timezone;

    /**
     * Maximum number of queue items to return (default 20). Must be at least 1. Must not be greater than 100.
     */
    #[Optional]
    public ?int $limit;

    /** @var list<value-of<Type>>|null $type */
    #[Optional(list: Type::class)]
    public ?array $type;

    /**
     * `new QueueListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * QueueListParams::with(publishDateEnd: ..., publishDateStart: ..., timezone: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new QueueListParams)
     *   ->withPublishDateEnd(...)
     *   ->withPublishDateStart(...)
     *   ->withTimezone(...)
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
     *
     * @param list<Type|value-of<Type>>|null $type
     */
    public static function with(
        string $publishDateEnd,
        string $publishDateStart,
        string $timezone,
        ?int $limit = null,
        ?array $type = null,
    ): self {
        $self = new self;

        $self['publishDateEnd'] = $publishDateEnd;
        $self['publishDateStart'] = $publishDateStart;
        $self['timezone'] = $timezone;

        null !== $limit && $self['limit'] = $limit;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * Latest publish date to return. Must be a valid date. Must be a valid date. Must be a date after or equal to <code>publishDateStart</code>.
     */
    public function withPublishDateEnd(string $publishDateEnd): self
    {
        $self = clone $this;
        $self['publishDateEnd'] = $publishDateEnd;

        return $self;
    }

    /**
     * Earliest publish date to return (must be at least today). Must be a valid date. Must be a valid date. Must be a date after or equal to <code>today</code>.
     */
    public function withPublishDateStart(string $publishDateStart): self
    {
        $self = clone $this;
        $self['publishDateStart'] = $publishDateStart;

        return $self;
    }

    /**
     * Timezone of the provided dates. [View available timezone values](https://www.php.net/manual/en/timezones.php). Must be a valid time zone, such as <code>Africa/Accra</code>.
     */
    public function withTimezone(string $timezone): self
    {
        $self = clone $this;
        $self['timezone'] = $timezone;

        return $self;
    }

    /**
     * Maximum number of queue items to return (default 20). Must be at least 1. Must not be greater than 100.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * @param list<Type|value-of<Type>> $type
     */
    public function withType(array $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
