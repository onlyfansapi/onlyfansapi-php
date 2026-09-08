<?php

declare(strict_types=1);

namespace OnlyFansAPI\TrialLinks;

use OnlyFansAPI\Core\Attributes\Optional;
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
 *   endDate?: string|null,
 *   field?: null|Field|value-of<Field>,
 *   limit?: int|null,
 *   offset?: int|null,
 *   sort?: null|Sort|value-of<Sort>,
 *   startDate?: string|null,
 *   synchronous?: bool|null,
 * }
 */
final class TrialLinkListParams implements BaseModel
{
    /** @use SdkModel<TrialLinkListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The end date for trial links. Keep empty to get all. Must not be greater than 255 characters.
     */
    #[Optional(nullable: true)]
    public ?string $endDate;

    /**
     * Field to sort by. Default `create_date`.
     *
     * @var value-of<Field>|null $field
     */
    #[Optional(enum: Field::class)]
    public ?string $field;

    /**
     * The number of trial links to return. Default `10`. Must be at least 1. Must not be greater than 100.
     */
    #[Optional]
    public ?int $limit;

    /**
     * The offset used for pagination. Default `0`. Must be at least 0.
     */
    #[Optional]
    public ?int $offset;

    /**
     * Sort direction. Default `desc`.
     *
     * @var value-of<Sort>|null $sort
     */
    #[Optional(enum: Sort::class)]
    public ?string $sort;

    /**
     * The start date for trial links. Keep empty to get all. Must not be greater than 255 characters.
     */
    #[Optional(nullable: true)]
    public ?string $startDate;

    /**
     * Wait for revenue calculation instead of processing it in the background.
     */
    #[Optional]
    public ?bool $synchronous;

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
        ?string $endDate = null,
        Field|string|null $field = null,
        ?int $limit = null,
        ?int $offset = null,
        Sort|string|null $sort = null,
        ?string $startDate = null,
        ?bool $synchronous = null,
    ): self {
        $self = new self;

        null !== $endDate && $self['endDate'] = $endDate;
        null !== $field && $self['field'] = $field;
        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;
        null !== $sort && $self['sort'] = $sort;
        null !== $startDate && $self['startDate'] = $startDate;
        null !== $synchronous && $self['synchronous'] = $synchronous;

        return $self;
    }

    /**
     * The end date for trial links. Keep empty to get all. Must not be greater than 255 characters.
     */
    public function withEndDate(?string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * Field to sort by. Default `create_date`.
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
     * The number of trial links to return. Default `10`. Must be at least 1. Must not be greater than 100.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * The offset used for pagination. Default `0`. Must be at least 0.
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * Sort direction. Default `desc`.
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
     * The start date for trial links. Keep empty to get all. Must not be greater than 255 characters.
     */
    public function withStartDate(?string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * Wait for revenue calculation instead of processing it in the background.
     */
    public function withSynchronous(bool $synchronous): self
    {
        $self = clone $this;
        $self['synchronous'] = $synchronous;

        return $self;
    }
}
