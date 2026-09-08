<?php

declare(strict_types=1);

namespace OnlyFansAPI\Posts\Labels;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * List the labels that you can use to organize your posts.
 *
 * @see OnlyFansAPI\Services\Posts\LabelsService::list()
 *
 * @phpstan-type LabelListParamsShape = array{
 *   limit?: string|null, offset?: string|null
 * }
 */
final class LabelListParams implements BaseModel
{
    /** @use SdkModel<LabelListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Number of labels to return (default = 10).
     */
    #[Optional]
    public ?string $limit;

    /**
     * Number of labels to skip for pagination.
     */
    #[Optional]
    public ?string $offset;

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
        ?string $limit = null,
        ?string $offset = null
    ): self {
        $self = new self;

        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;

        return $self;
    }

    /**
     * Number of labels to return (default = 10).
     */
    public function withLimit(string $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Number of labels to skip for pagination.
     */
    public function withOffset(string $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }
}
