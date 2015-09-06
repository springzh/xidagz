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

    /**
     * Lists all Search entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Search')->findAll();

        return $this->render('AppBundle:Search:index.html.twig', array(
            'entities' => $entities,
            'nothingHint' => '',
            'title' => '通信录列表',
            'count' => '',
        ));
    }
    /**
     * Creates a new Search entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Search();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('search_show', array('id' => $entity->getId())));
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
    private function createCreateForm(Search $entity)
    {
        $form = $this->createForm(new SearchType(), $entity, array(
            'action' => $this->generateUrl('search_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create', 'attr' => array('class' => 'btn btn-primary')));

        return $form;
    }

    /**
     * Displays a form to create a new Search entity.
     *
     */
    public function newAction()
    {
        $entity = new Search();
        $form   = $this->createCreateForm($entity);

        return $this->render('AppBundle:Search:new.html.twig', array(
            'entity' => $entity,
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
            'delete_form' => $deleteForm->createView(),
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

        $editForm = $this->createEditForm($entity);
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
    private function createEditForm(Search $entity)
    {
        $form = $this->createForm(new SearchType(), $entity, array(
            'action' => $this->generateUrl('search_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

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

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('search_edit', array('id' => $id)));
        }

        return $this->render('AppBundle:Search:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Search entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Search')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Search entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('search'));
    }

    public function searchAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $searchText = trim($request->get('searchText'));
        $searchArray = explode(" ",$searchText);
        if($searchText){
            $result = $em->getRepository('AppBundle:Search')->findBy(array('userName'=>$searchArray[0] ));
            $resultCount = count($result);
            $phoneNum = substr($result[0]->getPhoneNumber(),-4);
            if($result && $searchArray[1] == $phoneNum){
                return $this->render('AppBundle:Search:index.html.twig', array(
                    'entities' => $result,
                    'nothingHint' => '',
                    'title' => '搜索结果',
                    'count' => $resultCount,
                ));
            }
            else{
                return $this->render('AppBundle:Search:index.html.twig', array(
                    'nothingHint' => 'nothing search',
                    'entities' => '',
                    'title' => '搜索结果',
                    'count' => 0,
                ));
            }
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
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
