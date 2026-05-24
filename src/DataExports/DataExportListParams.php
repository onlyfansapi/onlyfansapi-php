<?php

declare(strict_types=1);

namespace Onlyfansapi\DataExports;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\DataExports\DataExportListParams\Status;
use Onlyfansapi\DataExports\DataExportListParams\Type;

/**
 * Get a paginated list of data exports for the team.
 *
 * @see Onlyfansapi\Services\DataExportsService::list()
 *
 * @phpstan-type DataExportListParamsShape = array{
 *   downloadURLExpiresIn?: int|null,
 *   page?: int|null,
 *   perPage?: int|null,
 *   status?: null|Status|value-of<Status>,
 *   type?: null|Type|value-of<Type>,
 * }
 */
final class DataExportListParams implements BaseModel
{
    /** @use SdkModel<DataExportListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Number of minutes until download URLs expire. Min `1`, max `60`, default `5`.
     */
    #[Optional]
    public ?int $downloadURLExpiresIn;

    /**
     * Page number for pagination. Default `1`.
     */
    #[Optional]
    public ?int $page;

    /**
     * Number of results per page. Default `15`, max `100`.
     */
    #[Optional]
    public ?int $perPage;

    /**
     * Filter by status.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * Filter by export type.
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
     * @param Status|value-of<Status>|null $status
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        ?int $downloadURLExpiresIn = null,
        ?int $page = null,
        ?int $perPage = null,
        Status|string|null $status = null,
        Type|string|null $type = null,
    ): self {
        $self = new self;

        null !== $downloadURLExpiresIn && $self['downloadURLExpiresIn'] = $downloadURLExpiresIn;
        null !== $page && $self['page'] = $page;
        null !== $perPage && $self['perPage'] = $perPage;
        null !== $status && $self['status'] = $status;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * Number of minutes until download URLs expire. Min `1`, max `60`, default `5`.
     */
    public function withDownloadURLExpiresIn(int $downloadURLExpiresIn): self
    {
        $self = clone $this;
        $self['downloadURLExpiresIn'] = $downloadURLExpiresIn;

        return $self;
    }

    /**
     * Page number for pagination. Default `1`.
     */
    public function withPage(int $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }

    /**
     * Number of results per page. Default `15`, max `100`.
     */
    public function withPerPage(int $perPage): self
    {
        $self = clone $this;
        $self['perPage'] = $perPage;

        return $self;
    }

    /**
     * Filter by status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Filter by export type.
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
