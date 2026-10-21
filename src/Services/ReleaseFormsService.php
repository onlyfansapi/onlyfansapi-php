<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\ReleaseForms\ReleaseFormListTaggableUsersParams\Filter;
use OnlyFansAPI\ReleaseForms\ReleaseFormListTaggableUsersParams\Sort;
use OnlyFansAPI\ReleaseForms\ReleaseFormListTaggableUsersParams\SortDirection;
use OnlyFansAPI\ReleaseForms\ReleaseFormListTaggableUsersResponse;
use OnlyFansAPI\ReleaseForms\ReleaseFormNewInvitationLinkResponse;
use OnlyFansAPI\ReleaseForms\ReleaseFormNewReleaseFormResponse;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\ReleaseFormsContract;

/**
 * APIs for managing OnlyFans release forms.
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class ReleaseFormsService implements ReleaseFormsContract
{
    /**
     * @api
     */
    public ReleaseFormsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ReleaseFormsRawService($client);
    }

    /**
     * @api
     *
     * Create a new invitation link for release forms.
     *
     * @param string $account The Account ID
     * @param string $name the name of the invitation link
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createInvitationLink(
        string $account,
        string $name,
        RequestOptions|array|null $requestOptions = null,
    ): ReleaseFormNewInvitationLinkResponse {
        $params = Util::removeNulls(['name' => $name]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createInvitationLink($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a new release form link.
     *
     * @param string $account The Account ID
     * @param string $name the name of the release form
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createReleaseForm(
        string $account,
        string $name,
        RequestOptions|array|null $requestOptions = null,
    ): ReleaseFormNewReleaseFormResponse {
        $params = Util::removeNulls(['name' => $name]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createReleaseForm($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a paginated list of users that can be tagged in release forms. These are verified creators who have signed release forms to appear in your content. Use `offset` and `limit` for pagination, following `_pagination.next_page` until it is `null`.
     *
     * @param string $account The Account ID
     * @param Filter|value-of<Filter>|null $filter filter users by type: `all` or `pending`
     * @param int $limit Number of users to return per page (1-50). Must be at least 1. Must not be greater than 50.
     * @param string|null $name filter users by name or username
     * @param int $offset Number of users to skip for pagination. Must be at least 0.
     * @param Sort|value-of<Sort>|null $sort sort field: `date` or `name`
     * @param SortDirection|value-of<SortDirection>|null $sortDirection sort direction: `desc` or `asc`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listTaggableUsers(
        string $account,
        Filter|string|null $filter = null,
        ?int $limit = null,
        ?string $name = null,
        ?int $offset = null,
        Sort|string|null $sort = null,
        SortDirection|string|null $sortDirection = null,
        RequestOptions|array|null $requestOptions = null,
    ): ReleaseFormListTaggableUsersResponse {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'limit' => $limit,
                'name' => $name,
                'offset' => $offset,
                'sort' => $sort,
                'sortDirection' => $sortDirection,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listTaggableUsers($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
