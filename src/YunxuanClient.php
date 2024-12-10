<?php

declare(strict_types=1);

namespace Ydg\YunxuanCpsSdk;

use Ydg\FoudationSdk\FoundationApi;
use Ydg\FoudationSdk\Traits\HasAttributes;

class YunxuanClient extends FoundationApi
{
    use HasAttributes;

    protected string $baseUri = 'http://api.cps.yunxuan.qq.com';

    public function getUri(string $uri): string
    {
        return $this->getBaseUri() . $uri;
    }

    public function getBaseUri(): string
    {
        return $this->baseUri;
    }

    public function setBaseUri(string $baseUri)
    {
        $this->baseUri = $baseUri;
    }

    public function json(string $uri, array $params): array
    {
        $apiAppKey = $this->offsetGet('app_key');
        $apiAppSecret = $this->offsetGet('app_secret');

        $url = $this->getUri($uri);
        $httpMethod = "POST";
        $acceptHeader = "application/json";
        $contentType = "application/json";
        $algorithm = "sha1";
        $reqBody = json_encode($params);
        $contentMD5 = base64_encode(md5($reqBody));

        $queryParams = [];
        $parsedUrl = parse_url($url);
        if (!empty($parsedUrl['query'])) {
            parse_str($parsedUrl['query'], $queryParams);
        }

        $pathAndParam = $parsedUrl['path'];
        if (!empty($queryParams)) {
            $pathAndParam = $pathAndParam . '?' . $this->getSortedParameterStr($queryParams);
        }

        $xDateHeader = gmstrftime('%a, %d %b %Y %T GMT', time());
        $strToSign = sprintf("x-date: %s\n%s\n%s\n%s\n%s\n%s", $xDateHeader, $httpMethod, $acceptHeader, $contentType, $contentMD5, $pathAndParam);
        $sign = base64_encode(hash_hmac($algorithm, $strToSign, $apiAppSecret, TRUE));
        $authHeader = sprintf('hmac id="%s", algorithm="hmac-%s", headers="x-date", signature="%s"', $apiAppKey, $algorithm, $sign);

        $response = $this->getHttpClient()->json($url, $params, [
            'headers' => [
                'Host' => $parsedUrl['host'],
                'Accept' => $acceptHeader,
                'X-Date' => $xDateHeader,
                'Authorization' => $authHeader,
                'Content-Type' => $contentType,
                'Content-MD5' => $contentMD5,
            ],
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function getHttpClientDefaultOptions(): array
    {
        return [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'verify' => false,
        ];
    }

    function getSortedParameterStr($params): string
    {
        ksort($params);
        $array = [];
        foreach ($params as $k => $v) {
            $tmp = $k;
            if (!empty($v)) {
                $tmp .= ("=" . $v);
            }
            $array[] = $tmp;
        }
        return join('&', $array);
    }
}