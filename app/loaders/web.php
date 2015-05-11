<?php
namespace {
    use Odesskij\Model\AppKernel;
    use Symfony\Component\HttpFoundation\Request;

    define('SYMFONY_ENV', getenv('SYMFONY_ENV'));
    define('SYMFONY_APPNAME', getenv('SYMFONY_APPNAME'));
    define('SYMFONY_ROOT', realpath(__DIR__ . '/..'));

    $debug = SYMFONY_ENV !== 'prod';

    if (!(SYMFONY_ENV && SYMFONY_APPNAME)) {
        throw new \Exception('Wrong environment.');
    }

    $loader = require_once __DIR__ . '/../bootstrap.php.cache';

    // Enable APC for autoloading to improve performance.
    // You should change the ApcClassLoader first argument to a unique prefix
    // in order to prevent cache key conflicts with other applications
    // also using APC.
    /*
    $apcLoader = new ApcClassLoader(sha1(__FILE__), $loader);
    $loader->unregister();
    $apcLoader->register(true);
    */
//require_once __DIR__.'/../app/AppCache.php';

    $kernel = new AppKernel(SYMFONY_ENV, $debug);
    $kernel->loadClassCache();
//$kernel = new AppCache($kernel);

// When using the HttpCache, you need to call the method in your front controller instead of relying on the configuration parameter
//Request::enableHttpMethodParameterOverride();

    $request = Request::createFromGlobals();
    $response = $kernel->handle($request);
    $response->send();
    $kernel->terminate($request, $response);

}