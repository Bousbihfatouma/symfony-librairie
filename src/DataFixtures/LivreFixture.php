<?php
namespace App\DataFixtures;
use App\Entity\Livre;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class LivreFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $livre = new Livre();
        $livre-> setNom("Boule et Bill");
        $livre->setDescription("Boule et Bill est une série de bande dessinée jeunesse humoristique belge, nommée d'après ses deux personnages principaux. Créée en 1959 par Jean Roba, elle a été reprise en 2003 par Laurent Verron puis fin 2016 par le scénariste Christophe Cazenove et le dessinateur Jean Bastide.");
        $livre->setSlug("boule-bill");
        $livre->setImageName("boule-bill.jpg");
        $livre->setCategorie($this->getReference(CategorieFixtures::ESSAI_PHILOSOPHIQUE));
        $livre->addAuteur($this->getReference(AuteurFixtures::JEAN_ROBA));
        $manager->persist($livre);
        $livre = new Livre();
        $livre-> setNom("A propos d'\amour");
        $livre->setDescription("Définissant l\'amour comme un acte et non comme un sentiment, bell hooks démonte tous les obstacles que la culture patriarcale oppose à des relations d\'amour.");
        $livre->setSlug("a-propos-d-amour");
        $livre->setImageName("a-propos-d-amour.jpg");
        $manager->persist($livre);
        $manager->flush();
    }
}

























