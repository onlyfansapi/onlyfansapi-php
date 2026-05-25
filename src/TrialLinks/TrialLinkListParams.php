<?php

declare(strict_types=1);

namespace OnlyFansAPI\TrialLinks;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\TrialLinks\TrialLinkListParams\Field;
use OnlyFansAPI\TrialLinks\TrialLinkListParams\Sort;

/**
 * List all free trial links for the account, including the details and statistics.
 *
 * @see OnlyFansAPI\Services\TrialLinksService::list()
 *
 * @phpstan-type TrialLinkListParamsShape = array{
 *   limit: int,
 *   offset: int,
 *   field?: null|Field|value-of<Field>,
 *   sort?: null|Sort|value-of<Sort>,
 *   synchronous?: bool|null,
 * }
 */
final class TrialLinkListParams implements BaseModel
{
    /** @use SdkModel<TrialLinkListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The number of trial links to return. Default `10`.
     */
    #[Required]
    public int $limit;

    /**
     * The offset used for pagination. Default `0`.
     */
    #[Required]
    public int $offset;

    /**
     * Sort the results by a field. Default `create_date`.
     *
     * @var value-of<Field>|null $field
     */
    #[Optional(enum: Field::class, nullable: true)]
    public ?string $field;

    /**
     * Sort the results. Default `desc`.
     *
     * @var value-of<Sort>|null $sort
     */
    #[Optional(enum: Sort::class, nullable: true)]
    public ?string $sort;

    /**
     * Wait for the revenue data to finish processing, instead of processing in the background. **Will result in longer response times, use with caution**. Default `false`.
     */
    #[Optional(nullable: true)]
    public ?bool $synchronous;

    /**
     * `new TrialLinkListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TrialLinkListParams::with(limit: ..., offset: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TrialLinkListParams)->withLimit(...)->withOffset(...)
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
     *
     * @param Field|value-of<Field>|null $field
     * @param Sort|value-of<Sort>|null $sort
     */
    public static function with(
        int $limit,
        int $offset,
        Field|string|null $field = null,
        Sort|string|null $sort = null,
        ?bool $synchronous = null,
    ): self {
        $self = new self;

        $self['limit'] = $limit;
        $self['offset'] = $offset;

        null !== $field && $self['field'] = $field;
        null !== $sort && $self['sort'] = $sort;
        null !== $synchronous && $self['synchronous'] = $synchronous;

        return $self;
    }

    /**
     * The number of trial links to return. Default `10`.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

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
     * Sort the results by a field. Default `create_date`.
     *
     * @param Field|value-of<Field>|null $field
     */
    public function withField(Field|string|null $field): self
    {
        $self = clone $this;
        $self['field'] = $field;

        return $self;
    }

    /**
     * Sort the results. Default `desc`.
     *
     * @param Sort|value-of<Sort>|null $sort
     */
    public function withSort(Sort|string|null $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }

    /**
     * Wait for the revenue data to finish processing, instead of processing in the background. **Will result in longer response times, use with caution**. Default `false`.
     */
    public function withSynchronous(?bool $synchronous): self
    {
        $self = clone $this;
        $self['synchronous'] = $synchronous;

        return $self;
    }
}
