<?php

declare(strict_types=1);

namespace Onlyfansapi\Stored\StoredListTrialLinksResponse\Data\List_;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Stored\StoredListTrialLinksResponse\Data\List_\Links\Related;

/**
 * @phpstan-import-type RelatedShape from \Onlyfansapi\Stored\StoredListTrialLinksResponse\Data\List_\Links\Related
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
