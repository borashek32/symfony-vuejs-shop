<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class EditProductFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label'    => 'Title',
                'required' => true,
//                'constraints' => [
//                    new NotBlank([], 'Should be filled')
//                ]
            ])
            ->add('price', NumberType::class, [
                'label' => 'Price',
                'scale' => 2,
                'html5' => true,
                'attr'  => [
                    'step' => '0.1'
                ]
            ])
            ->add('quantity')
            ->add('description')
            ->add('is_published')
            ->add('is_deleted')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
