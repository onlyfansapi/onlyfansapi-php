<?php

declare(strict_types=1);

namespace Onlyfansapi\Fans\FanListAllResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type _PaginationShape = array{nextPage?: string|null}
 */
final class _Pagination implements BaseModel
{
    /** @use SdkModel<_PaginationShape> */
    use SdkModel;

    #[Optional('next_page', nullable: true)]
    public ?string $nextPage;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $nextPage = null): self
    {
        $self = new self;

        null !== $nextPage && $self['nextPage'] = $nextPage;

        return $self;
    }

    public function withNextPage(?string $nextPage): self
    {
        $self = clone $this;
        $self['nextPage'] = $nextPage;

        return $self;
    }
}
