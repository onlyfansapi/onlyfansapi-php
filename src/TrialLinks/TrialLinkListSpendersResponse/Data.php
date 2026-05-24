<?php

declare(strict_types=1);

namespace Onlyfansapi\TrialLinks\TrialLinkListSpendersResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\TrialLinks\TrialLinkListSpendersResponse\Data\OnlyfansUserData;
use Onlyfansapi\TrialLinks\TrialLinkListSpendersResponse\Data\Revenue;

/**
 * @phpstan-import-type OnlyfansUserDataShape from \Onlyfansapi\TrialLinks\TrialLinkListSpendersResponse\Data\OnlyfansUserData
 * @phpstan-import-type RevenueShape from \Onlyfansapi\TrialLinks\TrialLinkListSpendersResponse\Data\Revenue
 *
 * @phpstan-type DataShape = array{
 *   onlyfansID?: string|null,
 *   onlyfansUserData?: null|OnlyfansUserData|OnlyfansUserDataShape,
 *   revenue?: null|Revenue|RevenueShape,
 *   username?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional('onlyfans_id')]
    public ?string $onlyfansID;

    #[Optional('onlyfans_user_data')]
    public ?OnlyfansUserData $onlyfansUserData;

    #[Optional]
    public ?Revenue $revenue;

    #[Optional]
    public ?string $username;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param OnlyfansUserData|OnlyfansUserDataShape|null $onlyfansUserData
     * @param Revenue|RevenueShape|null $revenue
     */
    public static function with(
        ?string $onlyfansID = null,
        OnlyfansUserData|array|null $onlyfansUserData = null,
        Revenue|array|null $revenue = null,
        ?string $username = null,
    ): self {
        $self = new self;

        null !== $onlyfansID && $self['onlyfansID'] = $onlyfansID;
        null !== $onlyfansUserData && $self['onlyfansUserData'] = $onlyfansUserData;
        null !== $revenue && $self['revenue'] = $revenue;
        null !== $username && $self['username'] = $username;

        return $self;
    }

    public function withOnlyfansID(string $onlyfansID): self
    {
        $self = clone $this;
        $self['onlyfansID'] = $onlyfansID;

        return $self;
    }

    /**
     * @param OnlyfansUserData|OnlyfansUserDataShape $onlyfansUserData
     */
    public function withOnlyfansUserData(
        OnlyfansUserData|array $onlyfansUserData
    ): self {
        $self = clone $this;
        $self['onlyfansUserData'] = $onlyfansUserData;

        return $self;
    }

    /**
     * @param Revenue|RevenueShape $revenue
     */
    public function withRevenue(Revenue|array $revenue): self
    {
        $self = clone $this;
        $self['revenue'] = $revenue;

        return $self;
    }

    public function withUsername(string $username): self
    {
        $self = clone $this;
        $self['username'] = $username;

        return $self;
    }
}
