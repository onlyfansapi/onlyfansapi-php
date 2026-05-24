<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface AccountsContract
{
    /**
     * @api
     *
     * @param string|null $onlyfansEmail Optionally, filter by the OnlyFans email
     * @param string|null $onlyfansID Optionally, filter by the OnlyFans ID
     * @param string|null $onlyfansUsername Optionally, filter by the OnlyFans username
     * @param RequestOpts|null $requestOptions
     *
     * @return list<mixed>
     *
     * @throws APIException
     */
    public function list(
        ?string $onlyfansEmail = null,
        ?string $onlyfansID = null,
        ?string $onlyfansUsername = null,
        RequestOptions|array|null $requestOptions = null,
    ): array;

    /**
     * @api
     *
     * @param string $id the ID of the account
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function disconnect(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
