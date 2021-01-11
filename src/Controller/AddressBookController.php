<?php


namespace App\Controller;


use App\Entity\AddressBook;
use App\Form\AddressBookType;
use App\Services\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class AddressBookController extends AbstractController
{
    /**
     * @Route("/",name="home")
    */
    public function homeIndex(){
        $em = $this->getDoctrine()->getManager();
        $address_book_repo = $em->getRepository(AddressBook::class);
        $address_books = $address_book_repo->getAll();
        return $this->render("AddressBook/index.html.twig",["address_books"=>$address_books]);
    }

    /**
     * @Route("/add",name="add")
     * @param Request $request
     * @param ValidatorInterface $validator
     * @param FileUploader $file_uploader
     * @return RedirectResponse|Response
     */
    public function addIndex(Request $request,ValidatorInterface $validator,FileUploader $file_uploader){
        $address_book = new AddressBook();
        $form = $this->createForm(AddressBookType::class,$address_book);
        $form->handleRequest($request);
        $errors = [];
        if ($form->isSubmitted()){
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                /** @var UploadedFile $file */
                $file = $request->files->get("address_book")["PictureFile"];
                $file_name = $file_uploader->upload($file);
                $address_book->setPicture($file_name);
                $em->persist($address_book);
                $em->flush();
                return $this->redirect($this->generateUrl("home"));
            }
            else {
                $errors = $validator->validate($form);
            }
        }
        return $this->render("AddressBook/form.html.twig",[
            'form' => $form->createView(),
            'picture_path' => "#",
            'errors' => $errors
        ]);
    }

    /**
     * @Route("/edit/{address_book}",name="edit")
     * @param Request $request
     * @param AddressBook $address_book
     * @param ValidatorInterface $validator
     * @param FileUploader $file_uploader
     * @return RedirectResponse|Response
     */
    public function editIndex(Request $request,AddressBook $address_book,ValidatorInterface $validator,FileUploader $file_uploader){
        $form = $this->createForm(AddressBookType::class,$address_book);
        $form->handleRequest($request);
        $errors = [];
        $picture_name = $address_book->getPicture();
        if ($form->isSubmitted()){
            /** @var UploadedFile $file */
            $file = $request->files->get("address_book")["PictureFile"];
            if ($file){
                $picture_name = $file->getClientOriginalName();
            }
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                /** @var UploadedFile $file */
                $file = $request->files->get("address_book")["PictureFile"];
                if ($file) {
                    $file_uploader->remove($address_book->getPicture());
                    $file_name = $file_uploader->upload($file);
                    $address_book->setPicture($file_name);
                }
                $em->persist($address_book);
                $em->flush();
                return $this->redirect($this->generateUrl("home"));
            }
            else {
                $errors = $validator->validate($form);
            }
        }
        return $this->render("AddressBook/form.html.twig",[
            'form' => $form->createView(),
            'picture_path' => "/uploads/".$address_book->getPicture(),
            'picture_name' => $picture_name,
            'errors' => $errors
        ]);
    }

    /**
     * @Route("/delete/{address_book}",name="delete")
     * @param Request $request
     * @param AddressBook $address_book
     * @param FileUploader $file_uploader
     * @return RedirectResponse|Response
     */
    public function deleteIndex(Request $request,AddressBook $address_book,FileUploader $file_uploader){
        $em = $this->getDoctrine()->getManager();
        $file_uploader->remove($address_book->getPicture());
        $em->remove($address_book);
        $em->flush();
        return $this->redirect($this->generateUrl("home"));
    }
}