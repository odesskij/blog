<?php
namespace Odesskij\Bundle\AppBundle\Service;

/**
 * FakerFactory.
 *
 * @author Vladimir Odesskij <odesskij1992@gmail.com>
 */
class FakerFactory
{
    /**
     * @param string $locale
     * @return \Faker\Generator
     */
    public function create($locale = \Faker\Factory::DEFAULT_LOCALE)
    {
        return \Faker\Factory::create($locale);
    }
}