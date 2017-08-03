<?php

namespace RentBikeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

use RentBikeBundle\Entity\User;

class UserController extends Controller
{
    public function indexAction()
    {
        return $this->render('RentBikeBundle:Default:index.html.twig');
    }

    /**
     * Listar Usuarios
     */
    public function listAction()
	{
		$em = $this->get("doctrine")->getManager();

		$query = $em->createQuery('SELECT u FROM RentBikeBundle:User u');

		$data = $query->getArrayResult();	

		return new JsonResponse(array('total' => count($data), 'data' => $data));

	}


    /**
	 * Guardar un usuario 
	 */
	public function saveAction()
	{
		$em = $this->get("doctrine")->getManager();

		$request = $this->container->get('request_stack')->getCurrentRequest();
		$response = null;

        //$request = $this->get('request');

        //Obtenemos los datos que nos envia el cliente
        $data = $request->getContent();
        $data = json_decode($data, true);

        print_r($data);

        $userSearch = $em->getRepository('RentBikeBundle:User')->findOneBy(array('email'=>$data['email']));

        if($userSearch){
           	$response = array('status'=> 200, 'msj' =>'Ya existe un usuario registrado con este email');
        }
	
        if(count($data) > 0){
        	
        	$user = new User();

        	$user->setEmail($data['email']);
        	$user->setPassword($data['password']);
        	$user->setFirstname($data['firstname']);
        	$user->setLastname($data['lastname']);
        	$user->setSecondname($data['secondname']);
        	$user->setSecondlastname($data['secondlastname']);
        		
        	//$user->setType($data['type']);

        	$em->persist($user);
        	$em->flush();

        }

        $userSearch = $em->getRepository('RentBikeBundle:User')->findOneBy(array('email'=>$data['email']));

        if($userSearch){
            
            $response = array('status'=> 200, 'msj' =>'Usuario creado exitosamente');
            
        }else{
            $response = array('status'=> 500, 'msj' =>'Ha ocurrido un error');
        }

        return new JsonResponse($response);
	}
}
