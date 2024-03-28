<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;

class CategorieCrudController extends AbstractCrudController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public static function getEntityFqcn(): string
    {
        return Categorie::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */

    public function configureFields(string $pageName): iterable
    {
        $repo = $this->entityManager->getRepository(Categorie::class);

        $nom = TextField::new('nom');
        $image = ImageField::new('image')->setUploadDir('public/images/')->setBasePath('/images/');
        $parent =  AssociationField::new("parent")->setQueryBuilder(
            function (QueryBuilder $er) {
                return $er->where("entity.parent is null");
            }
        );
        $categories = CollectionField::new("categories");
        
        return [ $nom, $image, $parent, $categories ];
    }
}
