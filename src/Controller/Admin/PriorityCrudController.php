<?php

namespace App\Controller\Admin;

use App\Entity\Priority;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PriorityCrudController extends AbstractCrudController
{
    /**
     * This method returns the FQCN of the entity associated with this CRUD controller.
     *
     * @return string
     */
    public static function getEntityFqcn(): string
    {
        return Priority::class;
    }

    /**
     * This method is used to configure the CRUD operations of the controller.
     *
     * @param Crud $crud
     * @return Crud
     */
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Priorité')
            ->setEntityLabelInPlural('Priorités')
            ->setPaginatorPageSize(10)

            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');
    }


    /**
     * This method is used to configure the fields of the CRUD.
     *
     * @param string $pageName
     * @return iterable
     */
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnIndex(),
            TextField::new('name'),
            IntegerField::new('value'),
        ];
    }
}
