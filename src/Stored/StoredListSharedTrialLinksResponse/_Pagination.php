<?php

declare(strict_types=1);

namespace OnlyFansAPI\Stored\StoredListSharedTrialLinksResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type _PaginationShape = array{
 *   nextPage?: string|null, notice?: string|null
 * }
 */
final class _Pagination implements BaseModel
{
    /** @use SdkModel<_PaginationShape> */
    use SdkModel;

    #[Optional('next_page', nullable: true)]
    public ?string $nextPage;

    #[Optional(nullable: true)]
    public ?string $notice;

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
        ?string $nextPage = null,
        ?string $notice = null
    ): self {
        $self = new self;

        null !== $nextPage && $self['nextPage'] = $nextPage;
        null !== $notice && $self['notice'] = $notice;

        return $self;
    }

    public function withNextPage(?string $nextPage): self
    {
        $self = clone $this;
        $self['nextPage'] = $nextPage;

        return $self;
    }

    public function withNotice(?string $notice): self
    {
        $self = clone $this;
        $self['notice'] = $notice;

        return $self;
    }
}
