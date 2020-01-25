<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MaillerController extends AbstractController
{
    /**
     * @Route("/api/ag-renovation/send-mail", name="api_mail", methods={"POST"})
     * @param Request $request
     * @param \Swift_Mailer $mailer
     */
    public function sendMail(Request $request, \Swift_Mailer $mailer)
    {
        $userEmail = $request->request->get('email');
        $content = $request->request->get('mailContent');

        $message = (new \Swift_Message('Contact'))
            ->setFrom($userEmail)
            ->setTo($this->getParameter('email'))
            ->setBody(
                $this->renderView(
                // templates/emails/registration.html.twig
                    'emails/ag-renovation/contact.html.twig',
                    [
                        'content' => $content,
                        'mail' => $userEmail
                    ]
                ),
                'text/html'
            )
        ;

        try {
            $mailer->send($message);
        } catch (\Exception $exception)
        {
            return new Response($exception->getMessage(), $exception->getCode());
        }

        return new Response();

    }
}
