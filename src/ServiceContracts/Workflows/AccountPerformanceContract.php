<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Workflows;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface AccountPerformanceContract
{
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
    ): mixed;
}
