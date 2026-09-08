<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Settings;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\Settings\BlockedCountries\BlockedCountryGetResponse;
use OnlyFansAPI\Settings\BlockedCountries\BlockedCountryUpdateParams;
use OnlyFansAPI\Settings\BlockedCountries\BlockedCountryUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface BlockedCountriesRawContract
{
    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|BlockedCountryUpdateParams $params
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
    ): BaseResponse;
}
