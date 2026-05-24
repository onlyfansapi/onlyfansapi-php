<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Banking;

use Onlyfansapi\Banking\Details\DetailGetAccountCountryDetailsResponse;
use Onlyfansapi\Banking\Details\DetailGetBankDetailsResponse;
use Onlyfansapi\Banking\Details\DetailGetDac7FormDetailsResponse;
use Onlyfansapi\Banking\Details\DetailGetLegalAndTaxStatusResponse;
use Onlyfansapi\Banking\Details\DetailGetLegalFormDetailsResponse;
use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\Banking\DetailsContract;

/**
 * Operations related to user banking details, payout methods, legal and tax information, and account country settings.
 *
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class DetailsService implements DetailsContract
{
    /**
     * @api
     */
    public DetailsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new DetailsRawService($client);
    }

    /**
     * @api
     *
     * Returns the account owner's country details for banking, including country code, name, whether the country has states and zip codes, payout eligibility, and W9 form availability.
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveAccountCountryDetails(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): DetailGetAccountCountryDetailsResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveAccountCountryDetails($account, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the account owner's bank payout details, including whether payout data is filled, available payout methods with their descriptions, and required bank fields.
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveBankDetails(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): DetailGetBankDetailsResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveBankDetails($account, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * If available, returns the account owner's DAC7 form information required for tax reporting, including personal details, address, tax identification, country information, and DAC7 status.
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveDac7FormDetails(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): DetailGetDac7FormDetailsResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveDac7FormDetails($account, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the account owner's legal and tax status required for banking and payout configuration, including W9 requirements, identity verification status, DAC7 compliance, and tax information.
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveLegalAndTaxStatus(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): DetailGetLegalAndTaxStatusResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveLegalAndTaxStatus($account, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the account owner's legal form details for banking, including personal or business name, address, social media links, date of birth, and available document types for identity verification.
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveLegalFormDetails(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): DetailGetLegalFormDetailsResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveLegalFormDetails($account, requestOptions: $requestOptions);

        return $response->parse();
    }
}
