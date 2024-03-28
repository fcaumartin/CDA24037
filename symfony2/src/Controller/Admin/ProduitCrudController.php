<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use App\Entity\Categorie;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProduitCrudController extends AbstractCrudController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    public static function getEntityFqcn(): string
    {
        return Produit::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        $repo = $this->entityManager->getRepository(Categorie::class);

        $nom = TextField::new('nom');
        $image = ImageField::new('image')
                    ->setUploadDir('public/images/')->setBasePath('/images/')
                    ->setRequired($pageName !== Crud::PAGE_EDIT)
                    ->setFormTypeOptions($pageName == Crud::PAGE_EDIT ? ['allow_delete' => false] : []);
        $parent =  AssociationField::new("categorie")
                    ->setQueryBuilder(
                        function (QueryBuilder $er) {
                            return $er->where("entity.parent is not null");
                        }
                    );
        $prix = MoneyField::new('prix')->setCurrency('EUR');
        
        return [ $nom, $image, $prix, $parent ];
    }
    
}
