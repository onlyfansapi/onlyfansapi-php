<?php

declare(strict_types=1);

namespace Onlyfansapi\Stories;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Retrieve viewer count, likes count, comments count, and tips statistics for a specific story by its ID.
 *
 * @see Onlyfansapi\Services\StoriesService::retrieveStats()
 *
 * @phpstan-type StoryRetrieveStatsParamsShape = array{account: string}
 */
final class StoryRetrieveStatsParams implements BaseModel
{
    /** @use SdkModel<StoryRetrieveStatsParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new StoryRetrieveStatsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StoryRetrieveStatsParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StoryRetrieveStatsParams)->withAccount(...)
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
