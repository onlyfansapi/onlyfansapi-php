<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Settings;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\Settings\WelcomeMessage\WelcomeMessageGetResponse;
use OnlyFansAPI\Settings\WelcomeMessage\WelcomeMessageToggleParams;
use OnlyFansAPI\Settings\WelcomeMessage\WelcomeMessageToggleResponse;
use OnlyFansAPI\Settings\WelcomeMessage\WelcomeMessageUpdateParams;
use OnlyFansAPI\Settings\WelcomeMessage\WelcomeMessageUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface WelcomeMessageRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WelcomeMessageGetResponse>
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
     * @param array<string,mixed>|WelcomeMessageUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WelcomeMessageUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $account,
        array|WelcomeMessageUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|WelcomeMessageToggleParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WelcomeMessageToggleResponse>
     *
     * @throws APIException
     */
    public function toggle(
        string $account,
        array|WelcomeMessageToggleParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
