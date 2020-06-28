<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\Pager;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\Form\Type\DatePickerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class LoggerAdmin extends AbstractAdmin
{
    protected $datagridValues = array(
        '_page' => 1,
        '_sort_order' => 'DESC',
        '_sort_by' => 'id',
    );

    protected $maxPerPage = 100;

    protected $pagerType = Pager::TYPE_SIMPLE;

    protected $perPageOptions = [50, 100, 200, 400];

    protected function configureRoutes(RouteCollection $collection)
    {
        parent::configureRoutes($collection);

        $collection->remove('show');
        $collection->remove('export');
        $collection->remove('delete');
        $collection->remove('create');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('id')
            ->add('name')
            ->add('type')
            ->add('start')
            ->add('end')
            ->add('duration')
            ->add('result')
            ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->addIdentifier('id')
            ->add('name')
            ->add('type')
            ->add('result')
            ->add('start', null, [
                'format' => 'd/m/Y H:i:s'
            ])
            ->add('end', null, [
                'format' => 'd/m/Y H:i:s'
            ])
            ->add('duration')
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
            ->with('Meta Informations', [
                'class' => 'col-xs-12',
                'box_class' => 'box box-solid box-warning'
            ])
            ->add('id', TextType::class, [
                'disabled' => true,
                'required' => false,
                'label' => 'Identifiant',
            ])
            ->end()
            ->with('Général', [
                'class' => 'col-xs-12',
                'box_class' => 'box box-solid box-success'
            ])
            ->add('name', TextType::class, [
                'disabled' => true,
                'required' => false,
            ])
            ->add('type', TextType::class, [
                'disabled' => true,
                'required' => false,
            ])
            ->add('start', DatePickerType::class, [
                'disabled' => true,
                'required' => false,
                'label' => 'Début',
                'format' => 'dd/MM/yyyy, H:mm:ss',
                'view_timezone' => 'Europe/Paris'
            ])
            ->add('end', DatePickerType::class, [
                'disabled' => true,
                'required' => false,
                'label' => 'Fin',
                'format' => 'dd/MM/yyyy, H:mm:ss',
                'view_timezone' => 'Europe/Paris'
            ])
            ->add('duration', TextType::class, [
                'disabled' => true,
                'required' => false,
            ])
            ->add('result', null, [
                'disabled' => true,
            ])
            ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id')
            ->add('command')
            ->add('start')
            ->add('end')
            ->add('duration')
            ->add('result')
            ;
    }
}
