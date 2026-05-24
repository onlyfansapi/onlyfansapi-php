<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Settings;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\Settings\BlockedCountriesRawContract;
use Onlyfansapi\Settings\BlockedCountries\BlockedCountryGetResponse;
use Onlyfansapi\Settings\BlockedCountries\BlockedCountryUpdateParams;
use Onlyfansapi\Settings\BlockedCountries\BlockedCountryUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class BlockedCountriesRawService implements BlockedCountriesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns the countries blocked from viewing the account.
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BlockedCountryGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/settings/blocked-countries', $account],
            options: $requestOptions,
            convert: BlockedCountryGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates the countries blocked from viewing the account.
     *
     * @param string $account The Account ID
     * @param array{
     *   blockedCountries: list<string>, blockedStates?: list<string>
     * }|BlockedCountryUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BlockedCountryUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $account,
        array|BlockedCountryUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BlockedCountryUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['api/%1$s/settings/blocked-countries', $account],
            body: (object) $parsed,
            options: $options,
            convert: BlockedCountryUpdateResponse::class,
        );
    }
}
