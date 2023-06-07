<?php

namespace App\Controller\Admin;

use App\Entity\Task;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TaskCrudController extends AbstractCrudController
{
    /**
     * This method returns the FQCN of the entity associated with this CRUD controller
     *
     * @return string
     */
    public static function getEntityFqcn(): string
    {
        return Task::class;
    }

    /**
     * This method configures the CRUD operations associated with this CRUD controller
     *
     * @param Crud $crud
     * @return Crud
     */
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Tâche')
            ->setEntityLabelInPlural('Tâches')
            ->setPaginatorPageSize(10);
    }


    /**
     * This method configures the fields of the CRUD for the entity associated with this CRUD controller
     *
     * @param string $pageName
     * @return iterable
     */
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            TextField::new('title'),
            TextField::new('description'),
            TextField::new('priorities'),
            TextField::new('state'),
            DateField::new('createdAt')
                ->hideOnForm()
                ->hideOnIndex()
                ->setFormTypeOption('disabled', 'disabled'),
        ];
    }

}
