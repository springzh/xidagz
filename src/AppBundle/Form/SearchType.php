<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public $name;
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('userName','text', array('label'=>'姓名 *', 'attr'=>array('value'=>$this->name, 'placeholder'=>'请输入真实姓名','class'=>'form-control')))
            ->add('phoneNumber', 'text', array('label'=>'手机号码 *', 'attr'=>array('placeholder'=>'手机号码','class'=>'form-control')))
            ->add('major', 'text', array('label'=>'年级院系专业 *', 'attr'=>array('placeholder'=>'如“92水产”、“96蔬菜”','class'=>'form-control')))
            ->add('enrollmentTime', 'text', array('label'=>'入学年份', 'required'=>false,'attr'=>array('placeholder'=>'4位数字年份','class'=>'form-control')))
            ->add('department', 'text', array('label'=>'就读院系', 'required'=>false,'attr'=>array('placeholder'=>'就读院系的名称','class'=>'form-control')))
            ->add('profession', 'text', array('label'=>'行业', 'required'=>false,'attr'=>array('placeholder'=>'所在行业名称','class'=>'form-control')))
            ->add('company', 'text', array('label'=>'公司', 'required'=>false,'attr'=>array('placeholder'=>'所在公司名称','class'=>'form-control')))
            ->add('job', 'text', array('label'=>'职务', 'required'=>false,'attr'=>array('placeholder'=>'担任职务','class'=>'form-control')))
            ->add('address', 'text', array('label'=>'地址', 'required'=>false,'attr'=>array('placeholder'=>'联系地址','class'=>'form-control')))
            ->add('telephoneNumber', 'text', array('label'=>'座机', 'required'=>false,'attr'=>array('placeholder'=>'座机号码','class'=>'form-control')))
            ->add('faxNumber', 'text', array('label'=>'传真', 'required'=>false,'attr'=>array('placeholder'=>'传真号码','class'=>'form-control')))
            ->add('email', 'email', array('label'=>'邮箱', 'required'=>false,'attr'=>array('placeholder'=>'电子邮箱','class'=>'form-control')))
            ->add('qqNumber', 'text', array('label'=>'QQ', 'required'=>false,'attr'=>array('placeholder'=>'QQ号码','class'=>'form-control')))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            //'required'=>false,//Set HTML5 Validation unuseful
            'data_class' => 'AppBundle\Entity\Search'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'search';
    }
}
