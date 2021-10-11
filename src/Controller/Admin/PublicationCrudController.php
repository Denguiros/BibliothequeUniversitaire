<?php

namespace App\Controller\Admin;

use App\Entity\Publication;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;

class PublicationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Publication::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new("book"),
            AssociationField::new("author"),
            DateField::new("date"),

        ];
    }

}
