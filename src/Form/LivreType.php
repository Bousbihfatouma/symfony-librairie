<?php
namespace App\Form;
use App\Entity\Livre;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
class LivreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imageFile', FileType::class, [
                'required' => false,
                "label" => "Image du livre",
            ])
            ->add('nom')
            ->add('description', CKEditorType::class)
            //->add('imageName')
            //->add('slug')
            ->remove('updatedAt', DateTimeType::class, [
                'widget' =>'single_text',
                'data' => new \DateTimeImmutable(),
            ])
            ->add('categorie', EntityType::class, [
                'class' => 'App\Entity\Categorie',
            ])
            ->add('auteurs', EntityType::class, [
                'class' => 'App\Entity\Auteur',
                'multiple' => true,
                'attr'=> [
                    "class "=> "select2",
                    "id" =>"select2-auteurs"
                ]
            ])
        ;
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Livre::class,
            
        ]);
    }
}


























