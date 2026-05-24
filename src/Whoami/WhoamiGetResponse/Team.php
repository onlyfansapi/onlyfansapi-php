<?php

declare(strict_types=1);

namespace Onlyfansapi\Whoami\WhoamiGetResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type TeamShape = array{name?: string|null, slug?: string|null}
 */
final class Team implements BaseModel
{
    /** @use SdkModel<TeamShape> */
    use SdkModel;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?string $slug;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $name = null, ?string $slug = null): self
    {
        $self = new self;

        null !== $name && $self['name'] = $name;
        null !== $slug && $self['slug'] = $slug;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withSlug(string $slug): self
    {
        $self = clone $this;
        $self['slug'] = $slug;

        return $self;
    }
}
