<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Banking;

use OnlyFansAPI\Banking\Details\DetailGetAccountCountryDetailsResponse;
use OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse;
use OnlyFansAPI\Banking\Details\DetailGetDac7FormDetailsResponse;
use OnlyFansAPI\Banking\Details\DetailGetLegalAndTaxStatusResponse;
use OnlyFansAPI\Banking\Details\DetailGetLegalFormDetailsResponse;
use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Banking\DetailsRawContract;

/**
 * Operations related to user banking details, payout methods, legal and tax information, and account country settings.
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class DetailsRawService implements DetailsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns the account owner's country details for banking, including country code, name, whether the country has states and zip codes, payout eligibility, and W9 form availability.
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DetailGetAccountCountryDetailsResponse>
     *
     * @throws APIException
     */
    public function retrieveAccountCountryDetails(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/banking/details/account-country', $account],
            options: $requestOptions,
            convert: DetailGetAccountCountryDetailsResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the account owner's bank payout details, including whether payout data is filled, available payout methods with their descriptions, and required bank fields.
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DetailGetBankDetailsResponse>
     *
     * @throws APIException
     */
    public function retrieveBankDetails(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/banking/details/bank', $account],
            options: $requestOptions,
            convert: DetailGetBankDetailsResponse::class,
        );
    }

    /**
     * @api
     *
     * If available, returns the account owner's DAC7 form information required for tax reporting, including personal details, address, tax identification, country information, and DAC7 status.
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DetailGetDac7FormDetailsResponse>
     *
     * @throws APIException
     */
    public function retrieveDac7FormDetails(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/banking/details/dac7-form', $account],
            options: $requestOptions,
            convert: DetailGetDac7FormDetailsResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the account owner's legal and tax status required for banking and payout configuration, including W9 requirements, identity verification status, DAC7 compliance, and tax information.
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DetailGetLegalAndTaxStatusResponse>
     *
     * @throws APIException
     */
    public function retrieveLegalAndTaxStatus(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/banking/details/legal-info', $account],
            options: $requestOptions,
            convert: DetailGetLegalAndTaxStatusResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the account owner's legal form details for banking, including personal or business name, address, social media links, date of birth, and available document types for identity verification.
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DetailGetLegalFormDetailsResponse>
     *
     * @throws APIException
     */
    public function retrieveLegalFormDetails(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/banking/details/legal-form', $account],
            options: $requestOptions,
            convert: DetailGetLegalFormDetailsResponse::class,
        );
    }
}
