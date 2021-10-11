<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use mysql_xdevapi\CrudOperationBindable;
use SebastianBergmann\CodeCoverage\Report\Text;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->disable(Action::EDIT)
                        ->add(Crud::PAGE_INDEX,Action::DETAIL)
            ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new("firstName"),
            TextField::new("lastName"),
            EmailField::new("email"),
            DateField::new("birthday"),
            TelephoneField::new("telephone")->setFormTypeOption("attr",["pattern" =>"[0-9]{8}"]),
        ];
    }

}
