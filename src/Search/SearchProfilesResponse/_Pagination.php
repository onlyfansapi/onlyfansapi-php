<?php

declare(strict_types=1);

namespace Onlyfansapi\Search\SearchProfilesResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type _PaginationShape = array{
 *   nextPageURL?: string|null, totalResults?: int|null
 * }
 */
final class _Pagination implements BaseModel
{
    /** @use SdkModel<_PaginationShape> */
    use SdkModel;

    #[Optional('next_page_url')]
    public ?string $nextPageURL;

    #[Optional('total_results')]
    public ?int $totalResults;

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
        ?string $nextPageURL = null,
        ?int $totalResults = null
    ): self {
        $self = new self;

        null !== $nextPageURL && $self['nextPageURL'] = $nextPageURL;
        null !== $totalResults && $self['totalResults'] = $totalResults;

        return $self;
    }

    public function withNextPageURL(string $nextPageURL): self
    {
        $self = clone $this;
        $self['nextPageURL'] = $nextPageURL;

        return $self;
    }

    public function withTotalResults(int $totalResults): self
    {
        $self = clone $this;
        $self['totalResults'] = $totalResults;

        return $self;
    }
}
