<?php

declare(strict_types=1);

namespace OnlyFansAPI\Statistics\Statements;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Statistics\Statements\StatementGetEarningsParams\Type;

/**
 * Get the earnings for a given period.
 *
 * @see OnlyFansAPI\Services\Statistics\StatementsService::getEarnings()
 *
 * @phpstan-type StatementGetEarningsParamsShape = array{
 *   endDate: string, startDate: string, type?: null|Type|value-of<Type>
 * }
 */
final class StatementGetEarningsParams implements BaseModel
{
    /** @use SdkModel<StatementGetEarningsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The end date for the period.
     */
    #[Required]
    public string $endDate;

    /**
     * The start date for the period.
     */
    #[Required]
    public string $startDate;

    /**
     * Filter by All / Subscriptions / Tips / Posts / Messages / Streams.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    /**
     * `new StatementGetEarningsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StatementGetEarningsParams::with(endDate: ..., startDate: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StatementGetEarningsParams)->withEndDate(...)->withStartDate(...)
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
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        string $endDate,
        string $startDate,
        Type|string|null $type = null
    ): self {
        $self = new self;

        $self['endDate'] = $endDate;
        $self['startDate'] = $startDate;

        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * The end date for the period.
     */
    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * The start date for the period.
     */
    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * Filter by All / Subscriptions / Tips / Posts / Messages / Streams.
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
