<?php

declare(strict_types=1);

namespace App\Admin\Weather;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

final class WeatherAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('id')
            ->add('date')
            ->add('dateUNIX')
            ->add('latitude')
            ->add('longitude')
            ->add('timezone')
            ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->addIdentifier('id')
            ->add('date')
            ->add('dateUNIX')
            ->add('latitude')
            ->add('longitude')
            ->add('timezone')
            ->add('_action', null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ]);
    }

    protected function configureFormFields(FormMapper $formMapper): void
    {
        $formMapper
            ->add('id')
            ->add('date')
            ->add('dateUNIX')
            ->add('latitude')
            ->add('longitude')
            ->add('timezone')
            ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id')
            ->add('date')
            ->add('dateUNIX')
            ->add('latitude')
            ->add('longitude')
            ->add('timezone')
            ;
    }
}
