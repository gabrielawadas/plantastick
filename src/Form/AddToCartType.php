<?php
/**
 * AddToCartType.
 */
namespace App\Form;

use App\Entity\Colour;
use App\Entity\OrderItem;
use App\Entity\Product;
use App\Entity\ProductColour;
use App\Entity\ProductDetail;
use App\Repository\ProductDetailRepository;
use App\Repository\ProductRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


/**
 * Class AddToCartType
 * @package App\Form
 */
class AddToCartType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options )
    {

        $builder->add('quantity');
        $builder->add('add', SubmitType::class, [
            'label' => 'Add to cart'
        ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => OrderItem::class,
        ]);
    }
}
