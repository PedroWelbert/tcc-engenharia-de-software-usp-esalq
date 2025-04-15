<?php

namespace App\Controller;

use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MovieControllerPhpController extends AbstractController
{
    #[Route('/movies', name: 'app_filmes')]
    public function index(MovieRepository $movieRepository): Response
    {
        $executionStart = microtime(true);
        // Busca todos os filmes no banco de dados
        $filmes = $movieRepository->findAll();

        // Calcula os parâmetros de teste de carga
        $loadAvg = sys_getloadavg();
        $memoryUsage = round(memory_get_usage() / 1024, 2);  // em KB
        $executionTime = round(microtime(true) - $executionStart, 4);

        // Renderiza a view com os filmes e parâmetros de carga
        return $this->render('movie_controller_php/index.html.twig', [
            'filmes' => $filmes,
            'load_avg' => $loadAvg,
            'memory_usage' => $memoryUsage,
            'execution_time' => $executionTime,
        ]);
    }
}
