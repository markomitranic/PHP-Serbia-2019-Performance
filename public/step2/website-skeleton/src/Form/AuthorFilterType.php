<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class AuthorFilterType
 * @package App\Form
 */
class AuthorFilterType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setMethod('GET')
            ->add('dateFrom', DateType::class, ['label' => 'Date from'])
            ->add('dateTo', DateType::class, ['label' => 'Date to'])
            ->add('get', SubmitType::class)
        ;
    }
}