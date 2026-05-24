<?php

declare(strict_types=1);

namespace Onlyfansapi\Stories;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Retrieve the list of viewers for a specific story by its ID.
 *
 * @see Onlyfansapi\Services\StoriesService::listViewers()
 *
 * @phpstan-type StoryListViewersParamsShape = array{
 *   account: string, limit?: int|null, offset?: int|null
 * }
 */
final class StoryListViewersParams implements BaseModel
{
    /** @use SdkModel<StoryListViewersParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * The number of story viewers to return. Default `8`.
     */
    #[Optional(nullable: true)]
    public ?int $limit;

    /**
     * The offset used for pagination. Default `0`.
     */
    #[Optional(nullable: true)]
    public ?int $offset;

    /**
     * `new StoryListViewersParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StoryListViewersParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StoryListViewersParams)->withAccount(...)
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
        ?int $limit = null,
        ?int $offset = null
    ): self {
        $self = new self;

        $self['account'] = $account;

        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }

    /**
     * The number of story viewers to return. Default `8`.
     */
    public function withLimit(?int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * The offset used for pagination. Default `0`.
     */
    public function withOffset(?int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }
}
