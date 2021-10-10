<?php

namespace App\Controller\Admin;

use App\Entity\Book;
use App\Form\ImageType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BookCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Book::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            IntegerField::new("nbrPages","Number of pages"),
            IntegerField::new("nbrCopies","Number of copies"),
            MoneyField::new("price")->setCurrency("EUR"),
            IntegerField::new("isbn")->setRequired(true),
            DateField::new("editionDate","Edition Date"),
            AssociationField::new("editor")->setRequired(true),
            AssociationField::new("category"),
            CollectionField::new("images")->setEntryType(ImageType::class)->setRequired(true)->onlyWhenCreating(),
            CollectionField::new("images")->setEntryType(ImageType::class)->setRequired(false)->onlyWhenUpdating(),

        ];
    }
}
