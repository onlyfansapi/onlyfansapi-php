<?php

declare(strict_types=1);

namespace OnlyFansAPI\Me\MeGetTopPercentageResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   message?: string|null, topPercentage?: float|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional(nullable: true)]
    public ?string $message;

    #[Optional('top_percentage')]
    public ?float $topPercentage;

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
        ?float $topPercentage = null
    ): self {
        $self = new self;

        null !== $message && $self['message'] = $message;
        null !== $topPercentage && $self['topPercentage'] = $topPercentage;

        return $self;
    }

    public function withMessage(?string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }

    public function withTopPercentage(float $topPercentage): self
    {
        $self = clone $this;
        $self['topPercentage'] = $topPercentage;

        return $self;
    }
}
