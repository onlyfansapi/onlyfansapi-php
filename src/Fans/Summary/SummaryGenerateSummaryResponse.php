<?php

declare(strict_types=1);

namespace Onlyfansapi\Fans\Summary;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type SummaryGenerateSummaryResponseShape = array{
 *   message?: string|null, status?: string|null
 * }
 */
final class SummaryGenerateSummaryResponse implements BaseModel
{
    /** @use SdkModel<SummaryGenerateSummaryResponseShape> */
    use SdkModel;

    #[Optional]
    public ?string $message;

    #[Optional]
    public ?string $status;

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
        ?string $message = null,
        ?string $status = null
    ): self {
        $self = new self;

        null !== $message && $self['message'] = $message;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
