{
    "name": "baju/module-internetprotocol",
    "description": "N/A",
    "require": {
        "php": "~5.6.5|7.0.2|7.0.4|~7.0.6",
        "magento/module-catalog": "101.0.*",
        "magento/module-catalog-inventory": "100.1.*",
        "magento/module-eav": "100.1.*",
        "magento/module-import-export": "100.1.*",
        "magento/module-catalog-import-export": "100.1.*",
        "magento/module-customer": "100.1.*",
        "magento/module-store": "100.1.*",
        "magento/framework": "100.1.*"
    },
    "type": "magento2-module",
    "version": "100.1.1",
    "license": [
        "OSL-3.0",
        "AFL-3.0"
    ],
    "autoload": {
        "files": [
            "registration.php"
        ],
        "psr-4": {
            "Baju\\InternetProtocol\\": ""
        }
    }
}
