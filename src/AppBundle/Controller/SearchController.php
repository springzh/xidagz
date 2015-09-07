<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Search;
use AppBundle\Form\SearchType;

/**
 * Search controller.
 *
 */
class SearchController extends Controller
{

    public function indexAction(){
        return $this->render('AppBundle:Search:index.html.twig', array(
            'errorHint' => '',
            'entities' => '',
            'name' => '',
            'phone' => '',
        ));
    }

    /**
     * Lists all Search entities.
     *
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Search')->findAll();

        return $this->render('AppBundle:Search:list.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Search entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Search();
        $name = '';
        $form = $this->createCreateForm($entity, $name);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            //return $this->redirect($this->generateUrl('search_show', array('id' => $entity->getId())));
            return $this->render('AppBundle:Search:index.html.twig', array(
                'errorHint' => '',
                'entities' => '新建成功',
                'name' => '',
                'phone' => '',
            ));
        }

        return $this->render('AppBundle:Search:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Search entity.
     *
     * @param Search $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Search $entity, $name)
    {
        $searchObj = new SearchType();
        $searchObj->name = $name;
        $form = $this->createForm($searchObj, $entity, array(
            'action' => $this->generateUrl('search_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => '新建', 'attr' => array('class' => 'btn btn-primary btn-sm-5')));

        return $form;
    }

    /**
     * Displays a form to create a new Search entity.
     *
     */
    public function newAction(Request $request)
    {
        $name = $request->get('name');
        $entity = new Search();
        $form   = $this->createCreateForm($entity, $name);

        return $this->render('AppBundle:Search:new.html.twig', array(
            'entity' => $entity,
            'name' => $name,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Search entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Search')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Search entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:Search:show.html.twig', array(
            'entity'      => $entity,
            'errorHint' => '',
        ));
    }

    /**
     * Displays a form to edit an existing Search entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Search')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Search entity.');
        }

        $editForm = $this->createEditForm($entity, $entity->getuserName());
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:Search:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Search entity.
    *
    * @param Search $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Search $entity, $name)
    {
        $searchObj = new SearchType();
        $searchObj->name = $name;
        $form = $this->createForm($searchObj, $entity, array(
            'action' => $this->generateUrl('search_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        return $form;
    }
    /**
     * Edits an existing Search entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Search')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Search entity.');
        }

        //$deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity, '');
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $entity->setUserName($request->get('search[userName]'));
            $entity->setPhoneNumber($request->get('search[phoneNumber]'));
            $entity->setMajor($request->get('search[major]'));
            $entity->setEnrollmentTime($request->get('search[enrollmentTime]'));
            $entity->setDepartment($request->get('search[department]'));
            $entity->setProfession($request->get('search[profession]'));
            $entity->setCompany($request->get('search[company]'));
            $entity->setJob($request->get('search[job]'));
            $entity->setAddress($request->get('search[address]'));
            $entity->setTelephoneNumber($request->get('search[telephoneNumber]'));
            $entity->setFaxNumber($request->get('search[faxNumber]'));
            $entity->setEmail($request->get('search[email]'));
            $entity->setDepartment($request->get('search[qqNumber]'));
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('search_list', array('id' => $id)));
            /*return $this->render('AppBundle:Search:index.html.twig', array(
                'errorHint' => '',
                'entities' => '修改成功',
                'name' => '',
                'phone' => '',
            ));*/
        }
        return $this->render('AppBundle:Search:index.html.twig', array(
            'errorHint' => $request->get('search[userName]'),
            'entities' => '',
            'name' => '',
            'phone' => '',
        ));
        /*return $this->render('AppBundle:Search:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));*/
    }
    /**
     * Deletes a Search entity.
     *
     */
    public function deleteAction($id)
    {
        if ($id) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Search')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Search entity.');
            }

            $em->remove($entity);
            $em->flush();

            $checkResult = $em->getRepository('AppBundle:Search')->find($id);
            if(!$checkResult){
                return $this->render('AppBundle:Search:index.html.twig', array(
                    'errorHint' => '',
                    'entities' => '删除成功',
                    'name' => '',
                    'phone' => '',
                ));
            }
            else{
                return $this->render('AppBundle:Search:show.html.twig', array(
                    'entity'  => $entity,
                    'errorHint' => '删除失败',
                ));
            }
        }
    }

    public function searchAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $nameSearch = trim($request->get('nameSearch'));
        $phoneSearch = trim($request->get('phoneSearch'));
        $phoneLen = strlen($phoneSearch);
        if($nameSearch && $phoneSearch && $phoneLen == 4){
            $result = $em->getRepository('AppBundle:Search')->findBy(array('userName'=>$nameSearch ));

            if($result){
                $phoneNum = substr($result[0]->getPhoneNumber(),-4);
                if($phoneSearch == $phoneNum){
                    return $this->render('AppBundle:Search:show.html.twig', array(
                        'entity' => $result[0],
                        'errorHint' => '',
                    ));
                }
            }
            else{
                return $this->render('AppBundle:Search:index.html.twig', array(
                    'errorHint' => '您输入的条件未能匹配到任何联系人。你可以修改条件重新查询，或者新建联系人。',
                    'entities' => '',
                    'name' => $nameSearch,
                    'phone' => $phoneSearch,
                ));
            }
        }
        else{
            return $this->render('AppBundle:Search:index.html.twig', array(
                'errorHint' => '查询字段为空或有误',
                'entities' => '',
                'name' => $nameSearch,
                'phone' => $phoneSearch,
            ));
        }
    }

    /**
     * Creates a form to delete a Search entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('search_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => '删除', 'attr' => array('class'=>'btn btn-primary btn-sm-5','sytle'=>'position: relative; top: ;')))
            ->getForm()
        ;
    }
}
