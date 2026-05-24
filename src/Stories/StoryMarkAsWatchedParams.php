<?php

declare(strict_types=1);

namespace Onlyfansapi\Stories;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Mark a specific story as watched by its ID.
 *
 * @see Onlyfansapi\Services\StoriesService::markAsWatched()
 *
 * @phpstan-type StoryMarkAsWatchedParamsShape = array{account: string}
 */
final class StoryMarkAsWatchedParams implements BaseModel
{
    /** @use SdkModel<StoryMarkAsWatchedParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new StoryMarkAsWatchedParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StoryMarkAsWatchedParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StoryMarkAsWatchedParams)->withAccount(...)
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
    public static function with(string $account): self
    {
        $self = new self;

        $self['account'] = $account;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }
}
