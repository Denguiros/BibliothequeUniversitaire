<?php

namespace App\Controller\Admin;

use App\Entity\Bookings;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use Symfony\Component\Validator\Constraints\Date;

class BookingsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Bookings::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new("user"),
            AssociationField::new("book"),
            DateField::new("bookingDate"),
            DateField::new("expectedReturnDate"),
            DateField::new("returnDate"),
        ];
    }

}
