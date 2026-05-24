<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Settings;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\Settings\BlockedCountries\BlockedCountryGetResponse;
use Onlyfansapi\Settings\BlockedCountries\BlockedCountryUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface BlockedCountriesContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BlockedCountryGetResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param list<string> $blockedCountries List of all ISO 3166-1 alpha-2 country codes to block including existing ones. If you want to unblock all countries, set this to an empty array or `null`.
     * @param list<string> $blockedStates Blocked states payload forwarded to OnlyFans. Defaults to an empty array.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $account,
        array $blockedCountries,
        ?array $blockedStates = null,
        RequestOptions|array|null $requestOptions = null,
    ): BlockedCountryUpdateResponse;
}
