<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Banking;

use Onlyfansapi\Banking\Details\DetailGetAccountCountryDetailsResponse;
use Onlyfansapi\Banking\Details\DetailGetBankDetailsResponse;
use Onlyfansapi\Banking\Details\DetailGetDac7FormDetailsResponse;
use Onlyfansapi\Banking\Details\DetailGetLegalAndTaxStatusResponse;
use Onlyfansapi\Banking\Details\DetailGetLegalFormDetailsResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
