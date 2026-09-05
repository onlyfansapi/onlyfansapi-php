<?php

declare(strict_types=1);

namespace OnlyFansAPI\Authenticate\AuthenticatePollStatusResponse;

use OnlyFansAPI\Authenticate\AuthenticatePollStatusResponse\Account\OnlyfansData;
use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type OnlyfansDataShape from \OnlyFansAPI\Authenticate\AuthenticatePollStatusResponse\Account\OnlyfansData
 *
 * @phpstan-type AccountShape = array{
 *   id?: string|null,
 *   displayName?: string|null,
 *   onlyfansData?: null|OnlyfansData|OnlyfansDataShape,
 * }
 */
final class Account implements BaseModel
{
    /** @use SdkModel<AccountShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional('display_name')]
    public ?string $displayName;

    #[Optional('onlyfans_data')]
    public ?OnlyfansData $onlyfansData;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param OnlyfansData|OnlyfansDataShape|null $onlyfansData
     */
    public static function with(
        ?string $id = null,
        ?string $displayName = null,
        OnlyfansData|array|null $onlyfansData = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $displayName && $self['displayName'] = $displayName;
        null !== $onlyfansData && $self['onlyfansData'] = $onlyfansData;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withDisplayName(string $displayName): self
    {
        $self = clone $this;
        $self['displayName'] = $displayName;

        return $self;
    }

    /**
     * @param OnlyfansData|OnlyfansDataShape $onlyfansData
     */
    public function withOnlyfansData(OnlyfansData|array $onlyfansData): self
    {
        $self = clone $this;
        $self['onlyfansData'] = $onlyfansData;

        return $self;
    }
}
