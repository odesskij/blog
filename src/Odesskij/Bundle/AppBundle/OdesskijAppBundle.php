<?php
namespace Odesskij\Bundle\AppBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * OdesskijAppBundle.
 *
 * @author Vladimir Odesskij <odesskij1992@gmail.com>
 */
class OdesskijAppBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
    }
}
