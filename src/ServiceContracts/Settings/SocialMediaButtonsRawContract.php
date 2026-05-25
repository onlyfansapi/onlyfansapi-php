<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Settings;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\Settings\SocialMediaButtons\SocialMediaButtonAddParams;
use OnlyFansAPI\Settings\SocialMediaButtons\SocialMediaButtonAddResponse;
use OnlyFansAPI\Settings\SocialMediaButtons\SocialMediaButtonDeleteParams;
use OnlyFansAPI\Settings\SocialMediaButtons\SocialMediaButtonDeleteResponse;
use OnlyFansAPI\Settings\SocialMediaButtons\SocialMediaButtonListResponse;
use OnlyFansAPI\Settings\SocialMediaButtons\SocialMediaButtonReorderParams;
use OnlyFansAPI\Settings\SocialMediaButtons\SocialMediaButtonReorderResponse;
use OnlyFansAPI\Settings\SocialMediaButtons\SocialMediaButtonUpdateParams;
use OnlyFansAPI\Settings\SocialMediaButtons\SocialMediaButtonUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
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
