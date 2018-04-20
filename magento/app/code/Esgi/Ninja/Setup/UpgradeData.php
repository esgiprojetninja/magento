<?php
namespace Esgi\Ninja\Setup;

use Esgi\Ninja\Model\Ninja;
use Esgi\Ninja\Model\NinjaStore;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * @codeCoverageIgnore
 */
class UpgradeData implements UpgradeDataInterface
{
    /** @var  Ninja */
    protected $_ninja;

    /** @var  NinjaStore */
    protected $_ninjastore;

    /** @var  array */
    protected $_ninjastoreIds = [];

    /**
     * UpgradeData constructor.
     * @param Ninja $ninja
     * @param NinjaStore $ninjastore
     */
    public function __construct(
        Ninja $ninja,
        NinjaStore $ninjastore
    ){
        $this->_ninja        = $ninja;
        $this->_ninjastore = $ninjastore;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        // if (version_compare($context->getVersion(), '1.2.0') < 0) {
            $this->addNinjaStores($setup);
            // $this->addNinjas($setup);
        // }

        $installer->endSetup();
    }

    protected function addNinjaStores(ModuleDataSetupInterface $setup)
    {
        $ninjastores = [
            [
                'name'    => 'Poulay',
                'content' => 'Sometime my sister, she show her vazhïn to my brother Bilo and say "You will never get this, you will never get it, la la la la la la!" He behind his cage. He cries, he cries and everybody laughs. She goes "You never get this." But one time he break cage and he "get this" and then we all laugh. High five!',
                'link' => 'http://adrastia.org/',
                'lat' => -100,
                'lng' => 50
            ],
            [
                'name'    => 'Children',
                'content' => 'Kazakhstan is the greatest country in the world. All other countries are run by little girls. Kazakhstan is number-one exporter of potassium. Other Central Asian countries have inferior potassium. Kazakhstan is the greatest country in the world. All other countries is the home of the gays...',
                'link' => 'http://www.perdu.com/',
                'lat' => 100,
                'lng' => 150
            ],
            [
                'name'    => 'Yeah',
                'content' => 'My name a Borat. I come from Kazakhstan. Can I say a first, we support your war of terror! May we show our support to our boys in Iraq! May US and A kill every single terrorist! May your George Bush drink the blood of every single man, women, and child of Iraq! May you destroy their country so that for next thousand years not even a single lizard will survive in their desert!',
                'link' => 'http://adrastia.org/',
                'lat' => 12,
                'lng' => 78
            ]
        ];

        foreach ($ninjastores as $data) {
            $ninjastore = $this->_ninjastore->setData($data)->save();
            $this->_ninjastoreIds[] = $ninjastore->getId();
        }
    }

    protected function addNinjas(ModuleDataSetupInterface $setup)
    {
        $ninjas = [
            [
                'title'         => 'Sample Marketing Ninja 1',
                'type'          => 'CDI',
                'location'      => 'Paris, France',
                'date'          => '2018-06-04',
                'is_active'     => Ninja::STATUS_ENABLED,
                'description'   => 'Well, the way they make shows is, they make one show. That show\'s called a pilot. Then they show that show to the people who make shows, and on the strength of that one show they decide if they\'re going to make more shows. Some pilots get picked and become television programs. Some don\'t, become nothing. She starred in one of the ones that became nothing.',
                'ninjastore_id' => $this->_ninjastoreIds[0]
            ],
            [
                'title'         => 'Sample Marketing Ninja 2',
                'type'          => 'CDI',
                'location'      => 'Paris, France',
                'date'          => '2018-05-07',
                'is_active'     => Ninja::STATUS_ENABLED,
                'description'   => 'Normally, both your asses would be dead as fucking fried chicken, but you happen to pull this shit while I\'m in a transitional period so I don\'t wanna kill you, I wanna help you. But I can\'t give you this case, it don\'t belong to me. Besides, I\'ve already been through too much shit this morning over this case to hand it over to your dumb ass.',
                'ninjastore_id' => $this->_ninjastoreIds[0]
            ],
            [
                'title'         => 'Sample Technical Support Ninja 1',
                'type'          => 'CDI',
                'location'      => 'Montpellier, France',
                'date'          => '2018-05-14',
                'is_active'     => Ninja::STATUS_ENABLED,
                'description'   => 'The path of the righteous man is beset on all sides by the iniquities of the selfish and the tyranny of evil men. Blessed is he who, in the name of charity and good will, shepherds the weak through the valley of darkness, for he is truly his brother\'s keeper and the finder of lost children. And I will strike down upon thee with great vengeance and furious anger those who would attempt to poison and destroy My brothers. And you will know My name is the Lord when I lay My vengeance upon thee.',
                'ninjastore_id' => $this->_ninjastoreIds[1]
            ],
            [
                'title'         => 'Sample Human Resource Ninja 1',
                'type'          => 'CDI',
                'location'      => 'Brest, France',
                'date'          => '2018-05-21',
                'is_active'     => Ninja::STATUS_DISABLED,
                'description'   => 'Look, just because I don\'t be givin\' no man a foot massage don\'t make it right for Marsellus to throw Antwone into a glass motherfuckin\' house, fuckin\' up the way the nigger talks. Motherfucker do that shit to me, he better paralyze my ass, \'cause I\'ll kill the motherfucker, know what I\'m sayin\'?',
                'ninjastore_id' => $this->_ninjastoreIds[2]
            ]
        ];

        foreach ($ninjas as $data) {
            $this->_ninja->setData($data)->save();
        }
    }
}