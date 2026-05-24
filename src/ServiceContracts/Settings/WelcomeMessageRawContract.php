<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Settings;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\Settings\WelcomeMessage\WelcomeMessageGetResponse;
use Onlyfansapi\Settings\WelcomeMessage\WelcomeMessageToggleParams;
use Onlyfansapi\Settings\WelcomeMessage\WelcomeMessageToggleResponse;
use Onlyfansapi\Settings\WelcomeMessage\WelcomeMessageUpdateParams;
use Onlyfansapi\Settings\WelcomeMessage\WelcomeMessageUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
