<?php

namespace App\Controller\Admin;

use App\Controller\BookController;
use App\Entity\Author;
use App\Entity\Book;
use App\Entity\Bookings;
use App\Entity\Category;
use App\Entity\Editor;
use App\Entity\Image;
use App\Entity\Publication;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('BiliothequeUniversitaire');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('Book Related');
        yield MenuItem::linkToCrud('Book', 'fas fa-book', Book::class);
        yield MenuItem::linkToCrud('Booking', 'fas fa-book', Bookings::class);
        yield MenuItem::linkToCrud('Category', 'fas fa-list', Category::class);
        yield MenuItem::linkToCrud('Editor', 'fas fa-save', Editor::class);
        yield MenuItem::linkToCrud('Author', 'fas fa-pen', Author::class);
        yield MenuItem::linkToCrud('Publication', 'fas fa-link', Publication::class);
        yield MenuItem::section('Users');
        yield MenuItem::linkToCrud('User', 'fas fa-user', User::class);
    }
}
