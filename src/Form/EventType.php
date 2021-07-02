<?php

namespace App\Form;

use App\Entity\CategoryFormation;
use App\Entity\City;
use App\Entity\Event;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('start', DateTimeType::class, [
                'date_widget' => 'single_text'
            ])
            ->add('end', DateTimeType::class, [
                'date_widget' => 'single_text'
            ])
            ->add('cities', EntityType::class, [
                'class' => City::class,
                'expanded' => true,
                'multiple' => true,
                'required' => true
            ])
            ->add('description')
            ->add('all_day')
            ->add('categoryFormation', EntityType::class, [
                'class' => CategoryFormation::class,
                'choice_label' => 'title',
                'placeholder' =>'-- Select a category --',
                'required' => true
            ])
        ;

        $builder->get('categoryFormation')->addEventListener(
            FormEvents::PRE_SUBMIT,
            function(FormEvent $event) {
                $form = $event->getForm();
                dump($form);
            //    $form->add('categoryFormation', EntityType::class, [
                //        'class' =>'App\Entity\CategoryFormation',
                //        'placeholder' => 'Select a category',
                //        'choices' => $form->getData()->getCategoryFormation();
                //    ]);
            }
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
