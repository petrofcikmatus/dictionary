<?php

namespace App\Form\Word;

use App\Entity\AbstractWordInterface;
use App\Entity\Source;
use App\Entity\WordCategory;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CzechWordForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('content', TextType::class, [
                'label' => 'label.word',
                'empty_data' => '',
            ])
            ->add('languageNotePronunciation', TextType::class, [
                'label' => 'label.language_note.pronunciation',
                'required' => false,
                'empty_data' => '',
            ])
            ->add('languageNoteInflection', TextType::class, [
                'label' => 'label.language_note.inflection',
                'required' => false,
                'empty_data' => '',
            ])
            ->add('languageNoteExceptionToInflection', TextType::class, [
                'label' => 'label.language_note.exception_to_inflection',
                'required' => false,
                'empty_data' => '',
            ])
            ->add('languageNoteGender', ChoiceType::class, [
                'label' => 'label.language_note.gender',
                'choices' => [
                    'label.gender.masculine' => AbstractWordInterface::GENDER_MASCULINE,
                    'label.gender.feminine' => AbstractWordInterface::GENDER_FEMININE,
                    'label.gender.neuter' => AbstractWordInterface::GENDER_NEUTER,
                    'label.gender.not_applicable' => AbstractWordInterface::GENDER_UNKNOWN,
                ],
                'empty_data' => AbstractWordInterface::GENDER_UNKNOWN,
            ])
            ->add('languageNoteOther', TextareaType::class, [
                'label' => 'label.language_note.other',
                'required' => false,
                'empty_data' => '',
                'attr' => [
                    'style' => 'resize: vertical;',
                ],
            ])
            ->add('explanation', TextareaType::class, [
                'label' => 'label.explanation',
                'required' => false,
                'empty_data' => '',
                'attr' => [
                    'style' => 'resize: vertical;',
                ],
            ])
            ->add('explanationSourceInfo', TextType::class, [
                'label' => 'label.explanation_source_info',
                'required' => false,
                'empty_data' => '',
            ])
            ->add('explanationSourceDate', TextType::class, [
                'label' => 'label.explanation_source_date',
                'required' => false,
                'empty_data' => '',
            ])
            ->add('note', TextareaType::class, [
                'label' => 'label.note',
                'required' => false,
                'empty_data' => '',
                'attr' => [
                    'style' => 'resize: vertical;',
                ],
            ])
            ->add('categories', EntityType::class, [
                'label' => 'label.categories',
                'class' => WordCategory::class,
                'choice_label' => 'title',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('wc')->orderBy('wc.title', 'ASC');
                },
                'multiple' => true,
                'expanded' => true,
                'empty_data' => [],
            ])
            ->add('sources', EntityType::class, [
                'label' => 'label.sources',
                'class' => Source::class,
                'choice_label' => 'title',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('s')->orderBy('s.title', 'ASC');
                },
                'multiple' => true,
                'expanded' => true,
                'empty_data' => [],
            ])
            ->add('statusLight', ChoiceType::class, [
                'label' => 'label.status',
                'choices' => [
                    'label.status.ready' => AbstractWordInterface::STATUS_LIGHT_GREEN,
                    'label.status.needs_work' => AbstractWordInterface::STATUS_LIGHT_YELLOW,
                    'label.status.not_processed' => AbstractWordInterface::STATUS_LIGHT_RED,
                    'label.status.unknown' => AbstractWordInterface::STATUS_LIGHT_UNKNOWN,
                ],
                'expanded' => true,
                'empty_data' => AbstractWordInterface::STATUS_LIGHT_UNKNOWN,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefault('translation_domain', 'forms');
    }
}
