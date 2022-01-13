<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Patient;

class PatientController extends AbstractController
{
    /**
     * @Route("/patient", name="patient")
     */
    public function index(): Response
    {

        $patient = new Patient();

        $patient->setNumSS('168077511115257');
        $patient->setNom('Durand');
        $patient->setPrenom('Axel');
        $maDate = new \DateTime("1968-08-17");
        $patient->setDateNaissance($maDate);
        $patient->setGenre("M");

        $doctrine = $this->getDoctrine();
        $entityManager = $doctrine->getManager();

        $entityManager->persist($patient);
        $entityManager->flush();


        return $this->render('patient/index.html.twig', [
            'controller_name' => 'PatientController',
        ]);
    }

    public function list(): Response {

        $repository = $this->getDoctrine()->getManager()->getRepository(Patient::class);
        $patients = $repository->findAll();

        return $this->render('patient/list.html.twig', [
            'patients' => $patients,
        ]);
    }
}
