<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Statistics;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\Statistics\StatementsContract;
use Onlyfansapi\Statistics\Statements\StatementGetEarningsParams\Type;
use Onlyfansapi\Statistics\Statements\StatementGetEarningsResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class StatementsService implements StatementsContract
{
    /**
     * @api
     */
    public StatementsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new StatementsRawService($client);
    }

    /**
     * @api
     *
     * Get the earnings for a given period.
     *
     * @param string $account The Account ID
     * @param string $startDate The start date for the period
     * @param string $endDate the end date for the period
     * @param Type|value-of<Type> $type Filter by All / Subscriptions / Tips / Posts / Messages / Streams
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getEarnings(
        string $account,
        string $startDate,
        ?string $endDate = null,
        Type|string|null $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): StatementGetEarningsResponse {
        $params = Util::removeNulls(
            ['startDate' => $startDate, 'endDate' => $endDate, 'type' => $type]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getEarnings($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
