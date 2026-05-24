<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Workflows;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\Workflows\AccountPerformanceContract;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class AccountPerformanceService implements AccountPerformanceContract
{
    /**
     * @api
     */
    public AccountPerformanceRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AccountPerformanceRawService($client);
    }

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveStartingRevenues(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveStartingRevenues($account, requestOptions: $requestOptions);

        return $response->parse();
    }
}
