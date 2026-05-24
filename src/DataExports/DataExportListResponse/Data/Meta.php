<?php

declare(strict_types=1);

namespace Onlyfansapi\DataExports\DataExportListResponse\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetaShape = array{
 *   currentPage?: int|null,
 *   lastPage?: int|null,
 *   perPage?: int|null,
 *   total?: int|null,
 * }
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    #[Optional('current_page')]
    public ?int $currentPage;

    #[Optional('last_page')]
    public ?int $lastPage;

    #[Optional('per_page')]
    public ?int $perPage;

    #[Optional]
    public ?int $total;

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
        ?int $currentPage = null,
        ?int $lastPage = null,
        ?int $perPage = null,
        ?int $total = null,
    ): self {
        $self = new self;

        null !== $currentPage && $self['currentPage'] = $currentPage;
        null !== $lastPage && $self['lastPage'] = $lastPage;
        null !== $perPage && $self['perPage'] = $perPage;
        null !== $total && $self['total'] = $total;

        return $self;
    }

    public function withCurrentPage(int $currentPage): self
    {
        $self = clone $this;
        $self['currentPage'] = $currentPage;

        return $self;
    }

    public function withLastPage(int $lastPage): self
    {
        $self = clone $this;
        $self['lastPage'] = $lastPage;

        return $self;
    }

    public function withPerPage(int $perPage): self
    {
        $self = clone $this;
        $self['perPage'] = $perPage;

        return $self;
    }

    public function withTotal(int $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }
}
