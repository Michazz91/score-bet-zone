<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DatabaseController extends AbstractController
{
    #[Route('/database/test')]
    public function test(): Response
    {
        $host = 'scorebxsbtdev.mysql.db'; // np. mysqlXX-XX.perso.hosting.ovh.net lub localhost
        $dbname = 'scorebxsbtdev';
        $username = 'scorebxsbtdev';
        $password = 'pMTCvACgCtxoEKbRQSpQiVHaLH5Ade';

        try {
            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
            $pdo = new \PDO($dsn, $username, $password);

            // Ustaw tryb raportowania błędów na wyjątki
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            return $this->render('database/test.html.twig', [
                'value' => 'Połączenie z bazą danych powiodło się!',
            ]);
        } catch (\PDOException $e) {
            return $this->render('database/test.html.twig', [
                'value' => 'Błąd połączenia z bazą: '.$e->getMessage(),
            ]);
        }
    }
}
