<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Settings;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\Settings\BlockedCountriesContract;
use Onlyfansapi\Settings\BlockedCountries\BlockedCountryGetResponse;
use Onlyfansapi\Settings\BlockedCountries\BlockedCountryUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class BlockedCountriesService implements BlockedCountriesContract
{
    /**
     * @api
     */
    public BlockedCountriesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BlockedCountriesRawService($client);
    }

    /**
     * @api
     *
     * Returns the countries blocked from viewing the account.
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BlockedCountryGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($account, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates the countries blocked from viewing the account.
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
    ): BlockedCountryUpdateResponse {
        $params = Util::removeNulls(
            [
                'blockedCountries' => $blockedCountries,
                'blockedStates' => $blockedStates,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
