<?php

declare(strict_types=1);

namespace OnlyFansAPI\MassMessaging\MassMessagingSendResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: int|null,
 *   canUnsend?: bool|null,
 *   date?: string|null,
 *   hasError?: bool|null,
 *   isCanceled?: bool|null,
 *   isCouplePeopleMedia?: bool|null,
 *   isDone?: bool|null,
 *   isReady?: bool|null,
 *   pending?: int|null,
 *   total?: int|null,
 *   unsendSeconds?: int|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?bool $canUnsend;

    #[Optional]
    public ?string $date;

    #[Optional]
    public ?bool $hasError;

    #[Optional]
    public ?bool $isCanceled;

    #[Optional]
    public ?bool $isCouplePeopleMedia;

    #[Optional]
    public ?bool $isDone;

    #[Optional]
    public ?bool $isReady;

    #[Optional]
    public ?int $pending;

    #[Optional]
    public ?int $total;

    #[Optional]
    public ?int $unsendSeconds;

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
        ?int $id = null,
        ?bool $canUnsend = null,
        ?string $date = null,
        ?bool $hasError = null,
        ?bool $isCanceled = null,
        ?bool $isCouplePeopleMedia = null,
        ?bool $isDone = null,
        ?bool $isReady = null,
        ?int $pending = null,
        ?int $total = null,
        ?int $unsendSeconds = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $canUnsend && $self['canUnsend'] = $canUnsend;
        null !== $date && $self['date'] = $date;
        null !== $hasError && $self['hasError'] = $hasError;
        null !== $isCanceled && $self['isCanceled'] = $isCanceled;
        null !== $isCouplePeopleMedia && $self['isCouplePeopleMedia'] = $isCouplePeopleMedia;
        null !== $isDone && $self['isDone'] = $isDone;
        null !== $isReady && $self['isReady'] = $isReady;
        null !== $pending && $self['pending'] = $pending;
        null !== $total && $self['total'] = $total;
        null !== $unsendSeconds && $self['unsendSeconds'] = $unsendSeconds;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCanUnsend(bool $canUnsend): self
    {
        $self = clone $this;
        $self['canUnsend'] = $canUnsend;

        return $self;
    }

    public function withDate(string $date): self
    {
        $self = clone $this;
        $self['date'] = $date;

        return $self;
    }

    public function withHasError(bool $hasError): self
    {
        $self = clone $this;
        $self['hasError'] = $hasError;

        return $self;
    }

    public function withIsCanceled(bool $isCanceled): self
    {
        $self = clone $this;
        $self['isCanceled'] = $isCanceled;

        return $self;
    }

    public function withIsCouplePeopleMedia(bool $isCouplePeopleMedia): self
    {
        $self = clone $this;
        $self['isCouplePeopleMedia'] = $isCouplePeopleMedia;

        return $self;
    }

    public function withIsDone(bool $isDone): self
    {
        $self = clone $this;
        $self['isDone'] = $isDone;

        return $self;
    }

    public function withIsReady(bool $isReady): self
    {
        $self = clone $this;
        $self['isReady'] = $isReady;

        return $self;
    }

    public function withPending(int $pending): self
    {
        $self = clone $this;
        $self['pending'] = $pending;

        return $self;
    }

    public function withTotal(int $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }

    public function withUnsendSeconds(int $unsendSeconds): self
    {
        $self = clone $this;
        $self['unsendSeconds'] = $unsendSeconds;

        return $self;
    }
}
