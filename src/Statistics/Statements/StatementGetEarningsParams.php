<?php

declare(strict_types=1);

namespace Onlyfansapi\Statistics\Statements;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Statistics\Statements\StatementGetEarningsParams\Type;

/**
 * Get the earnings for a given period.
 *
 * @see Onlyfansapi\Services\Statistics\StatementsService::getEarnings()
 *
 * @phpstan-type StatementGetEarningsParamsShape = array{
 *   startDate: string, endDate?: string|null, type?: null|Type|value-of<Type>
 * }
 */
final class StatementGetEarningsParams implements BaseModel
{
    /** @use SdkModel<StatementGetEarningsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The start date for the period.
     */
    #[Required]
    public string $startDate;

    /**
     * The end date for the period.
     */
    #[Optional]
    public ?string $endDate;

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
     * StatementGetEarningsParams::with(startDate: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StatementGetEarningsParams)->withStartDate(...)
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
        string $startDate,
        ?string $endDate = null,
        Type|string|null $type = null
    ): self {
        $self = new self;

        $self['startDate'] = $startDate;

        null !== $endDate && $self['endDate'] = $endDate;
        null !== $type && $self['type'] = $type;

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
     * The end date for the period.
     */
    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

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
