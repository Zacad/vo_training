<?php

namespace App\FormType;

use App\ValueObject\Email;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\DataMapperInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmailType extends AbstractType implements DataMapperInterface
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', \Symfony\Component\Form\Extension\Core\Type\EmailType::class)
            ->setDataMapper($this);
    }

    public function mapDataToForms($viewData, iterable $forms)
    {
        if (null === $viewData) {
            return;
        }

        $forms = iterator_to_array($forms);
        $forms['email']->setData($viewData->toString());
    }

    public function mapFormsToData(iterable $forms, &$viewData)
    {
        $forms = iterator_to_array($forms);
        $viewData = new Email($forms['email']->getData());
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'empty_data' => null,
            ]
        );
    }
}