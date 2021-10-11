<?php

namespace App\Controller\Admin;

use App\Entity\Editor;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CountryField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EditorCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Editor::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextField::new("address"),
            CountryField::new("country"),
            AssociationField::new("books"),
            TelephoneField::new("telephone")->setFormTypeOption("attr",["pattern" =>"[0-9]{8}"]),
        ];
    }

}
