<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormTypeInterface;


use Doctrine\ORM\EntityRepository;

use App\Entity\ProductCategory;
use App\Entity\CategoryOption;
use App\Entity\Product;
use Doctrine\DBAL\Types\TextType as TypesTextType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface  $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(array(
                        'message' => 'The title is not filled'
                    )),
                    new Assert\Length(array(
                        'min' => 1,
                        'max' => 255,
                        'minMessage' => 'Please enter 1 characters minimum',
                        'maxMessage' => 'Please enter 255 characters maximum'
                    ))
                ]
            ])
            ->add('content', TextType::class, [
                'constraints' => [
                    new Assert\Length(array(
                        'max' => 2000,
                        'maxMessage' => 'Please enter 2000 characters maximum'
                    ))
                ]
            ])
            ->add(
                'product_category',
                EntityType::class,
                [
                    'class' => ProductCategory::class,
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('c')
                            ->orderBy('c.id', 'ASC');
                    },
                    'constraints' => [
                        new Assert\NotBlank(['message' => 'The category is not filled'])
                    ]
                ]
            );
        // if ($options['mode'] == 1) {
        //     // $builder->add(
            //     'option1',
            //     EntityType::class,
            //     [
            //         'class' => CategoryOption::class,
            //         'query_builder' => function (EntityRepository $er) {
            //             return $er->createQueryBuilder('c')
            //                 ->orderBy('c.id', 'ASC');
            //         },
            //         'constraints' => [
            //             new Assert\NotBlank(['message' => 'The Option1 is not filled'])
            //         ]
            //     ]
            // )
            //     ->add(
            //         'option2',
            //         EntityType::class,
            //         [
            //             'class' => CategoryOption::class,
            //             'query_builder' => function (EntityRepository $er) {
            //                 return $er->createQueryBuilder('c')
            //                     ->orderBy('c.id', 'ASC');
            //             },
            //             'constraints' => [
            //                 new Assert\NotBlank(['message' => 'The Option1 is not filled'])
            //             ]
            //         ]
            //     )
                // ->add('options', CategoryOptionType::class)
                // ->add('options', CollectionType::class, array(
                //    'entry_type' => CategoryOptionType::class,
                //    'allow_add'    => true,
                // 'allow_delete' => true,
                // 'by_reference' => false,
                // ))
        //     ;
        // }

        // if ($options['update'] == true) {
        //     $builder->add('submit', SubmitType::class, array(
        //         'attr' => array(
        //             'class' => 'btn btn-warning btn-block'
        //         ),
        //         'label' => 'Modifier la categorie'
        //     ));
        // } else {
        //     $builder->add('submit', SubmitType::class, array(
        //         'attr' => array(
        //             'class' => 'btn btn-success btn-block'
        //         ),
        //         'label' => 'Ajouter la categorie'
        //     ));
        // }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
            // 'csrf_protection' => false,
            'allow_extra_fields' => true,
            // 'mode' => 0,
        ]);
    }
}
