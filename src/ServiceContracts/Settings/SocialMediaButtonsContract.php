<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Settings;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\Settings\SocialMediaButtons\SocialMediaButtonAddParams\Type;
use OnlyFansAPI\Settings\SocialMediaButtons\SocialMediaButtonAddResponse;
use OnlyFansAPI\Settings\SocialMediaButtons\SocialMediaButtonDeleteResponse;
use OnlyFansAPI\Settings\SocialMediaButtons\SocialMediaButtonListResponse;
use OnlyFansAPI\Settings\SocialMediaButtons\SocialMediaButtonReorderResponse;
use OnlyFansAPI\Settings\SocialMediaButtons\SocialMediaButtonUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface SocialMediaButtonsContract
{
    /**
     * @api
     *
     * @param string $buttonID Path param: The ID of the social media button to update
     * @param string $account Path param: The Account ID
     * @param string $label Body param: The new label for the button
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $buttonID,
        string $account,
        string $label,
        RequestOptions|array|null $requestOptions = null,
    ): SocialMediaButtonUpdateResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): SocialMediaButtonListResponse;

    /**
     * @api
     *
     * @param string $buttonID The ID of the social media button to update
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $buttonID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): SocialMediaButtonDeleteResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param string $label The button label
     * @param Type|value-of<Type> $type The button type
     * @param string $value the button value, either a username or link
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function add(
        string $account,
        string $label,
        Type|string $type,
        string $value,
        RequestOptions|array|null $requestOptions = null,
    ): SocialMediaButtonAddResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param list<string> $buttonIDs The new order of the buttons
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function reorder(
        string $account,
        array $buttonIDs,
        RequestOptions|array|null $requestOptions = null,
    ): SocialMediaButtonReorderResponse;
}
