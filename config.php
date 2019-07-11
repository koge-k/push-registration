<?php
return array(
    'appsignature' => 'none', 
	'clientid' => getenv('APP_CENTER_API_INTEGRATION_CLIENTID'),
	'clientsecret' => getenv('APP_CENTER_API_INTEGRATION_CLIENT_SECRET'),
	'defaultwsdl' => 'https://webservice.exacttarget.com/etframework.wsdl',
    'xmlloc' => './ExactTargetWSDL.xml',

    'useOAuth2Authentication' => true,
    // 下記を省略した場合はMC管理画面側のパッケージのAPI連携コンポーネントのscope設定が使われる
    //'scope' => 'data_extensions_read data_extensions_write',

	// 認証ベースURI
    'baseAuthUrl' => 'https://mcs7-l1cxy5t4d27yhv3jk5rgc5m.auth.marketingcloudapis.com/',
	// RESTベースURI
    //'baseUrl'     => 'https://mcs7-l1cxy5t4d27yhv3jk5rgc5m.rest.marketingcloudapis.com/',
	// SOAPベースURI
    //'baseSoapUrl' => 'https://mcs7-l1cxy5t4d27yhv3jk5rgc5m.soap.marketingcloudapis.com/',
);
