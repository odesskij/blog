<?php
namespace {
    // if you don't want to setup permissions the proper way, just uncomment the following PHP line
// read http://symfony.com/doc/current/book/installation.html#configuration-and-setup for more information
//umask(0000);
    set_time_limit(0);

    define('SYMFONY_ROOT', realpath(__DIR__ . '/..'));

    require_once __DIR__ . '/../bootstrap.php.cache';

    use Odesskij\Model\AppKernel;
    use Symfony\Bundle\FrameworkBundle\Console\Application;
    use Symfony\Component\Console\Input\ArgvInput;
    use Symfony\Component\Debug\Debug;

    $input = new ArgvInput();
    $env = $input->getParameterOption(['--env', '-e'], getenv('SYMFONY_ENV') ?: 'dev');
    $debug = getenv('SYMFONY_DEBUG') !== '0' && !$input->hasParameterOption(['--no-debug', '']) && $env !== 'prod';

    if ($debug) {
        Debug::enable();
    }

    $kernel = new AppKernel($env, $debug);
    $application = new Application($kernel);
    $application->run($input);

}
