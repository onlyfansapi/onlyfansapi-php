<?php

declare(strict_types=1);

namespace OnlyFansAPI\Engagement\Messages;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Get the top performing message by purchases in the selected timeframe.
 *
 * @see OnlyFansAPI\Services\Engagement\MessagesService::getTopMessage()
 *
 * @phpstan-type MessageGetTopMessageParamsShape = array{
 *   endDate?: string|null, startDate?: string|null
 * }
 */
final class MessageGetTopMessageParams implements BaseModel
{
    /** @use SdkModel<MessageGetTopMessageParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The end date for the period. Keep empty to retrieve until now. MUST BE DATE AFTER `startDate`.
     */
    #[Optional]
    public ?string $endDate;

    /**
     * The start date for the period. Keep empty to retrieve from the model start date.
     */
    #[Optional]
    public ?string $startDate;

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
        ?string $endDate = null,
        ?string $startDate = null
    ): self {
        $self = new self;

        null !== $endDate && $self['endDate'] = $endDate;
        null !== $startDate && $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * The end date for the period. Keep empty to retrieve until now. MUST BE DATE AFTER `startDate`.
     */
    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * The start date for the period. Keep empty to retrieve from the model start date.
     */
    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }
}
