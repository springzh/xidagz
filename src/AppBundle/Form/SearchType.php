<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('userName','text', array('label'=>'姓名(必填)'))
            ->add('phoneNumber', 'text', array('label'=>'手机号码(必填)'))
            ->add('major', 'text', array('label'=>'年级院系专业(必填)'))
            ->add('enrollmentTime', 'text', array('label'=>'入学年份'))
            ->add('department', 'text', array('label'=>'就读院系'))
            ->add('profession', 'text', array('label'=>'行业'))
            ->add('company', 'text', array('label'=>'公司'))
            ->add('job', 'text', array('label'=>'职务'))
            ->add('address', 'text', array('label'=>'地址'))
            ->add('telephoneNumber', 'text', array('label'=>'座机'))
            ->add('faxNumber', 'text', array('label'=>'传真'))
            ->add('email', 'email', array('label'=>'邮箱'))
            ->add('qqNumber', 'text', array('label'=>'QQ'))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Search'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_search';
    }
}
