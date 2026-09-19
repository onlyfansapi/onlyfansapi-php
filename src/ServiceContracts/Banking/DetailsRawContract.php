<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Banking;

use OnlyFansAPI\Banking\Details\DetailGetAccountCountryDetailsResponse;
use OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse;
use OnlyFansAPI\Banking\Details\DetailGetDac7FormDetailsResponse;
use OnlyFansAPI\Banking\Details\DetailGetLegalAndTaxStatusResponse;
use OnlyFansAPI\Banking\Details\DetailGetLegalFormDetailsResponse;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface DetailsRawContract
{
    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;
}
