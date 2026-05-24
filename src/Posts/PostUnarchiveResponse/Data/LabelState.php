<?php

declare(strict_types=1);

namespace Onlyfansapi\Posts\PostUnarchiveResponse\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type LabelStateShape = array{
 *   id?: string|null,
 *   isClearInProgress?: bool|null,
 *   name?: string|null,
 *   posts?: list<mixed>|null,
 *   postsCount?: int|null,
 *   type?: string|null,
 * }
 */
final class LabelState implements BaseModel
{
    /** @use SdkModel<LabelStateShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional]
    public ?bool $isClearInProgress;

    #[Optional]
    public ?string $name;

    /** @var list<mixed>|null $posts */
    #[Optional(list: 'mixed')]
    public ?array $posts;

    #[Optional]
    public ?int $postsCount;

    #[Optional]
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
     * @param list<mixed>|null $posts
     */
    public static function with(
        ?string $id = null,
        ?bool $isClearInProgress = null,
        ?string $name = null,
        ?array $posts = null,
        ?int $postsCount = null,
        ?string $type = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $isClearInProgress && $self['isClearInProgress'] = $isClearInProgress;
        null !== $name && $self['name'] = $name;
        null !== $posts && $self['posts'] = $posts;
        null !== $postsCount && $self['postsCount'] = $postsCount;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withIsClearInProgress(bool $isClearInProgress): self
    {
        $self = clone $this;
        $self['isClearInProgress'] = $isClearInProgress;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param list<mixed> $posts
     */
    public function withPosts(array $posts): self
    {
        $self = clone $this;
        $self['posts'] = $posts;

        return $self;
    }

    public function withPostsCount(int $postsCount): self
    {
        $self = clone $this;
        $self['postsCount'] = $postsCount;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
