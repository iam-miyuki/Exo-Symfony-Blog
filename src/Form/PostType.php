<?php

namespace App\Form;

use App\Entity\Post;
use App\Entity\Author;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('content')
            ->add('author', EntityType::class, ['class' => Author::class])
            ->add('publishedAt')
            ->add('save', SubmitType::class, [
                'label' => 'Envoyer'
            ])
            ->getForm();

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'=>Post::class //définir l'entité qui est lié à cette formulaire
        ]);
    }
        
    }
