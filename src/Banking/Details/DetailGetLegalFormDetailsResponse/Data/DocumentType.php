<?php

declare(strict_types=1);

namespace Onlyfansapi\Banking\Details\DetailGetLegalFormDetailsResponse\Data;

use Onlyfansapi\Banking\Details\DetailGetLegalFormDetailsResponse\Data\DocumentType\Value;
use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ValueShape from \Onlyfansapi\Banking\Details\DetailGetLegalFormDetailsResponse\Data\DocumentType\Value
 *
 * @phpstan-type DocumentTypeShape = array{values?: list<Value|ValueShape>|null}
 */
final class DocumentType implements BaseModel
{
    /** @use SdkModel<DocumentTypeShape> */
    use SdkModel;

    /** @var list<Value>|null $values */
    #[Optional(list: Value::class)]
    public ?array $values;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Value|ValueShape>|null $values
     */
    public static function with(?array $values = null): self
    {
        $self = new self;

        null !== $values && $self['values'] = $values;

        return $self;
    }

    /**
     * @param list<Value|ValueShape> $values
     */
    public function withValues(array $values): self
    {
        $self = clone $this;
        $self['values'] = $values;

        return $self;
    }
}
