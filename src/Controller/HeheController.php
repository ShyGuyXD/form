<?php
namespace App\Controller;

use App\classes\Database;
use App\classes\Validator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;

class HeheController extends AbstractController
{
    /**
     * @Route("/get_messages", name="get_messages", methods={"GET"})
     */
    public function getMessages(Request $request)
    {
        $email = $request->query->get('email');

        if (empty($email)) {
            return $this->createCorsResponse(['error' => 'Email не указан.'], 400);
        }

        $database = new Database();
        $connection = $database->conn;

        $stmt = $connection->prepare("SELECT fio, message FROM new_table WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $messages = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $this->createCorsResponse($messages);
    }

    /**
     * @Route("/", name="localhost", methods={"POST", "OPTIONS", "GET"})
     */
    public function localhost(): Response
    {
        $path = __DIR__ . '/../../public/index.html';
        $content = file_get_contents($path);
        return new Response($content);
    }

    /**
     * @Route("/submit_form", name="submit_form", methods={"POST", "OPTIONS", "GET"})
     */
    public function submitForm(Request $request)
    {
        $response = new JsonResponse();
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'POST, OPTIONS');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');

        if ($request->getMethod() === 'OPTIONS') {
            return $response->setStatusCode(204);
        }

        $data = json_decode($request->getContent(), true);
        if (empty($data)) {
            return $this->createCorsResponse(['error' => 'Нет данных.'], 400);
        }

        $database = new Database();
        $connection = $database->conn;

        $validator = new Validator($connection);

        if (!$validator->validate($data)) {
            return $this->createCorsResponse(['errors' => $validator->errors], 400);
        }

        $name = $data['fio'];
        $email = $data['email'];
        $message = $data['message'];

        if ($validator->save($name, $email, $message)) {
            return $response->setData(['message' => 'Данные успешно сохранены!'])->setStatusCode(200);
        } else {
            return $this->createCorsResponse(['error' => 'Не удалось сохранить данные.'], 500);
        }
    }

    private function createCorsResponse($data, $status = 200)
    {
        $response = new JsonResponse($data, $status);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'POST, OPTIONS');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');
        return $response;
    }
}