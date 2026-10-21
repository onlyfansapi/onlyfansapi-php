<?php

declare(strict_types=1);

namespace OnlyFansAPI\Stored\StoredListTrialLinksResponse\Data\List_;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Stored\StoredListTrialLinksResponse\Data\List_\Links\Related;

/**
 * @phpstan-import-type RelatedShape from \OnlyFansAPI\Stored\StoredListTrialLinksResponse\Data\List_\Links\Related
 *
 * @phpstan-type LinksShape = array{related?: null|Related|RelatedShape}
 */
final class Links implements BaseModel
{
    /** @use SdkModel<LinksShape> */
    use SdkModel;

    #[Optional]
    public ?Related $related;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Related|RelatedShape|null $related
     */
    public static function with(Related|array|null $related = null): self
    {
        $self = new self;

        null !== $related && $self['related'] = $related;

        return $self;
    }

    /**
     * @param Related|RelatedShape $related
     */
    public function withRelated(Related|array $related): self
    {
        $self = clone $this;
        $self['related'] = $related;

        return $self;
    }
}
