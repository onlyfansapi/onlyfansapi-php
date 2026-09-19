<?php

declare(strict_types=1);

namespace OnlyFansAPI\Posts;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Show the statistics of a post like purchases, views, likes, tips and more.
 *
 * @see OnlyFansAPI\Services\PostsService::stats()
 *
 * @phpstan-type PostStatsParamsShape = array{
 *   account: string, withHistoricalData?: bool|null
 * }
 */
final class PostStatsParams implements BaseModel
{
    /** @use SdkModel<PostStatsParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * Set to `true` to include historical data for a post.
     */
    #[Optional]
    public ?bool $withHistoricalData;

    /**
     * `new PostStatsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PostStatsParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PostStatsParams)->withAccount(...)
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
        string $account,
        ?bool $withHistoricalData = null
    ): self {
        $self = new self;

        $self['account'] = $account;

        null !== $withHistoricalData && $self['withHistoricalData'] = $withHistoricalData;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }

    /**
     * Set to `true` to include historical data for a post.
     */
    public function withWithHistoricalData(bool $withHistoricalData): self
    {
        $self = clone $this;
        $self['withHistoricalData'] = $withHistoricalData;

        return $self;
    }
}
