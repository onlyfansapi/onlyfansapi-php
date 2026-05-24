<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Fans;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Fans\Summary\SummaryGenerateSummaryResponse;
use Onlyfansapi\Fans\Summary\SummaryGetSummaryResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface SummaryContract
{
    /**
     * @api
     *
     * @param string $fanID Path param: Fan's OnlyFans ID
     * @param string $account Path param: The Account ID
     * @param bool $regenerate body param: Set to true to regenerate an existing completed summary
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function generateSummary(
        string $fanID,
        string $account,
        ?bool $regenerate = null,
        RequestOptions|array|null $requestOptions = null,
    ): SummaryGenerateSummaryResponse;

    /**
     * @api
     *
     * @param string $fanID Fan's OnlyFans ID
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getSummary(
        string $fanID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): SummaryGetSummaryResponse;
}
