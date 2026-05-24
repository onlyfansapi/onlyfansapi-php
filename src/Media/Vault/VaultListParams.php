<?php

declare(strict_types=1);

namespace Onlyfansapi\Media\Vault;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Media\Vault\VaultListParams\Field;
use Onlyfansapi\Media\Vault\VaultListParams\Sort;
use Onlyfansapi\Media\Vault\VaultListParams\Type;

/**
 * List media items stored in your vault. See how many likes and how much tips did they get.
 *
 * @see Onlyfansapi\Services\Media\VaultService::list()
 *
 * @phpstan-type VaultListParamsShape = array{
 *   field?: null|Field|value-of<Field>,
 *   limit?: int|null,
 *   list?: int|null,
 *   offset?: int|null,
 *   query?: string|null,
 *   sort?: null|Sort|value-of<Sort>,
 *   type?: null|Type|value-of<Type>,
 * }
 */
final class VaultListParams implements BaseModel
{
    /** @use SdkModel<VaultListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Sort the results by a field. Default `recent`.
     *
     * @var value-of<Field>|null $field
     */
    #[Optional(enum: Field::class)]
    public ?string $field;

    /**
     * Number of media to return per page (10 - 100). Default: `24`.
     */
    #[Optional]
    public ?int $limit;

    /**
     * Only show media items from a specific list (category). **Refer to our Media Vault Lists endpoints.**.
     */
    #[Optional]
    public ?int $list;

    /**
     * The offset used for pagination. Default `0`.
     */
    #[Optional]
    public ?int $offset;

    /**
     * Optionally, search for a text query.
     */
    #[Optional(nullable: true)]
    public ?string $query;

    /**
     * Sort the results. Default `desc`.
     *
     * @var value-of<Sort>|null $sort
     */
    #[Optional(enum: Sort::class)]
    public ?string $sort;

    /**
     * Filter the results by a media type. Keep empty to show all media.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
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
     * @param Field|value-of<Field>|null $field
     * @param Sort|value-of<Sort>|null $sort
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        Field|string|null $field = null,
        ?int $limit = null,
        ?int $list = null,
        ?int $offset = null,
        ?string $query = null,
        Sort|string|null $sort = null,
        Type|string|null $type = null,
    ): self {
        $self = new self;

        null !== $field && $self['field'] = $field;
        null !== $limit && $self['limit'] = $limit;
        null !== $list && $self['list'] = $list;
        null !== $offset && $self['offset'] = $offset;
        null !== $query && $self['query'] = $query;
        null !== $sort && $self['sort'] = $sort;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * Sort the results by a field. Default `recent`.
     *
     * @param Field|value-of<Field> $field
     */
    public function withField(Field|string $field): self
    {
        $self = clone $this;
        $self['field'] = $field;

        return $self;
    }

    /**
     * Number of media to return per page (10 - 100). Default: `24`.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Only show media items from a specific list (category). **Refer to our Media Vault Lists endpoints.**.
     */
    public function withList(int $list): self
    {
        $self = clone $this;
        $self['list'] = $list;

        return $self;
    }

    /**
     * The offset used for pagination. Default `0`.
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * Optionally, search for a text query.
     */
    public function withQuery(?string $query): self
    {
        $self = clone $this;
        $self['query'] = $query;

        return $self;
    }

    /**
     * Sort the results. Default `desc`.
     *
     * @param Sort|value-of<Sort> $sort
     */
    public function withSort(Sort|string $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }

    /**
     * Filter the results by a media type. Keep empty to show all media.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
