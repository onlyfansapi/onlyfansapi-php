<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Settings;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Settings\SocialMediaButtonsContract;
use OnlyFansAPI\Settings\SocialMediaButtons\SocialMediaButtonAddParams\Type;
use OnlyFansAPI\Settings\SocialMediaButtons\SocialMediaButtonAddResponse;
use OnlyFansAPI\Settings\SocialMediaButtons\SocialMediaButtonDeleteResponse;
use OnlyFansAPI\Settings\SocialMediaButtons\SocialMediaButtonListResponse;
use OnlyFansAPI\Settings\SocialMediaButtons\SocialMediaButtonReorderResponse;
use OnlyFansAPI\Settings\SocialMediaButtons\SocialMediaButtonUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class SocialMediaButtonsService implements SocialMediaButtonsContract
{
    /**
     * @api
     */
    public SocialMediaButtonsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SocialMediaButtonsRawService($client);
    }

    /**
     * @api
     *
     * Updates a social media button from the account
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
    ): SocialMediaButtonUpdateResponse {
        $params = Util::removeNulls(['account' => $account, 'label' => $label]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($buttonID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the list of social media buttons for the account
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): SocialMediaButtonListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($account, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes a social media button from the account
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
    ): SocialMediaButtonDeleteResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($buttonID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Adds a new social media button to the account
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
    ): SocialMediaButtonAddResponse {
        $params = Util::removeNulls(
            ['label' => $label, 'type' => $type, 'value' => $value]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->add($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Changes the order of social media buttons for the account
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
    ): SocialMediaButtonReorderResponse {
        $params = Util::removeNulls(['buttonIDs' => $buttonIDs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->reorder($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
