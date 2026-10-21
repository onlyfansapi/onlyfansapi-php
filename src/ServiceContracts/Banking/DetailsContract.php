<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Banking;

use OnlyFansAPI\Banking\Details\DetailGetAccountCountryDetailsResponse;
use OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse;
use OnlyFansAPI\Banking\Details\DetailGetDac7FormDetailsResponse;
use OnlyFansAPI\Banking\Details\DetailGetLegalAndTaxStatusResponse;
use OnlyFansAPI\Banking\Details\DetailGetLegalFormDetailsResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface DetailsContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveAccountCountryDetails(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): DetailGetAccountCountryDetailsResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveBankDetails(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): DetailGetBankDetailsResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveDac7FormDetails(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): DetailGetDac7FormDetailsResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveLegalAndTaxStatus(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): DetailGetLegalAndTaxStatusResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveLegalFormDetails(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): DetailGetLegalFormDetailsResponse;
}
