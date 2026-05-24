<?php

declare(strict_types=1);

namespace Onlyfansapi\Queue;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * List posts and messages in the queue.
 *
 * @see Onlyfansapi\Services\QueueService::list()
 *
 * @phpstan-type QueueListParamsShape = array{
 *   limit: int, publishDateEnd: string, publishDateStart: string, timezone: string
 * }
 */
final class QueueListParams implements BaseModel
{
    /** @use SdkModel<QueueListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Maximum number of queue items to return (default = 20).
     */
    #[Required]
    public int $limit;

    /**
     * Latest publish date to return.
     */
    #[Required]
    public string $publishDateEnd;

    /**
     * Earliest publish date to return (must be at least today).
     */
    #[Required]
    public string $publishDateStart;

    /**
     * Time timezone of the provided dates. [View available timezone values](https://www.php.net/manual/en/timezones.php).
     */
    #[Required]
    public string $timezone;

    /**
     * `new QueueListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * QueueListParams::with(
     *   limit: ..., publishDateEnd: ..., publishDateStart: ..., timezone: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new QueueListParams)
     *   ->withLimit(...)
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
     */
    public static function with(
        int $limit,
        string $publishDateEnd,
        string $publishDateStart,
        string $timezone,
    ): self {
        $self = new self;

        $self['limit'] = $limit;
        $self['publishDateEnd'] = $publishDateEnd;
        $self['publishDateStart'] = $publishDateStart;
        $self['timezone'] = $timezone;

        return $self;
    }

    /**
     * Maximum number of queue items to return (default = 20).
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Latest publish date to return.
     */
    public function withPublishDateEnd(string $publishDateEnd): self
    {
        $self = clone $this;
        $self['publishDateEnd'] = $publishDateEnd;

        return $self;
    }

    /**
     * Earliest publish date to return (must be at least today).
     */
    public function withPublishDateStart(string $publishDateStart): self
    {
        $self = clone $this;
        $self['publishDateStart'] = $publishDateStart;

        return $self;
    }

    /**
     * Time timezone of the provided dates. [View available timezone values](https://www.php.net/manual/en/timezones.php).
     */
    public function withTimezone(string $timezone): self
    {
        $self = clone $this;
        $self['timezone'] = $timezone;

        return $self;
    }
}
