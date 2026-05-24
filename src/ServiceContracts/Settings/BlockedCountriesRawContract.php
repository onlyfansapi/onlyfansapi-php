<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Settings;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\Settings\BlockedCountries\BlockedCountryGetResponse;
use Onlyfansapi\Settings\BlockedCountries\BlockedCountryUpdateParams;
use Onlyfansapi\Settings\BlockedCountries\BlockedCountryUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
