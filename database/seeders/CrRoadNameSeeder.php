<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CrRoadNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sub_divisions')->insert([
            [
                'id' => 1,
                'name' => 'No.1',
                'kilometer' => '328.71'
            ],
            [
                'id' => 2,
                'name' => 'No.2',
                'kilometer' => '390.05'
            ],
            [
                'id' => 3,
                'name' => 'Dabhoi',
                'kilometer' => '211.59'
            ],
        ]);
        DB::table('road_names')->insert([
            [
                'name' => 'Vadodara - Padra - Jambusar S.H. No. 6 Km. 8/4 to 43/8)',
                'sub_division_id' => 1,
                'chainage_from' => '8/4',
                'chainage_to' => '43/8',
                'total_length' => '35.40',
                'cat' => 'SH',
            ],
            [
                'name' => '(Mujpur Approach Road) (0/0 to 4/1)',
                'sub_division_id' => 1,
                'chainage_from' => '0/0',
                'chainage_to' => '4/1',
                'total_length' => '4.10 ',
                'cat' => 'SH',

            ],


            [
                'name' => 'Vadodara - Dabhoi Road',
                'chainage_from' => '8/3',
                'chainage_to' => '31/0',
                'total_length' => '22.70 ',
                'cat' => 'SH',
                'sub_division_id' => 3,
            ],

            [
                'name' => ' Borsad - Umeta - Singhrot - Gotri - Vadodara -  Dabhoi - Bodeli - Chhotaudepur - Alirajpur up to  State Border S.H. No.11  (Dabhoi Bodeli Road)',
                'chainage_from' => '29/8',
                'chainage_to' => '45/0',
                'total_length' => '15.20',
                'cat' => 'SH',
                'sub_division_id' => 3,
            ],

            [
                'name' => ' Diwada - Malekpur - Lunawada - Handod - Ambav - Varsada - Savli - Wagodia - Garudwshvar road S.H. No. 63  (Dabhoi - Tilakwada road Km. 31/0 to 50/0)',
                'chainage_from' => '31/0',
                'chainage_to' => '50/0',
                'total_length' => '19.00',
                'cat' => 'SH',
                'sub_division_id' => 3,
            ],

            [
                'name' => ' Vadodara - Khendewadi - Halol road S.H. 87 BOT', 'chainage_from' => '8/3',
                'chainage_to' => '34/050',
                'total_length' => '25.75',
                'cat' => 'SH',
                'sub_division_id' => 1,
            ],

            [
                'name' => ' Sathod - Chandod road',
                'chainage_from' => '0/0',
                'chainage_to' => '15/0',
                'total_length' => '15.00',
                'cat' => 'SH',
                'sub_division_id' => 3,
            ],

            [
                'name' => ' Dabhoi -Dholar - Waghodia road SH No. 63',
                'chainage_from' => '0/0',
                'chainage_to' => '12/0',
                'total_length' => '12.00',
                'cat' => 'SH',
                'sub_division_id' => 3,
            ],

            [
                'name' => ' Dabhoi -Dholar - Waghodia road SH No. 63',
                'chainage_from' => '12/0',
                'chainage_to' => '19/5',
                'total_length' => '7.50',
                'cat' => 'SH',
                'sub_division_id' => 3,
            ],
            [
                'name' => ' (i) Jarod - Samlaya - Savli Road',
                'chainage_from' => '0/0',
                'chainage_to' => '17/7',
                'total_length' => '17.70',
                'cat' => 'SH',
                'sub_division_id' => 2
            ],

            [
                'name' => ' (ii)Jarod - Raval - Waghodia Km SH No. 63',
                'chainage_from' => '0/0',
                'chainage_to' => '18/0',
                'total_length' => '18.00',
                'cat' => 'SH',
                'sub_division_id' => 2
            ],
            [
                'name' => ' (i) Savli - Timba Road',
                'chainage_from' => '0/0',
                'chainage_to' => '38/0',
                'total_length' => '38.00',
                'cat' => 'SH',
                'sub_division_id' => 2

            ],
            [
                'name' => ' ii) Valavav to Varasada',
                'chainage_from' => '0/0',
                'chainage_to' => '7/25',
                'total_length' => '7.25',
                'cat' => 'SH',
                'sub_division_id' => 2

            ], [
                'name' => ' Nadiad - Bhalej - Old Poicha - Savli - Chapaner - Halol - Bhilod - Smilia - Dahod road S.C.I. (Savli - Poicha road) SH no 150',
                'chainage_from' => '0/0',
                'chainage_to' => '9/7',
                'total_length' => '9.70',
                'cat' => 'SH',
                'sub_division_id' => 2
            ],


            [
                'name' => ' Savli - Vadia - Champaner (S.H. No. 150) (SavliHalol Road)',
                'chainage_from' => '0/0',
                'chainage_to' => '24/4',
                'total_length' => '24.40',
                'cat' => 'SH',
                'sub_division_id' => 2
            ],
            [
                'name' => ' Savli - Tundav - Manjusar - Dumad - Vadodara -  Timba - Waghodia - Gugalpur - Bhatpur - Vasna -  Kosindra road SH no 158 Section III Vadodara -  Savli Road',
                'chainage_from' => '9/6',
                'chainage_to' => '32/4',
                'total_length' => '22.8',
                'cat' => 'SH',
                'sub_division_id' => 2
            ],


            [
                'name' => ' Waghodia - Kherwadi - Rustampura Road',
                'chainage_from' => '18/0',
                'chainage_to' => '35/3',
                'total_length' => '17.30',
                'cat' => 'SH',
                'sub_division_id' => 2
            ],

            [
                'name' => ' Padra - Sadhi - Karjan -    Vemar - Sinor -  Phophlidiya - Bithali - Dariyapura road S.H. No.  160 Section : II Karjan - Vemar - Sadhli road',
                'chainage_from' => '0/0',
                'chainage_to' => '19/60',
                'total_length' => '19.60',
                'cat' => 'SH',
                'sub_division_id' => 1,
            ],

            [
                'name' => ' Sadhli - Sinor Road',
                'chainage_from' => '19/60',
                'chainage_to' => '30/8',
                'total_length' => '11.20',
                'cat' => 'SH',
                'sub_division_id' => 3,
            ],
            [
                'name' => ' Section II Karjan - Padra road S.H. No. 160',
                'chainage_from' => '0/0',
                'chainage_to' => '23/2',
                'total_length' => '23.20',
                'cat' => 'SH',
                'sub_division_id' => 1,
            ],

            [
                'name' => ' Section Sinor - Dabhoi - Segwa - Sinor - Malsar  Road S.H. No. 161',
                'chainage_from' => '0/4',
                'chainage_to' => '32/0',
                'total_length' => '31.60',
                'cat' => 'SH',
                'sub_division_id' => 3,
            ],

            [
                'name' => ' Section Karjan - Kayavarohan - Dabhoi road Km.  0/0 to 31/6 S.H. No. 160',
                'chainage_from' => '0/0',
                'chainage_to' => '13/260',
                'total_length' => '13.26',
                'cat' => 'SH',
                'sub_division_id' => 1,

            ],
            [
                'name' => ' Section Karjan - Kayavarohan - Dabhoi road Km.  0/0 to 31/6 S.H. No. 160',
                'chainage_from' => '13/260',
                'chainage_to' => '31/6',
                'total_length' => '18.34',
                'cat' => 'SH',
                'sub_division_id' => 3,
            ],
            [
                'name' => ' Section Karjan - Miyagam - Matar - Sarbhan road  (Karjan - Samni - Amod road)',
                'chainage_from' => '0/0',
                'chainage_to' => '12/8',
                'total_length' => '12.80 ',
                'cat' => 'SH',
                'sub_division_id' => 1,

            ],


            [
                'name' => 'Sadhli - Segwa road S.H. No. 160',
                'chainage_from' => '19/6',
                'chainage_to' => '29/4',
                'total_length' => '9.80',
                'cat' => 'SH',
                'sub_division_id' => 3,


            ],

            [
                'name' => ' Halol - Baska - Madodhar - Waghodia road S.H.  No. 194 Section waghodia - Ghutal - Madodhar  Road',
                'chainage_from' => '1/4',
                'chainage_to' => '9/6',
                'total_length' => '8.20',
                'cat' => 'SH',
                'sub_division_id' => 2
            ],

            [
                'name' => ' karjan Diversion road',
                'chainage_from' => '0/0',
                'chainage_to' => '3/0',
                'total_length' => '3.00',
                'cat' => 'SH',
                'sub_division_id' => 1,
            ],

            [
                'name' => ' Palej - Nareshwar road',
                'chainage_from' => '0/0',
                'chainage_to' => '18/6',
                'total_length' => '18.60',
                'cat' => 'SH',
                'sub_division_id' => 1,
            ],
            [
                'name' => ' Manglej - Ganpatpura - Kurali - Nareshwar road',
                'chainage_from' => '0/0',
                'chainage_to' => '26/6',
                'total_length' => '26.60',
                'cat' => 'SH',
                'sub_division_id' => 1,
            ],

            [
                'name' => ' Vadodara - Padra - Sejakuva road',
                'chainage_from' => '0/0',
                'chainage_to' => '0/6',
                'total_length' => '6.00',
                'cat' => 'SH',
                'sub_division_id' => 1,
            ],

            [
                'name' => ' Por - Karvan - Sadhi road (With Rangav Bridge  approach)',
                'chainage_from' => '0/0',
                'chainage_to' => '21/8',
                'total_length' => '21.80',
                'cat' => 'SH',
                'sub_division_id' => 1,
            ],

            [
                'name' => ' Vadodara - Ajwa Road',
                'chainage_from' => '1/0',
                'chainage_to' => '16/4',
                'total_length' => '15.40',
                'cat' => 'SH',
                'sub_division_id' => 1,
            ],

            [
                'name' => ' Ajwa - Gutal - Rameshra Road',
                'chainage_from' => '0/0',
                'chainage_to' => '10/2',
                'total_length' => '10.20',
                'cat' => 'SH',
                'sub_division_id' => 2

            ], [
                'name' => 'Vadodara - Waghodia Road',
                'chainage_from' => '1/0',
                'chainage_to' => '17/2',
                'total_length' => '16.00',
                'cat' => 'SH',
                'sub_division_id' => 2

            ],
            [
                'name' => ' Waghodia - Gorej - Rameshra',
                'chainage_from' => '0/0',
                'chainage_to' => '11/6',
                'total_length' => '16.60',
                'cat' => 'SH',
                'sub_division_id' => 2
            ],



            [
                'name' => ' Lilora - Shankarpura - Mudhera - Khakhria - 
 Bhagana - Muvada - Madhvas road (Lilora -Paldi- Khakhariya-Madhvas Road)',
                'chainage_from' => '0/0',
                'chainage_to' => '20/7',
                'total_length' => '20.70',
                'cat' => 'SH',
                'sub_division_id' => 2
            ],
            [
                'name' => ' Vanchara - Mobha - Muval - Chitral - Karkhadi - Kareli - Dudhwada road',
                'chainage_from' => '0/0',
                'chainage_to' => '23/2',
                'total_length' => '23.20',
                'cat' => 'SH',
                'sub_division_id' => 1,
            ],

            [
                'name' => '  Dhadhar Approach Road',
                'chainage_from' => '0/0',
                'chainage_to' => '3/06',
                'total_length' => '3.06',
                'cat' => 'SH',
                'sub_division_id' => 1,
            ],
            [
                'name' => '  Harni - Virod - Pilol - Sherpura - Mevli - Pandu road',
                'chainage_from' => '1/6',
                'chainage_to' => '52/4',
                'total_length' => '50.80',
                'cat' => 'SH',
                'sub_division_id' => 2


            ], [
                'name' => 'Ranu - Mahuvad Road (Missing Link)',
                'chainage_from' => '0/0',
                'chainage_to' => '3/64',
                'total_length' => '3.64',
                'cat' => 'SH',
                'sub_division_id' => 1,
            ],

            [
                'name' => 'Old N.H. No. - 8 of Por Village',
                'chainage_from' => '139/0',
                'chainage_to' => '140/2',
                'total_length' => '1.20',
                'cat' => 'SH',
                'sub_division_id' => 1,

            ], [
                'name' => '  Dabhoi - Segwa - Rajpipla Road',
                'chainage_from' => '14/5',
                'chainage_to' => '26/0',
                'total_length' => '11.50',
                'cat' => 'SH',
                'sub_division_id' => 3,

            ],
            [
                'name' => '  Segwa - Sinor - Malsar Road ( BYPASS)',
                'chainage_from' => '0/0',
                'chainage_to' => '1/35',
                'total_length' => '1.35',
                'cat' => 'SH',
                'sub_division_id' => 3,

            ],

            [
                'name' => '  Bahadarpur Hareshwar Kherwadi Road',
                'chainage_from' => '10/0',
                'chainage_to' => '14/7',
                'total_length' => '4.70',
                'cat' => 'SH',
                'sub_division_id' => 2,
            ],

            [
                'name' => ' Anandi - Satisana Road 0/0 to 4/4',
                'chainage_from' => '0/0',
                'chainage_to' => '4/4',
                'total_length' => '4.40',
                'cat' => 'MDR',
                'sub_division_id' => 3,
            ],


            [
                'name' => ' Waghodia - Goraj - Rustampura Road',
                'chainage_from' => '9/0',
                'chainage_to' => '19/70',
                'total_length' => '10.70',
                'cat' => 'MDR',
                'sub_division_id' => 2
            ],


            [
                'name' => ' Nimeta - Sakariya -Rasulabad - Kodarvaya-Kheda karmasiya - Navagam - Umaj road',
                'chainage_from' => '0/0',
                'chainage_to' => '19/8',
                'total_length' => '19.80',
                'cat' => 'MDR',
                'sub_division_id' => 2
            ],

            [
                'name' => ' Karjan - Umaj Road',
                'chainage_from' => '0/0',
                'chainage_to' => '16/20',
                'total_length' => '16.20',
                'cat' => 'MDR',
                'sub_division_id' => 1,
            ],

            [
                'name' => ' Kanabha - Bodka - Sampa - Occhan Road',
                'chainage_from' => '0/0',
                'chainage_to' => '10/5',
                'total_length' => '10.50',
                'cat' => 'MDR',
                'sub_division_id' => 1,
            ],

            [
                'name' => '  Padra - Masar Road',
                'chainage_from' => '6/0',
                'chainage_to' => '30/0',
                'total_length' => '24.00',
                'cat' => 'MDR',
                'sub_division_id' => 1,

            ],
            [
                'name' => ' Dabka - Wadu - Bhoj - Sadhi - Saraswani - Itola Road',
                'chainage_from' => '5/0',
                'chainage_to' => '9/0',
                'total_length' => '4.00',
                'cat' => 'MDR',
                'sub_division_id' => 1,
            ],

            [
                'name' => ' State Highway to Kural - Shanpur - Sokhda -Raghu road',

                'chainage_from' => '13/4',
                'chainage_to' => '19/2',
                'total_length' => '5.80',
                'cat' => 'MDR',
                'sub_division_id' => 1,

            ],

            [
                'name' => ' Sankarda - Bhadarva - Savli Road',
                'chainage_from' => '0/0',
                'chainage_to' => '21/40',
                'total_length' => '21.40',
                'cat' => 'MDR',
                'sub_division_id' => 2

            ],
            [
                'name' => '  Samlaya - Tundav - Raniya Road',
                'chainage_from' => '0/0',
                'chainage_to' => '19/4',
                'total_length' => '19.40',
                'cat' => 'MDR',
                'sub_division_id' => 2

            ],

            [
                'name' => ' Samlaya - Motibhadol - Rampura - Mevli Road',
                'chainage_from' => '0/0',
                'chainage_to' => '14/50',
                'total_length' => '14.50',
                'cat' => 'MDR',
                'sub_division_id' => 2
            ],


            [
                'name' => '  Champaner - Samlaya Road',
                'chainage_from' => '0/0',
                'chainage_to' => '10/20',
                'total_length' => '10.20',
                'cat' => 'MDR',
                'sub_division_id' => 2
            ],

            [
                'name' => ' Pandu - Valavav Road',
                'chainage_from' => '0/0',
                'chainage_to' => '9/200',
                'total_length' => '9.20',
                'cat' => 'MDR',
                'sub_division_id' => 2

            ], [
                'name' => ' Rajli - Mandala Road',
                'chainage_from' => '0/0',
                'chainage_to' => '15/00',
                'total_length' => '15.00',
                'cat' => 'MDR',
                'sub_division_id' => 3,

            ], [
                'name' => ' Bhilapur - Vanadara - Madheli Road',
                'chainage_from' => '0/0',
                'chainage_to' => '11/3',
                'total_length' => '11.30',
                'cat' => 'MDR',
                'sub_division_id' => 3,

            ],
            [
                'name' => ' Chhatral - Khanpur - Kayavarohan Road Km. 0/0 to 6/6',
                'chainage_from' => '0/0',
                'chainage_to' => '6/6',
                'total_length' => '6.600',
                'cat' => 'ODR',
                'sub_division_id' => 3,


            ], [
                'name' => '  Segwa - Barkal road',
                'chainage_from' => '6/5',
                'chainage_to' => '11/8',
                'total_length' => '5.30',
                'cat' => 'ODR',
                'sub_division_id' => 3,
            ],



        ]);
    }
}
