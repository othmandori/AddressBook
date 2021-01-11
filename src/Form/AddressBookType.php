<?php


namespace App\Form;

use App\Entity\AddressBook;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class AddressBookType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('FirstName', TextType::class, ['label' => 'First Name','attr'=>['class'=>'from-control']]);
        $builder->add('LastName', TextType::class, ['label' => 'Last Name','attr'=>['class'=>'from-control']]);
        $builder->add('StreetAddress', TextType::class, ['label' => 'Street Address','attr'=>['class'=>'from-control']]);
        $builder->add('ZipCode', TextType::class, ['label' => 'Zip Code','attr'=>['class'=>'from-control']]);
        $builder->add('City', TextType::class, ['label' => 'City','attr'=>['class'=>'from-control']]);
        $builder->add('Country', CountryType::class, ['label' => 'Country','attr'=>['class'=>'from-control']]);
        $builder->add('PhoneNumber', TelType::class, ['label' => 'Phone Number','attr'=>['class'=>'from-control']]);
        $builder->add('BirthDate', DateType::class, ['label' => 'Birth Date', 'invalid_message' => "You've Entered an Invalid Date",'attr'=>['class'=>'from-control']]);
        $builder->add('EmailAddress', EmailType::class, ['label' => 'Email Address','attr'=>['class'=>'from-control']]);
        $data = $builder->getData();
        if ($data->getPicture() != null){
            $builder->add('PictureFile', FileType::class, ['required'=>false,'mapped'=>false,'label' => 'Picture','attr'=>['class'=>'from-control'],'data_class'=>null]);
        }
        else {
            $builder->add('PictureFile', FileType::class, ['constraints'=>[new NotBlank(["message"=>"Picture Is Required"])],'required'=>false,'mapped'=>false,'label' => 'Picture','attr'=>['class'=>'from-control'],'data_class'=>null]);
        }
        $builder->add('Submit', SubmitType::class, ['label' => 'Submit','attr'=>['formnovalidate'=>true,'class'=>'btn btn-primary float-right']]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AddressBook::class,
        ]);
    }

}