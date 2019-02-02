<?php
declare(strict_types=1);

const TLD_LIST_DATA = 'https://data.iana.org/TLD/tlds-alpha-by-domain.txt';
const SLD_LIST = ['com', 'co', 'org', 'in', 'us', 'gov', 'mil', 'int', 'edu', 'net', 'biz', 'info'];

$options = getopt('u::', ['url::']);

if (count($options) != 0) {
    $url = $options['u'] ?? $options['url'];
    if (!$url) {
        throw new \RuntimeException('Invalid option value');
    }
} elseif (count($argv) === 2) {
    $url = $argv[1];
} else {
    throw new \RuntimeException('Check arguments');
}

$parsedUrl = parse_url($url);
if (!$parsedUrl) {
    throw new \RuntimeException('Error parsing url');
}

$host = $parsedUrl['host'];

if (!in_array($parsedUrl['scheme'], ['http', 'https'])) {
    throw new \RuntimeException('Error parsing url');
}

$tldList = explode(PHP_EOL, strtolower(file_get_contents(TLD_LIST_DATA)));

$tldIndex = strrpos($host, '.', -1);
$tld = substr($host, $tldIndex + 1, strlen($host));

if (!in_array($tld, $tldList)) {
    throw new \RuntimeException('TLD is not valid');
}

$sld = false;

if (strlen($tld) === 2) {
    $sld = array_filter(SLD_LIST, function ($value) use ($host, $tld) {
        return false !== strpos($host, sprintf('.%s.%s', $value, $tld));
    });
    if (count($sld) > 0) {
        $sld = reset($sld);
    } else {
        $sld = false;
    }
}

$parsedUrl['domain'] = $host;

if (substr_count($host, '.') > 2) {
    $tldAndSld = ($sld ? '.' . $sld : '') . '.' . $tld;
    $rldAndSdlStartPos = strpos($host, '.', strlen($tldAndSld) - strlen($host));
    $parsedUrl['domain'] = substr($host, $rldAndSdlStartPos + 1, strlen($host));

    $domainStartPost = strpos($host, $parsedUrl['domain']);
    $parsedUrl['subdomain'] = substr($host, 0, $domainStartPost - 1);
}

if (array_key_exists('query', $parsedUrl)) {
    parse_str($parsedUrl['query'], $output);
    $parsedUrl['parsedQuery'] = $output;
}

if (array_key_exists('path', $parsedUrl)) {
    $parsedUrl['extension'] =
        '.' .
        substr(
            $parsedUrl['path'],
            strlen($parsedUrl['path']) - strpos(strrev($parsedUrl['path']), '.')
        );
}

$parsedUrl['tld'] = '.' . $tld;
if ($sld) {
    $parsedUrl['sld'] = '.' . $sld;
}

echo json_encode($parsedUrl) . PHP_EOL;
