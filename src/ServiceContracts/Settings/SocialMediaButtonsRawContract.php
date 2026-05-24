<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Settings;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\Settings\SocialMediaButtons\SocialMediaButtonAddParams;
use Onlyfansapi\Settings\SocialMediaButtons\SocialMediaButtonAddResponse;
use Onlyfansapi\Settings\SocialMediaButtons\SocialMediaButtonDeleteParams;
use Onlyfansapi\Settings\SocialMediaButtons\SocialMediaButtonDeleteResponse;
use Onlyfansapi\Settings\SocialMediaButtons\SocialMediaButtonListResponse;
use Onlyfansapi\Settings\SocialMediaButtons\SocialMediaButtonReorderParams;
use Onlyfansapi\Settings\SocialMediaButtons\SocialMediaButtonReorderResponse;
use Onlyfansapi\Settings\SocialMediaButtons\SocialMediaButtonUpdateParams;
use Onlyfansapi\Settings\SocialMediaButtons\SocialMediaButtonUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface SocialMediaButtonsRawContract
{
    /**
     * @api
     *
     * @param string $buttonID Path param: The ID of the social media button to update
     * @param array<string,mixed>|SocialMediaButtonUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SocialMediaButtonUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $buttonID,
        array|SocialMediaButtonUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SocialMediaButtonListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $buttonID The ID of the social media button to update
     * @param array<string,mixed>|SocialMediaButtonDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SocialMediaButtonDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $buttonID,
        array|SocialMediaButtonDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|SocialMediaButtonAddParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SocialMediaButtonAddResponse>
     *
     * @throws APIException
     */
    public function add(
        string $account,
        array|SocialMediaButtonAddParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|SocialMediaButtonReorderParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SocialMediaButtonReorderResponse>
     *
     * @throws APIException
     */
    public function reorder(
        string $account,
        array|SocialMediaButtonReorderParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
