<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CategorieCrudController extends AbstractCrudController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public static function getEntityFqcn(): string
    {
        return Categorie::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        $repo = $this->em->getRepository(Categorie::class);

        $nom = TextField::new('nom');
        $image = ImageField::new('image')
            ->setUploadDir('public/images/')
            ->setBasePath('/images/');
        $categorie = AssociationField::new("parent")
                ->setQueryBuilder(
                    function(QueryBuilder $qb) {
                        return $qb->where("entity.parent is null");
                    }
                );
        return [ $nom, $image, $categorie ];
    }
    
}
