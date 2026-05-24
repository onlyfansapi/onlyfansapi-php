<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Workflows;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface AccountPerformanceRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function retrieveStartingRevenues(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
