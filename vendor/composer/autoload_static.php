<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5a4469c9b8d3934a369a3a25d7765a62
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'U' => 
        array (
            'UniversalPackageSystems\\Endpoint\\' => 33,
            'UniversalPackageSystems\\' => 24,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Contracts\\Translation\\' => 30,
            'Symfony\\Component\\Translation\\' => 30,
        ),
        'P' => 
        array (
            'Psr\\Http\\Message\\' => 17,
        ),
        'H' => 
        array (
            'Http\\Promise\\' => 13,
            'Http\\Message\\' => 13,
            'Http\\Discovery\\' => 15,
            'Http\\Client\\' => 12,
            'Http\\Adapter\\Guzzle6\\' => 21,
        ),
        'C' => 
        array (
            'Carbon\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'UniversalPackageSystems\\Endpoint\\' => 
        array (
            0 => __DIR__ . '/..' . '/karneaud/universal_package_system/src/endpoints',
        ),
        'UniversalPackageSystems\\' => 
        array (
            0 => __DIR__ . '/..' . '/karneaud/universal_package_system/src',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Contracts\\Translation\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/translation-contracts',
        ),
        'Symfony\\Component\\Translation\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/translation',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'Http\\Promise\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-http/promise/src',
        ),
        'Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-http/message-factory/src',
        ),
        'Http\\Discovery\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-http/discovery/src',
        ),
        'Http\\Client\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-http/httplug/src',
        ),
        'Http\\Adapter\\Guzzle6\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-http/guzzle6-adapter/src',
        ),
        'Carbon\\' => 
        array (
            0 => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon',
        ),
    );

    public static $classMap = array (
        'Carbon\\Carbon' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/Carbon.php',
        'Carbon\\CarbonImmutable' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/CarbonImmutable.php',
        'Carbon\\CarbonInterface' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/CarbonInterface.php',
        'Carbon\\CarbonInterval' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/CarbonInterval.php',
        'Carbon\\CarbonPeriod' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/CarbonPeriod.php',
        'Carbon\\CarbonTimeZone' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/CarbonTimeZone.php',
        'Carbon\\Cli\\Invoker' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/Cli/Invoker.php',
        'Carbon\\Exceptions\\BadUnitException' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/Exceptions/BadUnitException.php',
        'Carbon\\Exceptions\\InvalidDateException' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/Exceptions/InvalidDateException.php',
        'Carbon\\Exceptions\\NotAPeriodException' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/Exceptions/NotAPeriodException.php',
        'Carbon\\Exceptions\\NotLocaleAwareException' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/Exceptions/NotLocaleAwareException.php',
        'Carbon\\Exceptions\\ParseErrorException' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/Exceptions/ParseErrorException.php',
        'Carbon\\Factory' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/Factory.php',
        'Carbon\\FactoryImmutable' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/FactoryImmutable.php',
        'Carbon\\Language' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/Language.php',
        'Carbon\\Laravel\\ServiceProvider' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/Laravel/ServiceProvider.php',
        'Carbon\\Traits\\Boundaries' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/Traits/Boundaries.php',
        'Carbon\\Traits\\Cast' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/Traits/Cast.php',
        'Carbon\\Traits\\Comparison' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/Traits/Comparison.php',
        'Carbon\\Traits\\Converter' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/Traits/Converter.php',
        'Carbon\\Traits\\Creator' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/Traits/Creator.php',
        'Carbon\\Traits\\Date' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/Traits/Date.php',
        'Carbon\\Traits\\Difference' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/Traits/Difference.php',
        'Carbon\\Traits\\Localization' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/Traits/Localization.php',
        'Carbon\\Traits\\Macro' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/Traits/Macro.php',
        'Carbon\\Traits\\Mixin' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/Traits/Mixin.php',
        'Carbon\\Traits\\Modifiers' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/Traits/Modifiers.php',
        'Carbon\\Traits\\Mutability' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/Traits/Mutability.php',
        'Carbon\\Traits\\ObjectInitialisation' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/Traits/ObjectInitialisation.php',
        'Carbon\\Traits\\Options' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/Traits/Options.php',
        'Carbon\\Traits\\Rounding' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/Traits/Rounding.php',
        'Carbon\\Traits\\Serialization' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/Traits/Serialization.php',
        'Carbon\\Traits\\Test' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/Traits/Test.php',
        'Carbon\\Traits\\Timestamp' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/Traits/Timestamp.php',
        'Carbon\\Traits\\Units' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/Traits/Units.php',
        'Carbon\\Traits\\Week' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/Traits/Week.php',
        'Carbon\\Translator' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/Translator.php',
        'Http\\Adapter\\Guzzle6\\Client' => __DIR__ . '/..' . '/php-http/guzzle6-adapter/src/Client.php',
        'Http\\Adapter\\Guzzle6\\Promise' => __DIR__ . '/..' . '/php-http/guzzle6-adapter/src/Promise.php',
        'Http\\Client\\Exception' => __DIR__ . '/..' . '/php-http/httplug/src/Exception.php',
        'Http\\Client\\Exception\\HttpException' => __DIR__ . '/..' . '/php-http/httplug/src/Exception/HttpException.php',
        'Http\\Client\\Exception\\NetworkException' => __DIR__ . '/..' . '/php-http/httplug/src/Exception/NetworkException.php',
        'Http\\Client\\Exception\\RequestException' => __DIR__ . '/..' . '/php-http/httplug/src/Exception/RequestException.php',
        'Http\\Client\\Exception\\TransferException' => __DIR__ . '/..' . '/php-http/httplug/src/Exception/TransferException.php',
        'Http\\Client\\HttpAsyncClient' => __DIR__ . '/..' . '/php-http/httplug/src/HttpAsyncClient.php',
        'Http\\Client\\HttpClient' => __DIR__ . '/..' . '/php-http/httplug/src/HttpClient.php',
        'Http\\Client\\Promise\\HttpFulfilledPromise' => __DIR__ . '/..' . '/php-http/httplug/src/Promise/HttpFulfilledPromise.php',
        'Http\\Client\\Promise\\HttpRejectedPromise' => __DIR__ . '/..' . '/php-http/httplug/src/Promise/HttpRejectedPromise.php',
        'Http\\Discovery\\ClassDiscovery' => __DIR__ . '/..' . '/php-http/discovery/src/ClassDiscovery.php',
        'Http\\Discovery\\Exception' => __DIR__ . '/..' . '/php-http/discovery/src/Exception.php',
        'Http\\Discovery\\Exception\\ClassInstantiationFailedException' => __DIR__ . '/..' . '/php-http/discovery/src/Exception/ClassInstantiationFailedException.php',
        'Http\\Discovery\\Exception\\DiscoveryFailedException' => __DIR__ . '/..' . '/php-http/discovery/src/Exception/DiscoveryFailedException.php',
        'Http\\Discovery\\Exception\\NoCandidateFoundException' => __DIR__ . '/..' . '/php-http/discovery/src/Exception/NoCandidateFoundException.php',
        'Http\\Discovery\\Exception\\NotFoundException' => __DIR__ . '/..' . '/php-http/discovery/src/Exception/NotFoundException.php',
        'Http\\Discovery\\Exception\\PuliUnavailableException' => __DIR__ . '/..' . '/php-http/discovery/src/Exception/PuliUnavailableException.php',
        'Http\\Discovery\\Exception\\StrategyUnavailableException' => __DIR__ . '/..' . '/php-http/discovery/src/Exception/StrategyUnavailableException.php',
        'Http\\Discovery\\HttpAsyncClientDiscovery' => __DIR__ . '/..' . '/php-http/discovery/src/HttpAsyncClientDiscovery.php',
        'Http\\Discovery\\HttpClientDiscovery' => __DIR__ . '/..' . '/php-http/discovery/src/HttpClientDiscovery.php',
        'Http\\Discovery\\MessageFactoryDiscovery' => __DIR__ . '/..' . '/php-http/discovery/src/MessageFactoryDiscovery.php',
        'Http\\Discovery\\NotFoundException' => __DIR__ . '/..' . '/php-http/discovery/src/NotFoundException.php',
        'Http\\Discovery\\Psr17FactoryDiscovery' => __DIR__ . '/..' . '/php-http/discovery/src/Psr17FactoryDiscovery.php',
        'Http\\Discovery\\Psr18ClientDiscovery' => __DIR__ . '/..' . '/php-http/discovery/src/Psr18ClientDiscovery.php',
        'Http\\Discovery\\Strategy\\CommonClassesStrategy' => __DIR__ . '/..' . '/php-http/discovery/src/Strategy/CommonClassesStrategy.php',
        'Http\\Discovery\\Strategy\\CommonPsr17ClassesStrategy' => __DIR__ . '/..' . '/php-http/discovery/src/Strategy/CommonPsr17ClassesStrategy.php',
        'Http\\Discovery\\Strategy\\DiscoveryStrategy' => __DIR__ . '/..' . '/php-http/discovery/src/Strategy/DiscoveryStrategy.php',
        'Http\\Discovery\\Strategy\\MockClientStrategy' => __DIR__ . '/..' . '/php-http/discovery/src/Strategy/MockClientStrategy.php',
        'Http\\Discovery\\Strategy\\PuliBetaStrategy' => __DIR__ . '/..' . '/php-http/discovery/src/Strategy/PuliBetaStrategy.php',
        'Http\\Discovery\\StreamFactoryDiscovery' => __DIR__ . '/..' . '/php-http/discovery/src/StreamFactoryDiscovery.php',
        'Http\\Discovery\\UriFactoryDiscovery' => __DIR__ . '/..' . '/php-http/discovery/src/UriFactoryDiscovery.php',
        'Http\\Message\\MessageFactory' => __DIR__ . '/..' . '/php-http/message-factory/src/MessageFactory.php',
        'Http\\Message\\RequestFactory' => __DIR__ . '/..' . '/php-http/message-factory/src/RequestFactory.php',
        'Http\\Message\\ResponseFactory' => __DIR__ . '/..' . '/php-http/message-factory/src/ResponseFactory.php',
        'Http\\Message\\StreamFactory' => __DIR__ . '/..' . '/php-http/message-factory/src/StreamFactory.php',
        'Http\\Message\\UriFactory' => __DIR__ . '/..' . '/php-http/message-factory/src/UriFactory.php',
        'Http\\Promise\\FulfilledPromise' => __DIR__ . '/..' . '/php-http/promise/src/FulfilledPromise.php',
        'Http\\Promise\\Promise' => __DIR__ . '/..' . '/php-http/promise/src/Promise.php',
        'Http\\Promise\\RejectedPromise' => __DIR__ . '/..' . '/php-http/promise/src/RejectedPromise.php',
        'Psr\\Http\\Message\\MessageInterface' => __DIR__ . '/..' . '/psr/http-message/src/MessageInterface.php',
        'Psr\\Http\\Message\\RequestInterface' => __DIR__ . '/..' . '/psr/http-message/src/RequestInterface.php',
        'Psr\\Http\\Message\\ResponseInterface' => __DIR__ . '/..' . '/psr/http-message/src/ResponseInterface.php',
        'Psr\\Http\\Message\\ServerRequestInterface' => __DIR__ . '/..' . '/psr/http-message/src/ServerRequestInterface.php',
        'Psr\\Http\\Message\\StreamInterface' => __DIR__ . '/..' . '/psr/http-message/src/StreamInterface.php',
        'Psr\\Http\\Message\\UploadedFileInterface' => __DIR__ . '/..' . '/psr/http-message/src/UploadedFileInterface.php',
        'Psr\\Http\\Message\\UriInterface' => __DIR__ . '/..' . '/psr/http-message/src/UriInterface.php',
        'Symfony\\Component\\Translation\\Catalogue\\AbstractOperation' => __DIR__ . '/..' . '/symfony/translation/Catalogue/AbstractOperation.php',
        'Symfony\\Component\\Translation\\Catalogue\\MergeOperation' => __DIR__ . '/..' . '/symfony/translation/Catalogue/MergeOperation.php',
        'Symfony\\Component\\Translation\\Catalogue\\OperationInterface' => __DIR__ . '/..' . '/symfony/translation/Catalogue/OperationInterface.php',
        'Symfony\\Component\\Translation\\Catalogue\\TargetOperation' => __DIR__ . '/..' . '/symfony/translation/Catalogue/TargetOperation.php',
        'Symfony\\Component\\Translation\\Command\\XliffLintCommand' => __DIR__ . '/..' . '/symfony/translation/Command/XliffLintCommand.php',
        'Symfony\\Component\\Translation\\DataCollectorTranslator' => __DIR__ . '/..' . '/symfony/translation/DataCollectorTranslator.php',
        'Symfony\\Component\\Translation\\DataCollector\\TranslationDataCollector' => __DIR__ . '/..' . '/symfony/translation/DataCollector/TranslationDataCollector.php',
        'Symfony\\Component\\Translation\\DependencyInjection\\TranslationDumperPass' => __DIR__ . '/..' . '/symfony/translation/DependencyInjection/TranslationDumperPass.php',
        'Symfony\\Component\\Translation\\DependencyInjection\\TranslationExtractorPass' => __DIR__ . '/..' . '/symfony/translation/DependencyInjection/TranslationExtractorPass.php',
        'Symfony\\Component\\Translation\\DependencyInjection\\TranslatorPass' => __DIR__ . '/..' . '/symfony/translation/DependencyInjection/TranslatorPass.php',
        'Symfony\\Component\\Translation\\DependencyInjection\\TranslatorPathsPass' => __DIR__ . '/..' . '/symfony/translation/DependencyInjection/TranslatorPathsPass.php',
        'Symfony\\Component\\Translation\\Dumper\\CsvFileDumper' => __DIR__ . '/..' . '/symfony/translation/Dumper/CsvFileDumper.php',
        'Symfony\\Component\\Translation\\Dumper\\DumperInterface' => __DIR__ . '/..' . '/symfony/translation/Dumper/DumperInterface.php',
        'Symfony\\Component\\Translation\\Dumper\\FileDumper' => __DIR__ . '/..' . '/symfony/translation/Dumper/FileDumper.php',
        'Symfony\\Component\\Translation\\Dumper\\IcuResFileDumper' => __DIR__ . '/..' . '/symfony/translation/Dumper/IcuResFileDumper.php',
        'Symfony\\Component\\Translation\\Dumper\\IniFileDumper' => __DIR__ . '/..' . '/symfony/translation/Dumper/IniFileDumper.php',
        'Symfony\\Component\\Translation\\Dumper\\JsonFileDumper' => __DIR__ . '/..' . '/symfony/translation/Dumper/JsonFileDumper.php',
        'Symfony\\Component\\Translation\\Dumper\\MoFileDumper' => __DIR__ . '/..' . '/symfony/translation/Dumper/MoFileDumper.php',
        'Symfony\\Component\\Translation\\Dumper\\PhpFileDumper' => __DIR__ . '/..' . '/symfony/translation/Dumper/PhpFileDumper.php',
        'Symfony\\Component\\Translation\\Dumper\\PoFileDumper' => __DIR__ . '/..' . '/symfony/translation/Dumper/PoFileDumper.php',
        'Symfony\\Component\\Translation\\Dumper\\QtFileDumper' => __DIR__ . '/..' . '/symfony/translation/Dumper/QtFileDumper.php',
        'Symfony\\Component\\Translation\\Dumper\\XliffFileDumper' => __DIR__ . '/..' . '/symfony/translation/Dumper/XliffFileDumper.php',
        'Symfony\\Component\\Translation\\Dumper\\YamlFileDumper' => __DIR__ . '/..' . '/symfony/translation/Dumper/YamlFileDumper.php',
        'Symfony\\Component\\Translation\\Exception\\ExceptionInterface' => __DIR__ . '/..' . '/symfony/translation/Exception/ExceptionInterface.php',
        'Symfony\\Component\\Translation\\Exception\\InvalidArgumentException' => __DIR__ . '/..' . '/symfony/translation/Exception/InvalidArgumentException.php',
        'Symfony\\Component\\Translation\\Exception\\InvalidResourceException' => __DIR__ . '/..' . '/symfony/translation/Exception/InvalidResourceException.php',
        'Symfony\\Component\\Translation\\Exception\\LogicException' => __DIR__ . '/..' . '/symfony/translation/Exception/LogicException.php',
        'Symfony\\Component\\Translation\\Exception\\NotFoundResourceException' => __DIR__ . '/..' . '/symfony/translation/Exception/NotFoundResourceException.php',
        'Symfony\\Component\\Translation\\Exception\\RuntimeException' => __DIR__ . '/..' . '/symfony/translation/Exception/RuntimeException.php',
        'Symfony\\Component\\Translation\\Extractor\\AbstractFileExtractor' => __DIR__ . '/..' . '/symfony/translation/Extractor/AbstractFileExtractor.php',
        'Symfony\\Component\\Translation\\Extractor\\ChainExtractor' => __DIR__ . '/..' . '/symfony/translation/Extractor/ChainExtractor.php',
        'Symfony\\Component\\Translation\\Extractor\\ExtractorInterface' => __DIR__ . '/..' . '/symfony/translation/Extractor/ExtractorInterface.php',
        'Symfony\\Component\\Translation\\Extractor\\PhpExtractor' => __DIR__ . '/..' . '/symfony/translation/Extractor/PhpExtractor.php',
        'Symfony\\Component\\Translation\\Extractor\\PhpStringTokenParser' => __DIR__ . '/..' . '/symfony/translation/Extractor/PhpStringTokenParser.php',
        'Symfony\\Component\\Translation\\Formatter\\IntlFormatter' => __DIR__ . '/..' . '/symfony/translation/Formatter/IntlFormatter.php',
        'Symfony\\Component\\Translation\\Formatter\\IntlFormatterInterface' => __DIR__ . '/..' . '/symfony/translation/Formatter/IntlFormatterInterface.php',
        'Symfony\\Component\\Translation\\Formatter\\MessageFormatter' => __DIR__ . '/..' . '/symfony/translation/Formatter/MessageFormatter.php',
        'Symfony\\Component\\Translation\\Formatter\\MessageFormatterInterface' => __DIR__ . '/..' . '/symfony/translation/Formatter/MessageFormatterInterface.php',
        'Symfony\\Component\\Translation\\IdentityTranslator' => __DIR__ . '/..' . '/symfony/translation/IdentityTranslator.php',
        'Symfony\\Component\\Translation\\Loader\\ArrayLoader' => __DIR__ . '/..' . '/symfony/translation/Loader/ArrayLoader.php',
        'Symfony\\Component\\Translation\\Loader\\CsvFileLoader' => __DIR__ . '/..' . '/symfony/translation/Loader/CsvFileLoader.php',
        'Symfony\\Component\\Translation\\Loader\\FileLoader' => __DIR__ . '/..' . '/symfony/translation/Loader/FileLoader.php',
        'Symfony\\Component\\Translation\\Loader\\IcuDatFileLoader' => __DIR__ . '/..' . '/symfony/translation/Loader/IcuDatFileLoader.php',
        'Symfony\\Component\\Translation\\Loader\\IcuResFileLoader' => __DIR__ . '/..' . '/symfony/translation/Loader/IcuResFileLoader.php',
        'Symfony\\Component\\Translation\\Loader\\IniFileLoader' => __DIR__ . '/..' . '/symfony/translation/Loader/IniFileLoader.php',
        'Symfony\\Component\\Translation\\Loader\\JsonFileLoader' => __DIR__ . '/..' . '/symfony/translation/Loader/JsonFileLoader.php',
        'Symfony\\Component\\Translation\\Loader\\LoaderInterface' => __DIR__ . '/..' . '/symfony/translation/Loader/LoaderInterface.php',
        'Symfony\\Component\\Translation\\Loader\\MoFileLoader' => __DIR__ . '/..' . '/symfony/translation/Loader/MoFileLoader.php',
        'Symfony\\Component\\Translation\\Loader\\PhpFileLoader' => __DIR__ . '/..' . '/symfony/translation/Loader/PhpFileLoader.php',
        'Symfony\\Component\\Translation\\Loader\\PoFileLoader' => __DIR__ . '/..' . '/symfony/translation/Loader/PoFileLoader.php',
        'Symfony\\Component\\Translation\\Loader\\QtFileLoader' => __DIR__ . '/..' . '/symfony/translation/Loader/QtFileLoader.php',
        'Symfony\\Component\\Translation\\Loader\\XliffFileLoader' => __DIR__ . '/..' . '/symfony/translation/Loader/XliffFileLoader.php',
        'Symfony\\Component\\Translation\\Loader\\YamlFileLoader' => __DIR__ . '/..' . '/symfony/translation/Loader/YamlFileLoader.php',
        'Symfony\\Component\\Translation\\LoggingTranslator' => __DIR__ . '/..' . '/symfony/translation/LoggingTranslator.php',
        'Symfony\\Component\\Translation\\MessageCatalogue' => __DIR__ . '/..' . '/symfony/translation/MessageCatalogue.php',
        'Symfony\\Component\\Translation\\MessageCatalogueInterface' => __DIR__ . '/..' . '/symfony/translation/MessageCatalogueInterface.php',
        'Symfony\\Component\\Translation\\MetadataAwareInterface' => __DIR__ . '/..' . '/symfony/translation/MetadataAwareInterface.php',
        'Symfony\\Component\\Translation\\Reader\\TranslationReader' => __DIR__ . '/..' . '/symfony/translation/Reader/TranslationReader.php',
        'Symfony\\Component\\Translation\\Reader\\TranslationReaderInterface' => __DIR__ . '/..' . '/symfony/translation/Reader/TranslationReaderInterface.php',
        'Symfony\\Component\\Translation\\Translator' => __DIR__ . '/..' . '/symfony/translation/Translator.php',
        'Symfony\\Component\\Translation\\TranslatorBagInterface' => __DIR__ . '/..' . '/symfony/translation/TranslatorBagInterface.php',
        'Symfony\\Component\\Translation\\Util\\ArrayConverter' => __DIR__ . '/..' . '/symfony/translation/Util/ArrayConverter.php',
        'Symfony\\Component\\Translation\\Util\\XliffUtils' => __DIR__ . '/..' . '/symfony/translation/Util/XliffUtils.php',
        'Symfony\\Component\\Translation\\Writer\\TranslationWriter' => __DIR__ . '/..' . '/symfony/translation/Writer/TranslationWriter.php',
        'Symfony\\Component\\Translation\\Writer\\TranslationWriterInterface' => __DIR__ . '/..' . '/symfony/translation/Writer/TranslationWriterInterface.php',
        'Symfony\\Contracts\\Translation\\LocaleAwareInterface' => __DIR__ . '/..' . '/symfony/translation-contracts/LocaleAwareInterface.php',
        'Symfony\\Contracts\\Translation\\Test\\TranslatorTest' => __DIR__ . '/..' . '/symfony/translation-contracts/Test/TranslatorTest.php',
        'Symfony\\Contracts\\Translation\\TranslatorInterface' => __DIR__ . '/..' . '/symfony/translation-contracts/TranslatorInterface.php',
        'Symfony\\Contracts\\Translation\\TranslatorTrait' => __DIR__ . '/..' . '/symfony/translation-contracts/TranslatorTrait.php',
        'Symfony\\Polyfill\\Mbstring\\Mbstring' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/Mbstring.php',
        'UniversalPackageSystems\\Endpoint\\AbstractUpackageSystemEndpoint' => __DIR__ . '/..' . '/karneaud/universal_package_system/src/endpoints/AbstractUpackageSystemEndpoint.php',
        'UniversalPackageSystems\\Endpoint\\AbstractUpackageSystemEndpointResponse' => __DIR__ . '/..' . '/karneaud/universal_package_system/src/endpoints/AbstractUpackageSystemEndpointResponse.php',
        'UniversalPackageSystems\\Endpoint\\UpackageSystemAddresses' => __DIR__ . '/..' . '/karneaud/universal_package_system/src/endpoints/UpackageSystemAddresses.php',
        'UniversalPackageSystems\\Endpoint\\UpackageSystemAddressesResponse' => __DIR__ . '/..' . '/karneaud/universal_package_system/src/endpoints/UpackageSystemAddresses.php',
        'UniversalPackageSystems\\Endpoint\\UpackageSystemEndpointResponse' => __DIR__ . '/..' . '/karneaud/universal_package_system/src/endpoints/UpackageSystemEndpointResponse.php',
        'UniversalPackageSystems\\Endpoint\\UpackageSystemEstimates' => __DIR__ . '/..' . '/karneaud/universal_package_system/src/endpoints/UpackageSystemEstimates.php',
        'UniversalPackageSystems\\Endpoint\\UpackageSystemServiceAreas' => __DIR__ . '/..' . '/karneaud/universal_package_system/src/endpoints/UpackageSystemServiceAreas.php',
        'UniversalPackageSystems\\Endpoint\\UpackageSystemServiceAreasResponse' => __DIR__ . '/..' . '/karneaud/universal_package_system/src/endpoints/UpackageSystemServiceAreas.php',
        'UniversalPackageSystems\\Endpoint\\UpackageSystemShipments' => __DIR__ . '/..' . '/karneaud/universal_package_system/src/endpoints/UpackageSystemShipments.php',
        'UniversalPackageSystems\\TokenMethodsTrait' => __DIR__ . '/..' . '/karneaud/universal_package_system/src/TokenMethodsTrait.php',
        'UniversalPackageSystems\\TransportMethodsTrait' => __DIR__ . '/..' . '/karneaud/universal_package_system/src/TransportMethodsTrait.php',
        'UniversalPackageSystems\\UpackageSystemException' => __DIR__ . '/..' . '/karneaud/universal_package_system/src/UpackageSystemException.php',
        'UniversalPackageSystems\\UpackageSystemResponseInterface' => __DIR__ . '/..' . '/karneaud/universal_package_system/src/UpackageSystemResponseInterface.php',
        'UniversalPackageSystems\\UpackageSystemTokenInterface' => __DIR__ . '/..' . '/karneaud/universal_package_system/src/UpackageSystemTokenInterface.php',
        'UniversalPackageSystems\\UpackageSystemTransport' => __DIR__ . '/..' . '/karneaud/universal_package_system/src/UpackageSystemTransport.php',
        'UniversalPackageSystems\\UpackageSystemTransportInterface' => __DIR__ . '/..' . '/karneaud/universal_package_system/src/UpackageSystemTransportInterface.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5a4469c9b8d3934a369a3a25d7765a62::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5a4469c9b8d3934a369a3a25d7765a62::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5a4469c9b8d3934a369a3a25d7765a62::$classMap;

        }, null, ClassLoader::class);
    }
}
