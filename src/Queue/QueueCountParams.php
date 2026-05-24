<?php

declare(strict_types=1);

namespace Onlyfansapi\Queue;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Count posts and messages in the queue.
 *
 * @see Onlyfansapi\Services\QueueService::count()
 *
 * @phpstan-type QueueCountParamsShape = array{
 *   publishDateEnd: string, publishDateStart: string, timezone: string
 * }
 */
final class QueueCountParams implements BaseModel
{
    /** @use SdkModel<QueueCountParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Latest publish date to count to.
     */
    #[Required]
    public string $publishDateEnd;

    /**
     * Earliest publish date to count from (must be at least today).
     */
    #[Required]
    public string $publishDateStart;

    /**
     * Time timezone of the provided dates. [View available timezone values](https://www.php.net/manual/en/timezones.php).
     */
    #[Required]
    public string $timezone;

    /**
     * `new QueueCountParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * QueueCountParams::with(
     *   publishDateEnd: ..., publishDateStart: ..., timezone: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new QueueCountParams)
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
        string $publishDateEnd,
        string $publishDateStart,
        string $timezone
    ): self {
        $self = new self;

        $self['publishDateEnd'] = $publishDateEnd;
        $self['publishDateStart'] = $publishDateStart;
        $self['timezone'] = $timezone;

        return $self;
    }

    /**
     * Latest publish date to count to.
     */
    public function withPublishDateEnd(string $publishDateEnd): self
    {
        $self = clone $this;
        $self['publishDateEnd'] = $publishDateEnd;

        return $self;
    }

    /**
     * Earliest publish date to count from (must be at least today).
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
