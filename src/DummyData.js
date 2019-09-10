const DummyData = [
    {
        id: 1,
        longitude: 52.3667,
        latitude: 4.8945,
        note: 'This is a note',
        categories: ['coral', 'damaged'],
        imageUrl:
            'https://instagram.fams1-2.fna.fbcdn.net/vp/34a87466eb9d29c017fb728102baa1c5/5E14C14C/t51.2885-15/sh0.08/e35/p640x640/66041383_152398829264628_3962511219149379470_n.jpg?_nc_ht=instagram.fams1-2.fna.fbcdn.net&_nc_cat=100',
    },
    {
        id: 2,
        imageUrl:
            'https://instagram.fams1-1.fna.fbcdn.net/vp/33f76e6ed7f809c8a7b4f3418c68fbf8/5DF1F767/t51.2885-15/fr/e15/s1080x1080/62397495_468977347001567_1352641601987425624_n.jpg?_nc_ht=instagram.fams1-1.fna.fbcdn.net&_nc_cat=111',
        description:
            'Look into my eyes 👀🦞 Missing my macro lens already, wide angle is hard! #underwaterphotography #oceannomads #supportNEMO #crazyforcrustaceans ------------------------------------------------------ You can share your photos of the Mesoamerican Reef as well by using #SupportNEMO to help scientists monitor the health of the reef and for a chance to be featured on our IG page! ------------------------------------------------------ #marinelife #oceanconservation #saveourseas #responsibletourism #underthesea #uwphotography #diving',
    },
];

export default DummyData;

/* Search will be a GET request to /api/image
       location: `X1,Y1:X2,Y2`
       category: 'text-or-id',

    data: 
    [
        imageUrl: URL,
        categories: [],
        location: '',
    ]
*/
