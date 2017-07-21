<?php

namespace RentBikeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    public function indexAction()
    {
        return $this->render('RentBikeBundle:Default:index.html.twig');
    }

    /**
	 * Guardar un usuario 
	 */
	public function saveAction()
	{
		// $em = $this->get("doctrine")->getManager();

  //       $request = $this->get('request');

  //       //Obtenemos los datos que nos envia el cliente
  //       $data = $request->getContent();
  //       $data = json_decode($data, true);

  //       $userSearch = $em->getRepository('RentBikeBundle:User')->findOneBy(array('email'=>$data['email']));

  //       if($userSearch){
  //           return new JsonResponse(array('status'=> 200, 'msj' =>'Ya existe un usuario registrado con este email'));
  //       }
	
  //       if(count($data) > 0){
        	
  //       	$user = new User();

  //       	$user->setEmail($data['email']);
  //       	$user->setPassword($data['password']);
  //       	$user->setFirstname($data['firstname']);
  //       	$user->setLastname($data['lastname']);
  //       	$user->setSecondname($data['secondname']);
  //       	$user->setSecondlastname($data['secondlastname']);
        		
  //       	//$user->setType($data['type']);

  //       	$em->persist($user);
  //       	$em->flush();

  //       }

  //       $userSearch = $em->getRepository('RentBikeBundle:User')->findOneBy(array('email'=>$data['email']));

  //       if($userSearch){
            
  //           return new JsonResponse(array('status'=> 200, 'msj' =>'Usuario creado exitosamente'));
            
  //       }else{
  //           return new JsonResponse(array('status'=> 500, 'msj' =>'Ha ocurrido un error'));
  //       }

	}

	/**
	 * Listar usuarios
	 */
	public function listAction(Request $request)
	{
		$em = $this->get("doctrine")->getManager();

		$query = $em->createQuery('SELECT u FROM RentBikeBundle:User u');

		$data = $query->getArrayResult();	

		//print_r($data);

		if($data){
			return new JsonResponse(array('total' => count($data), 'data' => $data));
		}else{
			return new JsonResponse(array('Ha ocurrido un error.'));
		}

	}
}
