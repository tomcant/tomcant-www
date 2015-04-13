<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Enquiry;
use AppBundle\Form\EnquiryType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Default:index.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction(Request $request)
    {
        $enquiry = new Enquiry();

        $form = $this->createForm(new EnquiryType(), $enquiry, array(
            'action' => $this->generateUrl('contact'),
        ));

        $form->handleRequest($request);

        if ($form->isValid()) {
            // Save the enquiry to the database.
            $em = $this->getDoctrine()->getManager();
            $em->persist($enquiry);
            $em->flush();

            // Send an email notification.
            $mailer = $this->get('mailer');

            $message = $mailer->createMessage()
                ->setSubject('Contact enquiry from tomcant.name')
                ->setFrom('enquiries@tomcant.name')
                ->setTo('tomcant@gmail.com')
                ->setBody($this->renderView('AppBundle:Default:enquiryEmail.txt.twig', array(
                    'enquiry' => $enquiry,
                )))
            ;

            $mailer->send($message);

            $this->addFlash(
                'notice',
                'Thank you for your message. I will get back to you as soon as possible.'
            );

            return $this->redirectToRoute('home');
        }

        return $this->render('AppBundle:Default:contact.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
