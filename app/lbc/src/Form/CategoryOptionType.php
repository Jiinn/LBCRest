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
use Doctrine\DBAL\Types\IntegerType as TypesIntegerType;
use Doctrine\DBAL\Types\TextType as TypesTextType;

class CategoryOptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface  $builder, array $options)
    {
        $builder->add('id', IntegerType::class, [
                'constraints' => [
                    new Assert\NotBlank(array(
                        'message' => 'The option is not filled'
                    ))
                ]
            ])
            ;

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
            'data_class' => CategoryOption::class,
            // 'allow_extra_fields' => true
        ]);
    }
}
