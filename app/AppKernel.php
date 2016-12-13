<?php

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = [
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Dunglas\ActionBundle\DunglasActionBundle(),
            new ApiPlatform\Core\Bridge\Symfony\Bundle\ApiPlatformBundle(),
            new Nelmio\CorsBundle\NelmioCorsBundle(),
            new Application\AdminBundle\ApplicationAdminBundle(),
            new Application\AppBundle\ApplicationAppBundle(),
            new Nelmio\ApiDocBundle\NelmioApiDocBundle(),
            new Application\CoreBundle\ApplicationCoreBundle(),
            new Application\EmailBundle\ApplicationEmailBundle(),
            new Application\ProductBundle\ApplicationProductBundle(),
            new Application\CategoryBundle\ApplicationCategoryBundle(),
            new Application\CustomerBundle\ApplicationCustomerBundle(),
            new Application\AutoBundle\ApplicationAutoBundle(),
            new Application\RealEstateBundle\ApplicationRealEstateBundle(),
            new Application\ElectronicsBundle\ApplicationElectronicsBundle(),
            new Application\FashionBundle\ApplicationFashionBundle(),
            new Application\HouseGardeningBundle\ApplicationHouseGardeningBundle(),
            new Application\FamilyBundle\ApplicationFamilyBundle(),
            new Application\SportBundle\ApplicationSportBundle(),
            new Application\PetsBundle\ApplicationPetsBundle(),
            new Application\IndustryBundle\ApplicationIndustryBundle(),
            new Application\BusinessBundle\ApplicationBusinessBundle(),
            new Application\JobsBundle\ApplicationJobsBundle(),
            new Application\ProducerBundle\ApplicationProducerBundle(),
            new Application\DoctrineBundle\ApplicationDoctrineBundle(),
        ];

        if (in_array($this->getEnvironment(), ['dev', 'test'], true)) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            $bundles[] = new Hautelook\AliceBundle\HautelookAliceBundle();
        }

        return $bundles;
    }

    public function getRootDir()
    {
        return __DIR__;
    }

    public function getCacheDir()
    {
        return dirname(__DIR__).'/var/cache/'.$this->getEnvironment();
    }

    public function getLogDir()
    {
        return dirname(__DIR__).'/var/logs';
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
}
