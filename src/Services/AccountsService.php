<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Accounts\AccountListResponseItem;
use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\AccountsContract;

/**
 * Endpoints for your linked accounts.
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class AccountsService implements AccountsContract
{
    /**
     * @api
     */
    public AccountsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AccountsRawService($client);
    }

    /**
     * @api
     *
     * List all connected OnlyFans accounts.
     *
     * @param string|null $onlyfansEmail Optionally, filter by the OnlyFans email
     * @param string|null $onlyfansID Optionally, filter by the OnlyFans ID
     * @param string|null $onlyfansUsername Optionally, filter by the OnlyFans username
     * @param RequestOpts|null $requestOptions
     *
     * @return list<AccountListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        ?string $onlyfansEmail = null,
        ?string $onlyfansID = null,
        ?string $onlyfansUsername = null,
        RequestOptions|array|null $requestOptions = null,
    ): array {
        $params = Util::removeNulls(
            [
                'onlyfansEmail' => $onlyfansEmail,
                'onlyfansID' => $onlyfansID,
                'onlyfansUsername' => $onlyfansUsername,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Disconnect an OnlyFans account.
     *
     * @param string $id the ID of the account
     * @param RequestOpts|null $requestOptions
     *
     * @return array<string,mixed>
     *
     * @throws APIException
     */
    public function disconnect(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): array {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->disconnect($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
