<?php

declare(strict_types=1);

namespace OnlyFansAPI\Stored\StoredListSharedTrialLinksParams;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type FilterShape = array{
 *   search?: string|null, tags?: list<string>|null
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Must not be greater than 255 characters.
     */
    #[Optional(nullable: true)]
    public ?string $search;

    /**
     * Must not be greater than 50 characters.
     *
     * @var list<string>|null $tags
     */
    #[Optional(list: 'string')]
    public ?array $tags;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $tags
     */
    public static function with(
        ?string $search = null,
        ?array $tags = null
    ): self {
        $self = new self;

        null !== $search && $self['search'] = $search;
        null !== $tags && $self['tags'] = $tags;

        return $self;
    }

    /**
     * Must not be greater than 255 characters.
     */
    public function withSearch(?string $search): self
    {
        $self = clone $this;
        $self['search'] = $search;

        return $self;
    }

    /**
     * Must not be greater than 50 characters.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }
}
