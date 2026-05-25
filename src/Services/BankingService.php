<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Banking\BankingListAvailablePayoutSystemsResponse;
use OnlyFansAPI\Banking\BankingListCountriesResponse;
use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\BankingContract;
use OnlyFansAPI\Services\Banking\DetailsService;

/**
 * Operations related to user banking details, payout methods, legal and tax information, and account country settings.
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class BankingService implements BankingContract
{
    /**
     * @api
     */
    public BankingRawService $raw;

    /**
     * @api
     */
    public DetailsService $details;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BankingRawService($client);
        $this->details = new DetailsService($client);
    }

    /**
     * @api
     *
     * Returns a list of available payout systems for the account, including details such as payout method codes, titles, descriptions, minimum payout amounts, processing times, and the currently selected payout method.
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listAvailablePayoutSystems(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BankingListAvailablePayoutSystemsResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listAvailablePayoutSystems($account, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List countries, their internal OnlyFans IDs, and their payment & tax information.
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listCountries(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BankingListCountriesResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listCountries($account, requestOptions: $requestOptions);

        return $response->parse();
    }
}
