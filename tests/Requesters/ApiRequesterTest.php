<?php

use function PHPUnit\Framework\assertIsString;

use Salt\Core\Exceptions\ApiException;

use Salt\Core\Requesters\ApiRequester;

it('can make an API call', function () {
    $method = "GET";

    // https://jsonplaceholder.typicode.com/
    $url = "https://jsonplaceholder.typicode.com/posts/1";
    assertIsString((new ApiRequester())->makeApiRequest($method, $url));
});

it('can fetch an access token', function () {
    assertIsString((new ApiRequester())->getAccessToken());
});

it('returns an API exception when an error is thrown', function () {
    $method = "GET";
    $url = "https://jsonplaceholder.typicode.com/goats/56";

    (new ApiRequester())->makeApiRequest($method, $url);
})->throws(ApiException::class);
